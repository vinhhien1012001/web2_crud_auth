<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
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
                                <!-- EDIT -->
                                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |

                                <!-- DELETE -->
                                <a href="index.php?delete=<?= $row['id'] ?>"
                                    onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile;
                } else {
                    // Display message when no products are found
                    echo "<tr><td colspan='6' style='text-align: center;'>No products added yet!</td></tr>";
                }
                ?>



            </table>


        </div>

    </div>
</body>

</html>