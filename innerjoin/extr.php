
        
<?php
$id="";
if(isset($_GET['imagevalue'])){
$ivalue=$_GET['imagevalue'];
}
if (isset($_GET['ID'])) {
    
    $id=$_GET['ID'];
    echo$id;
}
include('connection.php');    
 $val="";
$category="SELECT * FroM category";
$query1=mysqli_query($conn,$category);

$num=mysqli_num_rows($query1);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .error{
            color:red;
        }
        .head{
            color:green;
        }

    </style>
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
          <a class="nav-link active" aria-current="page" href="category.php">categry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="formdata.php">form</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=php-data&table=product">database</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="table_data.php">table</a>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br>
<div class="container min-vh-100 d-flex justify-content-center align-items-ceneter my-2 bg-dark w-50 text-light p-2">
    
    <form action="validation.php" method="post" enctype="multipart/form-data">
        <h2 align="center" class="head">crud form registration</h2><br>
        name:<input type="text" name="name" value="<?php
            if (isset($_GET['name'])) {
                echo $_GET['name'];
            }
            ?>">
            <div class="error">
                <?php if (isset($_GET['nameerr']))
                    echo $_GET["nameerr"]; ?>
            </div>
            <br><br>

            password:<input type="text" name="password" value="<?php
            if (isset($_GET['password'])) {
                echo $_GET['password'];
            }
            // 
            ?>">
            <div class="error">
                <?php if (isset($_GET['passerr']))
                    echo $_GET["passerr"]; ?>
            </div>
            <br><br>

            state:<select name="state">
                <option></option>
                <option value="gujrat" <?php if (isset($_GET['state'])) {
                    if ($_GET['state'] == "gujrat") {
                        echo "selected";
                    }
                }
                if (isset($_GET['ID'])) {
                    if ($_GET['state'] == "gujrat") {
                        echo "selected";
                    }
                }
                ?>>gujrat</option>
                <option value="goa" <?php if (isset($_GET['state'])) {
                    if ($_GET['state'] == "goa") {
                        echo "selected";
                    }
                }
                if (isset($_GET['ID'])) {
                    if ($_GET['state'] == "goa") {
                        echo "selected";
                    }
                }
                ?>>goa</option>
                <option value="punjab" <?php if (isset($_GET['state'])) {
                    if ($_GET['state'] == "punjab") {
                        echo "selected";
                    }
                }
                if (isset($_GET['ID'])) {
                    if ($_GET['state'] == "punjab") {
                        echo "selected";
                    }
                }
                ?>>punjab</option>
            </select>
            <div class="error">
                <?php if (isset($_GET['stateerr']))
                    echo $_GET["stateerr"]; ?>
            </div>
            <br><br>

            gender:
            <input type="radio" name="gender" value="male" <?php if (isset($_GET['gender'])) {
                if ($_GET['gender'] == "male") {
                    echo "checked";
                }
            }
            ?>>Male
            <input type="radio" name="gender" value="female" <?php if (isset($_GET['gender'])) {
                if ($_GET['gender'] == "female") {
                    echo "checked";
                }
            }

            ?>>Female
            <input type="radio" name="gender" value="other" <?php if (isset($_GET['gender'])) {
                if ($_GET['gender'] == "other") {
                    echo "checked";
                }
            }

            ?>>Other
            <div class="error">
                <?php if (isset($_GET['gendererr']))
                    echo $_GET["gendererr"] ?>
                </div>
                <br><br>

                hobbies:<input type="checkbox" name="hobbies[]" value="writing" <?php for ($i = 0; $i < 6; $i++) {
                    if (isset($_GET['hobbies'][$i]) && $_GET['hobbies'][$i] == "writing") {
                            echo "checked";
                        }
                    }
            ?>>writing
            <input type="checkbox" name="hobbies[]" value="playing" <?php for ($i = 0; $i < 6; $i++) {
                if (isset($_GET['hobbies'][$i])) {
                    if ($_GET['hobbies'][$i] == "playing") {
                        echo "checked";
                    }
                }
            }
            
            ?>>playing

            <input type="checkbox" name="hobbies[]" value="whaching" <?php for ($i = 0; $i < 6; $i++) {
                if (isset($_GET['hobbies'][$i])) {
                    if ($_GET['hobbies'][$i] == "whaching") {
                        echo "checked";
                    }
                }
            }
            ?>>whaching

            <input type="checkbox" name="hobbies[]" value="reading" <?php for ($i = 0; $i < 6; $i++) {
                if (isset($_GET['hobbies'][$i])) {
                    if ($_GET['hobbies'][$i] == "reading") {
                        echo "checked";
                    }
                }
            }
            
            ?>>reading

            <input type="checkbox" name="hobbies[]" value="gaming" <?php for ($i = 0; $i < 6; $i++) {
                if (isset($_GET['hobbies'][$i])) {
                    if ($_GET['hobbies'][$i] == "gaming") {
                        echo "checked";
                    }
                }
            }

            ?>>gaming

            <input type="checkbox" name="hobbies[]" value="music" <?php for ($i = 0; $i < 6; $i++) {
                if (isset($_GET['hobbies'][$i])) {
                    if ($_GET['hobbies'][$i] == "music") {
                        echo "checked";
                    }
                }
            }
            
            ?>>music
            <div class="error">
                <?php if (isset($_GET['hobbieserr']))
                    echo $_GET["hobbieserr"]; ?>
            </div>
            <br><br>
            <input type="file" name="image"><br><br>
            <?php
            if (isset($_GET['imagevalue'])) {
                echo "<img src=" . $_GET['imagevalue'] . " width='200px' height='200'>";
            }
            if (isset($_GET['ID'])) {

                echo "<img src=" . $_GET['image'] . " width='200px' height='200'>";

            }?>

            <br><br>
        category:<select name="category">
        <option></option>
        <?php while ($row=mysqli_fetch_assoc($query1)) {
                     echo"<option value=".$row['ID']."> ".$row['mobile']."</option>";
                    }?>
        </select>
        <div class="error"> <?php if(isset($_GET['caterr'])) echo $_GET["caterr"];?></div>

        <br><br>

        <input type="submit" name="submit" value="submit">
        <input type="submit" name="update" value="update">
        <input type="hidden" name="id1" value="<?php if(isset($_GET['ID'])){
                echo$_GET['ID'];
            } 
            if(isset($_GET['idname'])){
                $xyz=$_GET['idname'];
                echo$xyz;
            }?>">
            <button type="button" name="relod" ><a href="formdata.php">relod</a></button>
        </form>
        
        </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>






<?php
include('connection.php');


 
 $id=$_POST["id1"];
 $query="formdata.php?idname=$id";   
    $name="";
   if($_POST["name"]==""){
       $query.="&nameerr=please enter your name";
       
     } 
     else {
        $name=$_POST["name"];
        $query.="&name=$name"; 
        
     }
     
     if (empty($_POST["password"])) {
        $query.="&passerr=please enter your password";
           
         
       } 
       else {
         $password = $_POST["password"];
         $query.="&password=$password"; 
       
       }
     if (empty($_POST["state"])) {
       $query.="&stateerr=please enter your state";
       
              
      } 
     else {
       $state = $_POST["state"]; 
       $query.="&state=$state";
       
     }
     
     if (empty($_POST["gender"])) {
       $query.= "&gendererr=please enter your gender";
       
     } 
     else {
            $gender = $_POST["gender"];
            $query.="&gender=$gender";
          }
 if(empty($_POST['category'])){
  $query.="&caterr=please enter your category";
 }
 else{
  $category=$_POST["category"];
  echo$category;

  $query.="&cat=$category";
 }
      if (empty($_POST["hobbies"])) {
              $query.="&hobbieserr=please enter your hobbies";
              
            } 
       else {
                $hobbies = $_POST["hobbies"];
                $allvalue=implode(",",$hobbies);
                foreach ($hobbies as $key => $value) {
                 $query.="&hobbies[$key]=$value";
                 
                }
             $checkbox=count($_POST["hobbies"]);
       if($checkbox<2){
                 $query.="&hobbieserr=please select your minimum 2 hobbies";
               
               }
       elseif($checkbox>4){
         $query.="&hobbieserr=please select your maximum 4 hobbies";
     
       }
      }

      
       $imagevalue=$_FILES["image"]["name"];
       $filepath=$_FILES["image"]["tmp_name"];
       $folder="moveimage/".$imagevalue;
      move_uploaded_file($filepath,$folder);

      
      if ($imagevalue =="") {
        $query.="&imagerr=*please select your photo";
      }
      else{
        $query.="&image=$folder";
      }
          
          header("location:$query");
          
    if($name!="" && $password!="" && $state!="" && $gender!="" && $checkbox>=2 && $checkbox<=4 && $imagevalue!=""){
      if(isset($_POST['submit'])){
        $sql = "INSERT INTO product(name,password,gender,state,hobbies,mobile,image)
        VALUES ('".$_POST['name']."','".$_POST['password']."','".$_POST['gender']."','".$_POST['state']."','".$allvalue."','".$_POST['category']."','".$folder."')";
        $result = mysqli_query($conn,$sql);
        header("location:table_data.php");
      }
    }

    if($name!="" && $password!="" && $state!="" && $gender!="" && $checkbox>=2 && $checkbox<=4){
      if(isset($_POST['update'])){
       
      $update="UPDATE product set name='$name',password='$password',state='$state',gender='$gender',hobbies='$allvalue',category='$category'";
      
      if($_FILES["image"]["name"]){
        $imagevalue=$_FILES["image"]["name"];
        $filepath=$_FILES["image"]["tmp_name"];
        $folder="moveimage/".$imagevalue;
      move_uploaded_file($filepath,$folder);

      $update.=", `image`='$folder'";
    }
    $update.="WHERE ID=$id";

    $data=mysqli_query($conn,$update);

    header("location:table_data.php");
    }
   }

?>
        $selectquery = "SELECT * FROM product INNER JOIN category  ON product.mobile=category.id";
        <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">crud</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link"
              href="http://localhost/phpmyadmin/index.php?route=/sql&db=php-data&table=tabledata&pos=0">database</a>
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

    <table border="2px" align="center" class="table table-dark table-striped">

      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>password</th>
          <th>state</th>
          <th>gender</th>
          <th>hobbies</th>
          <th>mo </th>
          <th>image</th>
          <th colspan="2">action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $hobbs="";
        include('connection.php');

        $selectquery = "SELECT * FROM product INNER JOIN category  ON product.mobile=category.id";
        $query = mysqli_query($conn, $selectquery);

        while ($res = mysqli_fetch_array($query)) {
          $hobbies = $res['hobbies'];
          $hobb = explode(",", $hobbies);
          foreach ($hobb as $key => $value) {
            $hobbs.= "&hobbies[$key]=$value";
          }
        
          echo " <tr>
             <td>" . $res['ID']. "</td>
             <td>" . $res['name'] . "</td>
             <td>" . $res['password'] . "</td>
             <td>" . $res['state'] . "</td>
             <td>" . $res['gender'] . "</td>
             <td>" . $res['hobbies'] . "</td>
             <td>" . $res['mobile'] . "</td> 
             <td><img src='" . $res['image'] . "' width='100px' height='100'></td>
        
            <td><a href='formdata.php?id=$res[ID]&name=".$res['name']."&password=".$res['password']." &state=".$res['state']." &gender=".$res['gender'].$hobbs." &image=" .$res['image']. "'>edit</a>
             <a href='deletedata.php?id=$res[ID]'>delete</a></td>
        </tr>";

        }
        ?>
      </tbody>
    </table>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>