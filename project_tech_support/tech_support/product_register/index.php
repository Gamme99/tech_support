<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');

$lifetime = 0; 
session_set_cookie_params($lifetime, '/'); 
session_start();
    
$action = filter_input(INPUT_POST, 'action');

if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'login_customer'; 
    }
}

$email = '';

switch ($action){
    case 'login_customer':
        if(!isset($_SESSION['customer'])){
            session_unset(); 
            session_destroy();
            include('customer_login.php');
        } else{
            $products = get_products();
            $customer = $_SESSION['customer'];
            include('product_register.php'); 
        }
        break;
    case "get_customer":
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (empty($email) || $email === FALSE) {
            $error = "Invalid email. Please try again.";
            include('../errors/error.php');
            exit();
        } 

        $customer = get_customer_by_email($email);
        if (empty($customer)) {
            $error = "Customer doesn't exist. Please try again.";
            include('../errors/error.php');
            exit();
        }

        $products = get_products();
        $_SESSION['customer'] = $customer;
        include('product_register.php');
        break;
    case "register_product":
        $customer_id = $_SESSION["customer"]["customerID"];
        $product_code = filter_input(INPUT_POST, 'product_code');

        // only add if not already registered
        $registration = get_registration($customer_id, $product_code);
        if ($registration === NULL) {
            add_registration($customer_id, $product_code);
            header("Location: .?action=success&product_code=$product_code");
        } else {
            $error = "Product ($product_code) is already registered. Please try again.";
            include('../errors/error.php');
        }
        break;
    case "success":
        $product_code = filter_input(INPUT_GET, 'product_code');
        $message = "Product ($product_code) was registered successfully.";
        include('product_register.php');
        break;
    case "logout":
        session_unset();
        session_destroy();
        include('customer_login.php');
        break;       
}
?>