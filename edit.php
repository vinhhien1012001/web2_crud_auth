<?php
include 'database.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$product = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $supplier = $_POST['supplier'];
    $category = $_POST['category'];

    mysqli_query($conn, "UPDATE products SET product_name='$product_name', quantity=$quantity, price=$price, supplier='$supplier', category='$category' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit product</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="add_product">
    <h2>Edit product</h2>
    <form method="POST">
        <label for="product_name" class="mb-4">Product name</label>
        <input type="text" class="mb-12" name="product_name" value="<?= $product['product_name'] ?>" required>

        <label class="mb-4" for="quantity">Quantity</label>
        <input class="mb-12" type="number" name="quantity" value="<?= $product['quantity'] ?>" required>

        <label class="mb-4" for="price">Price</label>
        <input class="mb-12" type="number" name="price" value="<?= $product['price'] ?>" required>

        <label class="mb-4" for="supplier">Supplier</label>
        <input class="mb-12" type="text" name="supplier" value="<?= $product['supplier'] ?>" required>


        <label class="mb-4" for="category">Category</label>
        <input type="text" name="category" value="<?= $product['category'] ?>" required>

        <div class="flex-around mt-16">
            <button class="button" type="submit" name="update">Update</button>
            <a href="index.php" class="secondary_button">Back to List</a>
        </div>
    </form>
</body>

</html>