<?php

function get_customer($customerId){
    global $db;
    
    $query = 'SELECT * FROM customers
              WHERE customerID = :customerId';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerId', $customerId);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    
    return $customer;
}

function get_customers_by_last_name($lastName){
    global $db;

    $query = 'SELECT * FROM customers
              WHERE lastName = :lastName';
    $statement = $db->prepare($query);
    $statement->bindValue(':lastName', $lastName);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    
    return $customers;
}


function get_customer_by_email($email){
    global $db;

    $query = 'SELECT * FROM customers
              WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $customers = $statement->fetch();
    $statement->closeCursor();
    
    return $customers;
}


function update_customer($customerId, $firstName, $lastName, $address, $city, $state, $postalCode, $countryCode, 
                        $phone, $email, $password){   
    
    global $db;
    
    if(strlen($countryCode) > 2){
        return "wrong country code";
    }
    else{
        $query = "UPDATE customers
                  SET firstName = :firstName, lastName = :lastName,
                  address = :address, city = :city, state = :state,
                  postalCode = :postalCode, countryCode = :countryCode,
                  phone = :phone, email = :email, password = :password
                  WHERE customerID = :customerId";
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':postalCode', $postalCode);
        $statement->bindValue(':countryCode', $countryCode);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':customerId', $customerId);
        $statement->execute();
        $statement->closeCursor();
    }   
       
}

function get_countries(){

    global $db;

    $query = 'SELECT *
      FROM countries
      ORDER BY countryName';
    $statement = $db->prepare($query);
    $statement->execute();
    $countries = $statement->fetchAll();
    $statement->closeCursor();

    return $countries;
}