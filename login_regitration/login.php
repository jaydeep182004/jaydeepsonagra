<?php
session_start();

if(isset($_SESSION['email'])){
    header('location:home.php');
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<style>
    .small-form{
        width: 500px;
        background-color: aqua;
    }
    .button{
        background-color: black;
        color:white;
    }
</style>

<body>
    <br><br>
    <div class="container shadow small-form">
    <center>
            <h2>login form</h2>
        </center>
        <form action="validation.php" method="post">
           
            <div class="form-group">
                <label for="name">email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">

                <label for="name">password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="login" class="form-control button">
            </div>
        </form>
       <center><p>Don't have an account? <a href="registration.php">Register</a></p></center>
    </div>
    <?php

if(isset($_SESSION['login_error'])){
    echo "<script>alert('" . $_SESSION['login_error'] . "');</script>";
    unset($_SESSION['login_error']);
}
?>
</body>

</html>