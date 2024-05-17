<?php
session_start();
include ('connection.php');


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $password = password_hash($pass, PASSWORD_BCRYPT);
    $select = "SELECT * FROM `registration` WHERE `email` = '$email'";
    $sql = mysqli_query($conn, $select);
    $emailcount = mysqli_num_rows($sql);
    if ($emailcount > 0) {
        session_start();
        $_SESSION['registration_error'] = "Email is already registered.";
        header('location:registration.php');

    } else {
        $insert = "INSERT INTO `registration`( `name`, `email`, `password`) VALUES ('$name','$email','$password')";
        $sql = mysqli_query($conn, $insert);
        header('location:login.php');

    }

}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "SELECT * FROM `registration` WHERE `email` = '$email'";
    $sql = mysqli_query($conn, $select);

    if ($res = mysqli_fetch_array($sql)) {
        $pass = $res['password'];
        $_SESSION['email'] = $res['email'];
        $password = password_verify($password, $pass);

        if ($password) {
            header('location:home.php');
        } else {
            $_SESSION['login_error'] = "Invalid email or password.";
            header('location:login.php');

        }

    } else {

        $_SESSION['login_error'] = "Email not registered.";
        header('location:login.php');
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('location:login.php');
}
?>