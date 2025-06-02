<?php
// Assuming you have a database connection established
require("./includes/common.php");

// Check if product ID is provided in URL
if(isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Delete the product from the database
    $query = "DELETE FROM products WHERE id=$productId";
    $result = mysqli_query($con, $query);

    if($result) {
        // Product successfully deleted
        echo "<script>alert('Product deleted successfully');</script>";
    } else {
        // Failed to delete product
        echo "<script>alert('Failed to delete product');</script>";
    }

    // Redirect back to manageProducts.php
    echo "<script>window.location.href = 'manageProducts.php';</script>";
} else {
    // Product ID not provided
    echo "<script>alert('Product ID not provided');</script>";
    // Redirect back to manageProducts.php
    echo "<script>window.location.href = 'manageProducts.php';</script>";
}

// Close the database connection
mysqli_close($con);
?>
