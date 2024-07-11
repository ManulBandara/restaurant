<?php 
include('config/constants.php');

if(isset($_POST['delete']))
{
    $order_id = $_POST['order_id'];

    // Delete the order from the database
    $sql = "DELETE FROM tbl_order WHERE id = $order_id";
    $res = mysqli_query($conn, $sql);

    if($res == true)
    {
        // Order deleted
        $_SESSION['delete'] = "Order Deleted Successfully";
        header('location:'.SITEURL.'myorders.php');
    }
    else
    {
        // Failed to delete order
        $_SESSION['delete'] = "Failed to Delete Order";
        header('location:'.SITEURL.'myorders.php');
    }
}
else
{
    // Redirect to order details page
    header('location:'.SITEURL.'myorders.php');
}
?>
