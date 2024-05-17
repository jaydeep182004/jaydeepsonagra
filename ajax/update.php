<?php
 include('database.php');

$data=stripslashes(file_get_contents("php://input"));
$mydata=json_decode($data,true);
$id=$mydata['id'];

$sql= "SELECT * FROM student WHERE id={$id} ";
$result=$conn->query($sql);
$res=$result->fetch_assoc();

echo json_encode($res);



?>