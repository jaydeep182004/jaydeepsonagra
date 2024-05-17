<?php

include('connection.php');
class delete extends database{
    function deletename() {
        $id=$_GET['id'];
        $query="DELETE FROM oppstable WHERE id='$id'";
        $data=mysqli_query($this->conn,$query);
        header("location:table_data.php?.$data");


    }
}
$del=new delete();
$del->deletename();
?>