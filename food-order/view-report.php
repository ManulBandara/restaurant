<?php include('partials-front/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="text-center">Order Report</h1>

        <br /><br /><br />
        <br><br>

        <?php 
        if(isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];

            // Get the order details from the database
            $sql = "SELECT * FROM tbl_order WHERE id=$order_id";
            $res = mysqli_query($conn, $sql);

            if($res == true) {
                $count = mysqli_num_rows($res);

                if($count == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
                    $order_date = $row['order_date'];
                    $status = $row['status'];
                } else {
                    header('location: myorders.php');
                }
            }
        } else {
            header('location: myorders.php');
        }
        ?>

        <table class="content-table">
            <tr>
                <th>Food</th>
                <td><?php echo $food; ?></td>
            </tr>
            <tr>
                <th>Price</th>
                <td><?php echo $price; ?></td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td><?php echo $qty; ?></td>
            </tr>
            <tr>
                <th>Total</th>
                <td><?php echo $total; ?></td>
            </tr>
            <tr>
                <th>Order Date</th>
                <td><?php echo $order_date; ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <?php 
                        if($status == "Ordered") {
                            echo "<label>$status</label>";
                        } elseif($status == "On Delivery") {
                            echo "<label style='color: orange;'>$status</label>";
                        } elseif($status == "Delivered") {
                            echo "<label style='color: green;'>$status</label>";
                        } elseif($status == "Cancelled") {
                            echo "<label style='color: red;'>$status</label>";
                        }
                    ?>
                </td>
            </tr>
        </table>

        <br><br>
        <a href="myorders.php" class="btn-primary" style="background-color: blue; color: white; border: none; padding: 5px 10px; text-decoration: none;">Back to Orders</a>

    </div>
</div>

<?php include('partials-front/footer.php'); ?>

<style>
.alert {
    color: green;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid green;
    margin-bottom: 20px;
    text-align: center;
}

.content-table {
    width: 50%;
    margin: auto;
    border-collapse: collapse;
}

.content-table th, .content-table td {
    border: 1px solid #ddd;
    padding: 8px;
}

.content-table th {
    background-color: #f2f2f2;
    text-align: left;
}

.btn-primary {
    display: inline-block;
    margin: 10px 0;
}
</style>
