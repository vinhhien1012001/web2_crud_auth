<?php
include 'database.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
}

if (isset($_POST['save'])) {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $supplier = $_POST['supplier'];
    $category = $_POST['category'];

    mysqli_query($conn, "INSERT INTO products (product_name, quantity, price, supplier, category) VALUES ('$product_name', $quantity, $price, '$supplier', '$category')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Products</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="add_product">
    <h2>Add New Products</h2>
    <form method="POST">
        <label for="product_name" class="mb-4">Product name</label>
        <input type="text" class="mb-12" name="product_name" required>

        <label class="mb-4" for="quantity">Quantity</label>
        <input class="mb-12" type="number" name="quantity" required>

        <label class="mb-4" for="price">Price</label>
        <input class="mb-12" type="number" name="price" required>

        <label class="mb-4" for="supplier">Supplier</label>
        <input class="mb-12" type="text" name="supplier" required>


        <label class="mb-4" for="category">Category</label>
        <input type="text" name="category" required>

        <div class="flex-around mt-16">
            <button class="button" type="submit" name="save">Save</button>
            <a href="index.php" class="secondary_button">Back to List</a>
        </div>
    </form>
</body>

</html>