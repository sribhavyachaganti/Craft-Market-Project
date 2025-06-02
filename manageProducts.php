<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Manage Products</h2>

        <!-- Button to Add Product -->
        <a href="addProduct.html" class="btn btn-primary mb-4">Add Product</a>

        <!-- Displaying Existing Products -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch products from the database and display them in rows
                // Assuming you have a database connection established
                require("./includes/common.php");

                $query = "SELECT * FROM products";
                $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $productId = $row['id'];
                        $productName = $row['name'];
                        $productPrice = $row['price'];
                        ?>
                        <tr>
                            <td><?php echo $productId; ?></td>
                            <td><?php echo $productName; ?></td>
                            <td><?php echo $productPrice; ?></td>
                            <td>
                                <!-- Update Button -->
                                <a href="update_form.php?id=<?php echo $productId; ?>" class="btn btn-sm btn-primary">Update</a>
                                <!-- Delete Button -->
                                <a href="deleteProduct.php?id=<?php echo $productId; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='4'>No products found</td></tr>";
                }

                // Close the database connection
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
