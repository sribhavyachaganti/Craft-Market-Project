<?php
// Assuming you have a database connection established
require("./includes/common.php");
// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get form data
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    
    // Check if a new image is uploaded
    if(isset($_FILES['productImage']['name']) && $_FILES['productImage']['name'] != "") {
        // File upload handling
        $targetDir = "uploads/"; // Directory where images will be uploaded
        $fileName = basename($_FILES['productImage']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        
        // Allow certain file formats
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if(in_array($fileType, $allowedTypes)) {
            // Upload file to the server
            if(move_uploaded_file($_FILES['productImage']['tmp_name'], $targetFilePath)) {
                // Update product details in the database including the new image
                $query = "UPDATE products SET name='$productName', price='$productPrice', image='$targetFilePath' WHERE id=$productId";
                if(mysqli_query($con, $query)) {
                    echo "Product updated successfully.";
                } else {
                    echo "Error updating product: " . mysqli_error($con);
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "Invalid file format. Allowed formats: jpg, jpeg, png, gif.";
        }
    } else {
        // Update product details in the database without changing the image
        $query = "UPDATE products SET name='$productName', price='$productPrice' WHERE id=$productId";
        if(mysqli_query($con, $query)) {
            echo "Product updated successfully.";
        } else {
            echo "Error updating product: " . mysqli_error($con);
        }
    }
}
?>
