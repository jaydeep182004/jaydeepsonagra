<?php
include('connection.php');
$id=$_GET['id'];
echo$id;
$query="DELETE FROM product WHERE id='$id'";
$data=mysqli_query($conn,$query);
header("location:table_data.php?.$data");
?>