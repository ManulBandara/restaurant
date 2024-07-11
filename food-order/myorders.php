<?php include('partials-front/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="text-center">Order Details</h1>

        <br /><br /><br />
        <br><br>

        <?php 
        if(isset($_SESSION['delete'])) {
            echo "<div class='alert'>" . $_SESSION['delete'] . "</div>";
            unset($_SESSION['delete']); // Remove the message after displaying it
        }
        ?>

        <center>
        <table class="content-table">
            <tr>
                <th>S.N. </th>
                <th>Food </th>
                <th>Price </th>
                <th>Qty. </th>
                <th>Total </th>
                <th>Order Date </th>
                <th>Status </th>
                <th>Actions</th>
            </tr>
            <hr>
            <?php 
                //Get all the orders from database
                $sql = "SELECT * FROM tbl_order WHERE u_id={$_SESSION['u_id']} ORDER BY id DESC"; // Display the Latest Order at First
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count the Rows
                $count = mysqli_num_rows($res);

                $sn = 1; //Create a Serial Number and set its initial value as 1

                if($count > 0)
                {
                    //Order Available
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //Get all the order details
                        $id = $row['id'];
                        $food = $row['food'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $total = $row['total'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
            ?>
                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $food; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php echo $qty; ?></td>
                            <td><?php echo $total; ?></td>
                            <td><?php echo $order_date; ?></td>
                            <td>
                                <?php 
                                    // Ordered, On Delivery, Delivered, Cancelled
                                    if($status == "Ordered")
                                    {
                                        echo "<label>$status</label>";
                                    }
                                    elseif($status == "On Delivery")
                                    {
                                        echo "<label style='color: orange;'>$status</label>";
                                    }
                                    elseif($status == "Delivered")
                                    {
                                        echo "<label style='color: green;'>$status</label>";
                                    }
                                    elseif($status == "Cancelled")
                                    {
                                        echo "<label style='color: red;'>$status</label>";
                                    }
                                ?>
                            </td>
                            <td>
                                <form action="delete-order.php" method="POST" onsubmit="return confirmDelete()" style="display: inline;">
                                    <input type="hidden" name="order_id" value="<?php echo $id; ?>">
                                    <input type="submit" name="delete" value="Delete" class="btn-danger" style="background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                                </form>
                                <form action="view-report.php" method="GET" style="display: inline;">
                                    <input type="hidden" name="order_id" value="<?php echo $id; ?>">
                                    <input type="submit" name="view" value="View Report" class="btn-primary" style="background-color: blue; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                                </form>
                                <form action="payment-options.php" method="GET" style="display: inline;">
                                    <input type="hidden" name="order_id" value="<?php echo $id; ?>">
                                    <input type="submit" name="pay" value="Pay Now" class="btn-primary" style="background-color: green; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                                </form>
                            </td>
                        </tr>
            <?php
                    }
                }
                else
                {
                    //Order not Available
                    echo "<tr><td colspan='8' class='error'>You have not placed any orders yet!!!</td></tr>";
                }
            ?>
        </table>
        </center>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this order?");
}
</script>

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

/* Ensure the footer is at the bottom */
html, body {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
}

.main-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.wrapper {
    flex: 1;
}
</style>
