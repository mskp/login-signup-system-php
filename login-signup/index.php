<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_query = "SELECT * FROM user WHERE email='$email'";

    $sql_result = mysqli_query($connect, $sql_query);
    $rows_returned = mysqli_num_rows($sql_result);

    if ($rows_returned == 1) {
        $row = mysqli_fetch_assoc($sql_result);
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $row['name'];
            header('location: home.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login_signup.css">
</head>

<body>
    <div class="center">

        <h1>Login</h1>
        <form action="" method="post">

            <div class="inp">
                <input type="text" name="email" id="email" required>
                <span></span>
                <label for="email">Email</label>
            </div>

            <div class="inp">
                <input autocomplete="off" type="password" name="password" id="password" required>
                <span></span>
                <label for="password">Password</label>
            </div>

            <input type="submit" value="Login">

            <div class="signup-link">
                Don't have an account? <a href="signup.php">Sign up</a>
            </div>

        </form>

    </div>
</body>

</html>