<?php
include('database.php');

if(isset($_POST)){
    $response =[];
    $error=[];
    $update=[];
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password=$_POST["password"];
    $state=$_POST["state"];
    $gender=$_POST["gender"];
    $hobbies=$_POST["hobbies"];
     

if($username=="" || $password=="" || $state=="" || $gender=="" || $hobbies==""){
     if (empty($username)) {
        $response['username'] = 'please enter your username';
    } 
    if (empty($password)) { 
        $response['password'] = 'please enter your password';
    } 
    if (empty($state)) {
        $response['state'] = 'please select your state';
    } 
    if (empty($gender)) {
        $response['gender'] = 'please select your gender';
    } 
    if (empty($hobbies)) {
        $response['hobbies'] = 'please select your hobbies';
    } 
    

       echo json_encode(['success'=>200,'response'=>$response]);

}

 else{

     $allvalue=implode(", ",$hobbies);
     if($id==""){

        $sql = "INSERT INTO `student`(`name`,`password`,`state`,`gender`,`hobbies`)
               VALUES ('$username','$password','$state','$gender','$allvalue')";
        $result = mysqli_query($conn,$sql);
       $error['insert']=100;
        
     }
    else{
         $updateed="UPDATE student SET `name`='$username',`password`='$password',`state`='$state',`gender`='$gender',`hobbies`='$allvalue'  WHERE `id`='$id' ";
        $query=mysqli_query($conn,$updateed);
       $update['update']=300;

    }
    echo json_encode(['success'=>0,'error'=>$error,'update'=>$update]);
    
  }

}


?>
