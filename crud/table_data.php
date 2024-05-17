<!doctype html>
<html lang="en">
  <head>
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
<div class="container">
  <form method="post" align="center">
    <select name="sort_alphabet">
      <!-- <option value="">----select option---</option> -->
      <option value="a-z" <?php if(isset($_POST['sort_alphabet'])&& $_POST['sort_alphabet']=="a-z"){echo"selected";}?>>A-Z(ascending order)</option>
      <option value="z-a" <?php if(isset($_POST['sort_alphabet'])&& $_POST['sort_alphabet']=="z-a"){echo"selected";}?>>Z-A(descending order)></option>
    </select>
    <button type="submit" name="sortby">sort</button>
  </form>
  <br>

<table border="2px" align="center" class="table table-dark table-striped">

  <thead>
    <tr>
            <th>id</th>
            <th>name</th>
            <th>password</th>
            <th>state</th>
            <th>gender</th>
            <th>hobbies</th>
            <th>image</th>
            <th colspan="2">action</th>
          </tr>
        </thead>
        <tbody>
          <?php
       include('connection.php');
       
       
       $query="";
       $sort_option="";
       if(isset($_POST['sortby'])){
       if(isset($_POST['sort_alphabet'])){
          if($_POST['sort_alphabet']=="a-z"){
            $sort_option="ASC";
          }
          elseif($_POST['sort_alphabet']=="z-a"){
            $sort_option="DESC";
          }
        
       }
      }
      
       $limit=5;
       if(isset($_GET['page'])){
         $page=$_GET['page'];
       }
       else{
        $page=1;
       }
       $offset=($page-1)*$limit;
       $selectquery="SELECT * FROM tabledata ORDER BY name $sort_option LIMIT $offset,$limit";
       $query=mysqli_query($conn,$selectquery);

while ($res=mysqli_fetch_array($query)){
   
  echo" <tr>
             <td>". $res['id']."</td>
             <td>". $res['name']."</td>
             <td>". $res['password']."</td>
             <td>". $res['state']."</td>
             <td>". $res['gender']."</td>
             <td>". $res['hobbies']."</td>
             <td><img src='".$res['image']."' width='100px' height='100'></td>

            <td><a href='formdata.php?id=$res[id]'>edit</a></td>
             <td><a href='deletedata.php?id=$res[id]'>delete</a></td>
        </tr>";
      
        }
     ?>
     </tbody>
 </table>
 <?php
  
  $sql1="SELECT * FROM tabledata";
  $query1=mysqli_query($conn,$sql1) or die("query failed.");
  if(mysqli_num_rows($query1)>0){
    $total_records=mysqli_num_rows($query1);
    $total_page=ceil($total_records / $limit);
      echo'<ul class="min-vh-1 d-flex justify-content-center align-items-ceneter">';
      if(isset($_GET['page'])){
        $page="active";
      }
      echo'<button class="btn btn-outline-primary"><a href="table_data.php?page=1">privew</a></button>';
    for ($i=1; $i<=$total_page; $i++) { 
      echo '<button class="btn btn-outline-primary"><a href="table_data.php?page='.$i.'">'.$i.'</a></button>';
    }
    // $a=1;
    // echo'<button class="btn btn-outline-primary"><a href="table_data.php?page='.$a++.'">next</a></button>';
    // echo"</ul>";
  }
?>
  </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 