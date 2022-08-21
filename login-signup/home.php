<?php
session_start();

if (! isset($_SESSION['loggedin']) || !($_SESSION['loggedin'])) {
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

</head>

<body>
    <h1>Hello <?php echo $_SESSION['name'] ?></h1>
    <a href="logout.php"><button>Logout</button></a>
</body>

</html>