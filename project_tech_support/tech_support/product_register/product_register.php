<?php include '../view/header.php'; 

?>
<main>

    <h2>Register Product</h2>
    <?php if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php else: ?>
        <form action="." method="post" id="aligned">
            <input type="hidden" name="action" 
                   value="register_product">
            <label>Customer:</label>
            <label><?php echo htmlspecialchars($customer['firstName'] . ' ' . 
                                              $customer['lastName']) ?></label>
            <br>

            <label>Product:</label>
            <select name="product_code">
            <?php foreach ($products as $product) : ?>
                <option value="<?php echo htmlspecialchars($product['productCode']); ?>">
                    <?php echo htmlspecialchars($product['name']); ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Register Product" />
        </form>
        
        <div> 
            <?php echo "You are logged in as ".htmlspecialchars($customer['email']);?>
        </div>
            <form action="." method="post" id="aligned">
                <input type="hidden" name="action" 
                   value="logout">
                <input type="submit" value="Logout" />
            </form>
    <?php endif; ?>

</main>
<?php include '../view/footer.php'; ?>