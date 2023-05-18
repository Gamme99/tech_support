<?php
require('../model/database.php');
require('../model/customer_db.php');

$action = filter_input(INPUT_POST, 'action');

if($action === NULL){
    $action = filter_input(INPUT_GET, 'action');
    
    if($action === NULL){
        $action = 'search_customers';
    }
}

$lastName = '';
$customers = NULL;

switch($action){
    case "search_customers":
        include("customer_search.php");
        break;
    case "display_customers":
        $lastName = filter_input(INPUT_POST, 'lastName');
        if(empty($lastName)){           
            $message = 'Last name is not given';      
        }
        else{
            $customers = get_customers_by_last_name($lastName);             
        }
        include('customer_search.php');  
        break;
    case "display_customer":
        $customerId = filter_input(INPUT_POST, 'customerId', FILTER_VALIDATE_INT);
        $customer = get_customer($customerId);
        $countries = get_countries();
        include('customer_display.php');
        break;
    case "update_customer":
        $customerId = filter_input(INPUT_POST, 'customerId', FILTER_VALIDATE_INT);
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $postalCode = filter_input(INPUT_POST, 'postalCode');
        $countryCode = filter_input(INPUT_POST, 'countryCode');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        update_customer($customerId, $firstName, $lastName, $address, $city, 
                        $state, $postalCode, $countryCode, $phone, $email, $password);

        header("Location: .");
        break;
}
?>