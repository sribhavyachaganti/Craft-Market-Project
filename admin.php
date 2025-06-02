<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Admin Panel</h2>

        <!-- Navigation Links -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#manage_products" data-toggle="tab">Manage Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#manage_users" data-toggle="tab">Manage Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#manage_orders" data-toggle="tab">Manage Orders</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-4">
            <!-- Manage Products Tab -->
            <div class="tab-pane fade show active" id="manage_products">
                <?php include('manageProducts.php'); ?>
            </div>

            <!-- Manage Users Tab -->
            <div class="tab-pane fade" id="manage_users">
                <?php include('manageUsers.php'); ?>
            </div>

            <!-- Manage Orders Tab -->
            <div class="tab-pane fade" id="manage_orders">
                <?php include('manageOrders.php'); ?>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="container mt-3">
        <a href="javascript:history.back()" class="btn btn-primary">Back</a>
    </div>


    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
