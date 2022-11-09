<?php 
session_start();
// if($_SESSION['id']!=''){
//   header("Location: mydashboard.php");
//   alert("hello");
// }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mypage</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body bgcolor="white">
	<div class="container-fluid">
  <div class="row">
  <div class="col-md-6" style="background-image: url('images/reg.jpg');background-size: contain; background-repeat:no-repeat ;background-position: center;">
  </div>
    <div class="col-md-6" style="padding-top: 4%;padding-left: 3%;">
    	<h1 style="font-size: 60px; font-family: arial black"><b>Make happening great</b></h1><br>
    	<h2><b>&nbsp;&nbsp;&nbsp;Join Thumsup today.</b></h2>
<?php if(isset($_SESSION['reg_msg'])){ ?>
      <div class="alert alert-success">
    <strong><?php echo $_SESSION['reg_msg']; unset($_SESSION['reg_msg']); ?></strong>
  </div>
<?php } ?>
      <div class="card" style="padding-right: 25%; border: none;">
        <div class="card-body text-center" >
          <form action="/action_page.php" id="form">
                  <div class="form-group">
                  	
                    <input type="text" class="form-control" id="email" placeholder="Email address or phone number" name="email"><br>
                    <p id="m1" class="text-danger"></p>
                    <input type="password" class="form-control" id="psw" placeholder="Password" name="psw"><br>
                    <p id="m2" class="text-danger"></p>
                    <button type="button" class="btn-primary form-control" onclick="fill()">Log In</button>
                    <hr>
                    <button type="button" class="btn-success form-control" onclick="location.href ='register.php'">Create New Account </button>
                  </div>
                </form>
              </div>
            </div>
    </div>
    
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type="text/javascript">
  function fill(){
    var res=false;
  var email=document.getElementById("email").value;
  var psw=document.getElementById("psw").value;
  
  if(email==""&&psw==""){
      document.getElementById("m1").innerHTML="Enter the Email ID";
      document.getElementById("m2").innerHTML="Enter the  Password";
    }
  else{
        // validate email
        if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value))) 
        {
          document.getElementById('m1').innerHTML="Invalid email id";
          return;
          res=false;
        }
        else
        {
          document.getElementById('m1').innerHTML="";
          res=true;
        }
        // validate password
        var mypwd = document.getElementById("psw");
        if(mypwd.value.length < 8) 
        {
          document.getElementById('m2').innerHTML="Password should contain at least 8 characters";
          mypwd.focus();
          return;
          res=false;
        }
        else{
          document.getElementById('m2').innerHTML="";
          res=true;
        }
      }
if(res==true){
        $.ajax({
          type: 'post',
          url: 'process01.php',
          data:$('form').serialize(),
          dataType: 'json',
          success: function(data){
            if(data.sts_code==0)
              {
                
                window.location.href='login.php';
              }
              else{
                alert(data.message);
              }
          }
        });
}
    }
</script>
</body>
</html>
