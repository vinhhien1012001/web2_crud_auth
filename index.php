<?php
include 'database.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $id = mysqli_real_escape_string($conn, $id);

    $deleteQuery = "DELETE FROM products WHERE id = $id";
    if (mysqli_query($conn, $deleteQuery)) {
        $_SESSION['message'] = "Product deleted successfully!";
    } else {
        $_SESSION['message'] = "Error deleting product: " . mysqli_error($conn);
    }

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth Credential</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="home">
        <div class="home_header">
            <h2>Welcome, <?php echo $_SESSION['email']; ?></h2>
            <a class="button" href="./logout.php">Logout</a>
        </div>


        <div class="home_container">
            <h3>Inventory Management</h3>
            <!-- CREATE -->
            <a class="button" href="./create.php">Add</a>

            <!-- READ -->
            <table border="1" cellpadding="10" class="home_table">
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Supplier</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                <?php
                require_once("database.php");
                $sql = "SELECT id, product_name, quantity, price, supplier, category FROM products";
                $result = $conn->query($sql);


                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['product_name'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['supplier'] ?></td>
                            <td><?= $row['category'] ?></td>
                            <td>
                                <button class="action_button">
                                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                                </button>
                                |
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button class="action_button" type="submit" name="delete"
                                        onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile;
                } else {
                    echo "<tr><td colspan='6' style='text-align: center;'>No products added yet!</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>