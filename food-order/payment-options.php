<?php include('partials-front/menu.php'); ?>

<div class="main-content" style="display: flex; flex-direction: column; min-height: 100vh;">
    <div class="wrapper" style="flex: 1;">
        <h1 class="text-center" style="font-size: 2.5em; color: #333; margin-bottom: 30px;">Payment Options</h1>

        <br /><br /><br />
        <br><br>

        <?php
        if(isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];
            // Fetch order details if needed
        }
        ?>

        <div class="payment-options-container" style="display: flex; justify-content: center; gap: 20px;">
            <div class="payment-card" style="border: 1px solid #ddd; padding: 30px; width: 300px; text-align: center; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); transition: 0.3s;">
                <form action="process-payment.php" method="POST">
                    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                    <input type="hidden" name="payment_method" value="cash">
                    <h2 style="margin-bottom: 20px;">Cash</h2>
                    <p style="margin-bottom: 30px;">Pay with cash upon delivery.</p>
                    <input type="submit" name="submit" value="Select Cash" class="btn-primary" style="background-color: green; color: white; border: none; padding: 10px 20px; cursor: pointer; font-size: 16px;">
                </form>
            </div>

            <div class="payment-card" style="border: 1px solid #ddd; padding: 30px; width: 300px; text-align: center; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); transition: 0.3s;">
                <form action="process-payment.php" method="POST">
                    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                    <input type="hidden" name="payment_method" value="card">
                    <h2 style="margin-bottom: 20px;">Card</h2>
                    <p style="margin-bottom: 30px;">Pay with your credit or debit card.</p>
                    <input type="submit" name="submit" value="Select Card" class="btn-primary" style="background-color: blue; color: white; border: none; padding: 10px 20px; cursor: pointer; font-size: 16px;">
                </form>
            </div>
        </div>
    </div>

    <?php include('partials-front/footer.php'); ?>
</div>

<style>
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: Arial, sans-serif;
}

.main-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.wrapper {
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.payment-options-container {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.payment-card {
    border: 1px solid #ddd;
    padding: 30px;
    width: 300px;
    text-align: center;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
}

.payment-card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}

.payment-card h2 {
    margin-bottom: 20px;
}

.payment-card p {
    margin-bottom: 30px;
}

.payment-card input[type="submit"] {
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

.payment-card input[type="submit"]:hover {
    opacity: 0.8;
}

footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px 0;
    width: 100%;
}
</style>
