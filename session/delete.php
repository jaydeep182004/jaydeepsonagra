<?php
$id=$_GET['id'];
include('conn.php');
$query="DELETE FROM session WHERE id='$id'";
$data=mysqli_query($conn,$query);
header("location:home.php?.$data");
if ($data) {
    session_start();
    session_destroy();
    header("location:login.php");

}
?>