<?php include('partials-front/menu.php'); ?>

<div class="main-content">
    <div class="wrapper" style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #f7f7f7; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
        <h1 class="text-center" style="font-size: 2.5em; color: #333; margin-bottom: 30px;">Payment Successful</h1>

        <br /><br /><br />
        <br><br>

        <?php
        if(isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];

            // Fetch order details from the database
            $sql = "SELECT * FROM tbl_order WHERE id=$order_id";
            $res = mysqli_query($conn, $sql);
            if($res == TRUE) {
                $count = mysqli_num_rows($res);
                if($count == 1) {
                    // Order Found
                    $row = mysqli_fetch_assoc($res);
                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
                    $order_date = $row['order_date'];
                    $status = $row['status'];
                } else {
                    // Order not found
                    header('Location: myorders.php');
                }
            }
        }
        ?>

        <div class="invoice-container" style="background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 10px;">
            <div class="invoice-header" style="text-align: center; margin-bottom: 20px;">
                <h2 style="font-size: 1.8em; margin: 0;">Invoice</h2>
                <p style="margin: 5px 0;">Order ID: <?php echo $order_id; ?></p>
                <p style="margin: 5px 0;">Order Date: <?php echo $order_date; ?></p>
            </div>

            <div class="invoice-body" style="margin-bottom: 20px;">
                <table class="content-table" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 10px; background-color: #f7f7f7;">Food</th>
                            <th style="border: 1px solid #ddd; padding: 10px; background-color: #f7f7f7;">Price</th>
                            <th style="border: 1px solid #ddd; padding: 10px; background-color: #f7f7f7;">Quantity</th>
                            <th style="border: 1px solid #ddd; padding: 10px; background-color: #f7f7f7;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $food; ?></td>
                            <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $price; ?></td>
                            <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $qty; ?></td>
                            <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $total; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="invoice-footer" style="text-align: center; margin-bottom: 20px;">
                <p style="font-size: 1.2em; margin: 0;"><strong>Status:</strong>
                    <?php
                    // Ordered, On Delivery, Delivered, Cancelled
                    if($status == "Ordered") {
                        echo "<span>$status</span>";
                    } elseif($status == "On Delivery") {
                        echo "<span style='color: orange;'>$status</span>";
                    } elseif($status == "Delivered") {
                        echo "<span style='color: green;'>$status</span>";
                    } elseif($status == "Cancelled") {
                        echo "<span style='color: red;'>$status</span>";
                    }
                    ?>
                </p>
            </div>

            <div class="invoice-actions" style="text-align: center;">
                <br><br>
                <a href="myorders.php" class="btn-primary" style="background-color: blue; color: white; border: none; padding: 10px 20px; cursor: pointer; text-decoration: none; border-radius: 5px;">View Orders</a>
            </div>
        </div>
    </div>
</div>

<?php include('partials-front/footer.php'); ?>
