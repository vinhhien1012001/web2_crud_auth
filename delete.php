<?php
session_start();
if (!isset($_SESSION['email'])) {
    header(header: "Location: login.html");
}

// Process delete operation if confirmed
if (isset($_GET['delete'])) {
    require_once("database.php");
    $id = $_GET['delete'];

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