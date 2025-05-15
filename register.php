<?php 
    include 'database.php';
    
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(name, surname, email, password) VALUES 
        ('$name', '$surname', '$email', '$hashed_password')
    ";
    if (mysqli_query($conn, $sql)) {
        echo "Register successful. <a href='login.html'>Login here</a>";
    } else {
        echo "ERROR", mysqli_error($conn);
    }
?>