<?php
include 'db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$student = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    mysqli_query($conn, "UPDATE students SET name='$name', email='$email', age=$age WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
<h2>Edit Student</h2>
<form method="POST">
    Name: <input type="text" name="name" value="<?= $student['name'] ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= $student['email'] ?>" required><br><br>
    Age: <input type="number" name="age" value="<?= $student['age'] ?>" required><br><br>
    <button type="submit" name="update">Update</button>
</form>
<a href="index.php">Back to List</a>
</body>
</html>
