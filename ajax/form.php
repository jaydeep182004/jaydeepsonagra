
<!doctype html>
<html lang="en">
  <head>
  <style>
    .err{
      color:red;
    }
    .modal-title{
      align:center;
    }
    .text-center{
      color:pink;
      background:black;
    }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  
  </head>
  <body>
    <div class="container"> 
      <div class="text-center">
     <h1>Ajax Crud validation</h1>
     </div>
    <div  class="d-flex justify-content-end container">
<button type="button" id="add_data" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Data
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">SUBMIT DATA </h5>
      <h5 class="modal-title" id="example" >UPDATE DATA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="my-form">

            username:<input type="text" name="username" id="username">
            <div class="err" id="username-error"></div>
            <br>
            password:<input type="text" name="password" id="password">
            <div class="err" id="password-error"></div>
            <br>
            state:<select name="state"  id="state">
                <option value=""></option>
                <option value="gujrat">gujrat</option>
                <option value="goa">goa</option>
                <option value="punjab">punjab</option>
              </select>
              
            <div class="err" id="state-error"></div>
            <br>
            gender:<input type="radio" name="gender" id="1" value="male">male
                <input type="radio" name="gender" id="2" value="female">female 
                  
            <div class="err" id="gender-error"></div> <br>
            hobbies:<input type="checkbox" name="hobbies[]" value="writing">writing
                <input type="checkbox" name="hobbies[]" value="playing">playing
                <input type="checkbox" name="hobbies[]" value="watching">watching<br>
                <input type="checkbox" name="hobbies[]" value="reading">reading
                <input type="checkbox" name="hobbies[]" value="gaming">gaming 
                <input type="checkbox" name="hobbies[]" value="music">music   
            <div class="err" id="hobbies-error"></div><br>
            <input type="hidden" id="stuid">
	 
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" name="submit" id="lode-button"class="btn btn-primary">submit</button>
        <button type="button" name="update" id="up-button"class="btn btn-primary">update</button>
        <input type="hidden" name="" id="hidden_user">
      </div>
    </div>
  </div>  
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
	</script>
	<script>
    $(document).ready(function(){
      readrecord();
    });
    function readrecord() {
      let record="record";
      $.ajax({
            type: 'POST',
            url: 'table.php',
            data: {record:record},
            datatype:"json",
            success: function(data) {
              
              $('#record_contant').html(data);
          }
        })
    }

 $("#add_data").on('click',function(){
      $("#lode-button").show();
       $("#up-button").hide();
       $("#exampleModalLabel").show();
       $("#example").hide();

    let id=$("#stuid").val("");
    let username=$("#username").val("");
 		let password=$("#password").val("");
		let state=$("#state").val("");
    let gender=$("input[name='gender']:checked");
    $("#1").prop("checked",false);
    $("#2").prop("checked",false);
    $('input[name=hobbies\\[\\]]').prop('checked',false);

            $('#username-error').html("");
            $('#password-error').html("");
            $('#state-error').html("");
            $('#gender-error').html("");
            $('#hobbies-error').html("");

     });

 	 $("#lode-button,#up-button").on('click',function(){
  
    let id=$("#stuid").val();
		let username=$("#username").val();
 		let password=$("#password").val();
		let state=$("#state").val();
    let gender=$("input[name='gender']:checked").val();
    let hobbies=[];
    $("input[name='hobbies[]']:checked").each(function(){;
     hobbies.push(this.value);       
    });
    
     if(!$("input[name='gender']:checked").val()){
      gender="";
    }
    if(!$("input[name='hobbies[]']:checked").val()){
      hobbies="";
    }

        $.ajax({
            type: 'POST',
            url: 'save.php',
            data: {id:id,username:username,password:password,state:state,gender:gender,hobbies:hobbies},
            dataType: 'json',
          success: function(res) {
              console.log(res);
              readrecord();

            $('#username-error').html("");
            $('#password-error').html("");
            $('#state-error').html("");
            $('#gender-error').html("");
            $('#hobbies-error').html("");

            if (res.success==200) {
                    $('#username-error').html(res.response.username);
                    $('#password-error').html(res.response.password);
                    $('#state-error').html(res.response.state);
                    $('#gender-error').html(res.response.gender);
                    $('#hobbies-error').html(res.response.hobbies);
                    
            }
            else{
                  
                 $("#exampleModal").modal('hide'); 
                }
        }
      });
  });

// delete dode
function deleteuser(deleteid) {
  $.ajax({
      url:"delete.php",
      type:"post",
      data:{delete:deleteid},
      datatype:"jason",
      success: function(data) {
        readrecord();
      }
  });  
}
// edit code
function getuserdetails(upid) {
  
        $('#username-error').html("");
        $('#password-error').html("");
        $('#state-error').html("");
        $('#gender-error').html("");
        $('#hobbies-error').html("");

  $("#exampleModal").modal('show');
  $("#exampleModalLabel").hide();
  $("#example").show();
   $("#up-button").show();
  $("#lode-button").hide();
  $("#hidden_user").val(upid);

    mydata={id:upid};
    $.ajax({
    url:"update.php",
    method:"POST",
    dataType:"json",
    data:JSON.stringify(mydata),
    success:function (data){
      
      $("#stuid").val(data.id);
      $("#username").val(data.name);
     	$("#password").val(data.password);
	   	$("#state").val(data.state);
      if(data.gender=="male"){
        $("#1").prop("checked",true);
      }
      else{
        $("#2").prop("checked",true);
      }
      let hobb=data.hobbies;

      $("input[name='hobbies[]']").prop("checked",false);
      var hobby = hobb.split(', ');
    
      $("input[name='hobbies[]']").each(function() {
    if (hobby.includes($(this).val())) {
        $(this).prop('checked', true);
    }
  });

      
    }
});
    
}

</script>
<br><br>
<center><h2>All Reacord</h2></center>
<div id="record_contant">
 </div>
      </div>
  </body>
</html>