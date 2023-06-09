<?php include '../view/header.php';?>

<main>   
    <h2>View/Update Customer</h2>
    
    <form action="." method="post" id="aligned">
                
        <input type="hidden" name="action" value="update_customer"><br>           
        <input type="hidden" name="customerId" value="<?php echo htmlspecialchars($customer['customerID']); ?>"><br>           
        
        <label>First Name:</label>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($customer['firstName']); ?>"><br>           

        <label>Last Name:</label>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($customer['lastName']); ?>"><br>

        <label>Address:</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($customer['address']); ?>"><br>

        <label>City:</label>
        <input type="text" name="city" value="<?php echo htmlspecialchars($customer['city']); ?>"><br>

        <label>State:</label>
        <input type="text" name="state" value="<?php echo htmlspecialchars($customer['state']); ?>"><br>
        <label>Postal Code:</label>
        <input type="text" name="postalCode" value="<?php echo htmlspecialchars($customer['postalCode']); ?>"><br>
        
        <label>Country Code:</label>       
        <select name="countryCode">
            <?php foreach ($countries as $country) : ?>
                <option value="<?php echo $country['countryCode']; ?>" <?php if ($country['countryCode'] == $customer['countryCode']) echo 'selected'; ?>>
                    <?php echo $country['countryName']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        
        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>"><br>
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>"><br>
        <label>Password:</label>
        <input type="text" name="password" value="<?php echo htmlspecialchars($customer['password']); ?>"><br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Customer"><br>
    </form>
    
</main>
    
<?php include '../view/footer.php'; ?>