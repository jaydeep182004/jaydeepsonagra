<?php
    include('database.php');


if(isset($_POST['delete'])){
    $delid=$_POST['delete'];

        $query="DELETE FROM student WHERE id='$delid'";
        $del=mysqli_query($conn,$query);
echo$del;
}

?>