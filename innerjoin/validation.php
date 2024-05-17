
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
       
      $update="UPDATE product SET name='$name',password='$password',state='$state',gender='$gender',hobbies='$allvalue',mobile='$category'";
      
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
