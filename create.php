<?php
include 'db.php';

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    mysqli_query($conn, "INSERT INTO students (name, email, age) VALUES ('$name', '$email', $age)");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
<h2>Add New Student</h2>
<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Age: <input type="number" name="age" required><br><br>
    <button type="submit" name="save">Save</button>
</form>
<a href="index.php">Back to List</a>
</body>
</html>
