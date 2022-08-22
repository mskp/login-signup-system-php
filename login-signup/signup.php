<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'partials/connection.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con_password = $_POST['c-password'];

    $sql_query = "SELECT * FROM user WHERE email='$email'";    
    $result = mysqli_query($connect, $sql_query);
    $rows_returned = mysqli_num_rows($result);

    if ($rows_returned > 0) {
        echo "<script>alert('User Already Exists')</script>";
    } elseif ($password <> $con_password) {
        echo "<script>alert('Password and Confirm password must match')</script>";
    } else {
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql_query = "INSERT INTO user(`name`, `email`, `password`, `date`) VALUES('$name', '$email', '$pass_hash', 'current_timestamp()')";
        $sql_result = mysqli_query($connect, $sql_query);
        if ($sql_result)
            header('location: index.php');
        // else
        //     echo 'Failed. Reason: ' . mysqli_error($connect);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style/style.css">
    <?php include 'partials/fav.php'; ?>
</head>

<body>
    <div class="center">

        <h1>Create new account</h1>
        <form action="" method="post">

            <div class="inp">
                <input type="text" name="name" id="name" required>
                <span></span>
                <label for="name">Full name</label>
            </div>

            <div class="inp">
                <input type="email" name="email" id="email" required>
                <span></span>
                <label for="name">Email</label>
            </div>

            <div class="inp">
                <input autocomplete="off" type="password" name="password" id="password" required>
                <span></span>
                <label for="password">Password</label>
            </div>

            <div class="inp">
                <input autocomplete="off" type="password" name="c-password" id="c-password" required>
                <span></span>
                <label for="c-password">Confirm Password</label>
            </div>

            <input type="submit" value="Sign Up">

            <div class="signup-link">
                Already a member? <a href="index.php">Login</a>
            </div>

        </form>

    </div>
</body>

</html>