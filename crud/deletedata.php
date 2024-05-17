<?php
$id=$_GET['id'];
include('connection.php');
$query="DELETE FROM tabledata WHERE id='$id'";
$data=mysqli_query($conn,$query);
header("location:table_data.php?.$data");

?>