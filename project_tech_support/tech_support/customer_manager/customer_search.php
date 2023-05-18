<?php include '../view/header.php';?>
<main>
    <h2>customer Search</h2>
    
    <form action="." method="post">
        <input type="hidden" name="action" value="display_customers" />
        <labale>Last Name:</lable>  
        <input type="text" name="lastName"
               value="<?php echo htmlspecialchars($lastName)  ?>"/> 
        <input type="submit" value="Search" />
    </form>
    
    <?php if(!empty($message)) : ?>
        <p> <?php echo $message;  ?></p>
    <?php elseif(!empty($customers)): ?>
    
        <h2>Result</h2>

        <table>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>City</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td> <?php echo $customer["firstName"]." ".$customer["lastName"]; ?> </td>
                <td> <?php echo $customer["email"]; ?></td>
                <td> <?php echo $customer["city"]; ?>
                </td>
                <td> 
                    <form action="." method="post">                    
                        <input type="hidden" name="action" value="display_customer" />
                        <input type="hidden" name="customerId" value="<?php echo $customer['customerID']; ?>"/>
                        <input type="submit" value="Select"/>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif;  ?>
</main>
<?php include '../view/footer.php'; ?>