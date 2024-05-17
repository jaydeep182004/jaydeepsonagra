<?php
class database{
  public $conn;
     function __construct(){
        
    $this->conn = mysqli_connect("localhost", "root","","php-data");
    // $this->$conn;
}
}
 $connection=new database();



?>