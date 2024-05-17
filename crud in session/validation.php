<?php
include ('connection.php');
session_start();
if (isset($_POST['updateid'])) {
    $updateid = $_POST['updateid'];
}
if (isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];
}
$name = $_POST['name'];
$email = $_POST['email'];
$lan = $_POST['lan'];
$gender = $_POST['gender'];
$error = [];
$value = [];



if (isset($_POST['submit']) || isset($_POST['update'])) {

    if ($name == "") {
        $error['nameerr'] = "enter your name";
    }
    if ($email == "") {
        $error['emailerr'] = "enter your email";
    }
    if ($lan == "") {
        $error['lanerr'] = "enter your language";
    }
    if ($gender == "") {
        $error['gendererr'] = "enter your gender";
    }
    if (isset($_FILES['image'])) {
        if ($_FILES['image']['error'] == 0) {
            $filename = $_FILES['image']['name'];
            $tmpname = $_FILES['image']['tmp_name'];
            $folder = "images/" . $filename;
            move_uploaded_file($tmpname, $folder);
        }
    }
    if (!empty($error)) {
        $_SESSION['error'] = $error;
        $_SESSION['value'] = $_POST;
        header('Location:form.php?id=' . $updateid . '');
    }
}
if ($name !== "" && $email !== "" && $lan !== "" && $gender !== "" ) {
    if (isset($_POST['submit'])) {
        $insert = "INSERT INTO `session_crud`(`name`, `email`, `lan`, `gender`, `image`) VALUES ('$name','$email','$lan','$gender','$folder')";
        $query = mysqli_query($conn, $insert);
        header("Location:form.php");
    }
    if (isset($_POST['update'])) {
        $update = "UPDATE `session_crud` SET `name`='$name ', `email`='$email', `lan`='$lan ', `gender`='$gender'";
        if (!empty($folder)) {
            $update .= ", `image`='$folder'";
        }
        $update.="WHERE id=$updateid"; 
        $query = mysqli_query($conn, $update);
        header("Location:form.php");

    }
}
if (isset($_GET['deleteid'])) {
    $delete = "DELETE  FROM `session_crud` WHERE `id`='$deleteid'";
    $query = mysqli_query($conn, $delete);
    header("Location:form.php");
}

?>