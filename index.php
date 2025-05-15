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
        <h2>Welcome, <?php echo $_SESSION['email']; ?></h2>

        <a class="button" href="./logout.php">Logout</a>
    </div>
</body>

</html>