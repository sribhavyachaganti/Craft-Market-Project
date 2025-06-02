<?php
// Assuming you have a database connection established
    require("./includes/common.php");
   
// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get form data
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    
    // File upload handling
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["productImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["productImage"]["tmp_name"]);
    if($check !== false) {
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        } else {
            // Attempt to upload file
            if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
                // File uploaded successfully, insert product details into database
                $query = "INSERT INTO products (name, price, image) VALUES ('$productName', '$productPrice', '$targetFile')";
                if(mysqli_query($con, $query)) {
                    echo "Product added successfully.";
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($con);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Close the database connection
mysqli_close($con);
?>
