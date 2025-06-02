<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for centering the card */
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="centered">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Update Product</h2>
                <?php
                // Assuming you have a database connection established
                require("./includes/common.php");

                // Check if product ID is provided in URL
                if(isset($_GET['id'])) {
                    $productId = $_GET['id'];

                    // Fetch product details from the database
                    $query = "SELECT * FROM products WHERE id=$productId";
                    $result = mysqli_query($con, $query);

                    // Check if product exists
                    if(mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $productName = $row['name'];
                        $productPrice = $row['price'];
                        $productImage = $row['image'];
                        ?>
                        <form action="update_product.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                            <div class="form-group">
                                <label for="productName">Product Name:</label>
                                <input type="text" id="productName" name="productName" class="form-control" value="<?php echo $productName; ?>">
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product Price:</label>
                                <input type="text" id="productPrice" name="productPrice" class="form-control" value="<?php echo $productPrice; ?>">
                            </div>
                            <div class="form-group">
                                <label for="productImage">New Product Image:</label>
                                <input type="file" id="productImage" name="productImage" class="form-control-file">
                            </div>
                            <img src="<?php echo $productImage; ?>" alt="Current Product Image" class="img-fluid mb-3">
                            <button type="submit" class="btn btn-primary" name="submit">Update Product</button>
                        </form>
                        <?php
                    } else {
                        echo "Product not found.";
                    }
                } else {
                    echo "Product ID not provided.";
                }

                // Close the database connection
                mysqli_close($con);
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>