<?php
if(isset($_POST['submit'])) {
    $order_id = $_POST['order_id'];
    $payment_method = $_POST['payment_method'];

    // Process the payment based on the selected method
    if($payment_method == 'cash') {
        // Handle cash payment
        header('Location: payment-success.php?order_id=' . $order_id);
    } elseif($payment_method == 'card') {
        // Handle card payment (you might redirect to a payment gateway)
        header('Location: payment-success.php?order_id=' . $order_id);
    }
}
?>
