<?php
include('connection.php');

$categry="";
$caterr="";
$cat="";
if(isset($_POST["submit"])){
    if (empty($_POST["cat"])) {
      $caterr = "please enter your categry";
    } else {
      $cat=$_POST["cat"];
    }
  
}
if(!empty($_POST["cat"])){
    $val="INSERT INTO  category(`mobile`)
    VALUES ('$cat')";
    $result = mysqli_query($conn,$val);
    header("location:formdata.php");

}

?>


<!doctype html>
<html lang="en">
  <head>
    <style>
        .err{
            color:red;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">crud</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="formdata.php">categry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="formdata.php">form</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/phpmyadmin/index.php?route=/sql&db=php-data&table=tabledata&pos=0">database</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="table_data.php">table</a>
        </li>
      </li>
    </ul>
    </div>
  </div>
</nav>
<br>

<form action="" method="post">
    <table>
    <tr>
        <td>categry</td>
        <td><input type="text" name="cat"></td>
    </tr>
    <tr><div class="err"><?php echo$caterr;?></div></tr>
    <tr>
    <td colspan="2" align="center"><input type="submit" name="submit"> </td>
    </tr>
   </table>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
 