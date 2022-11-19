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
  <div class="col-md-6" style="background-image: url('images/reg.jpg'); background-size: contain; background-repeat:no-repeat ;background-position: center;">
  </div>
    <div class="col-md-6" style="padding-top: 4%;padding-left: 3%;">
    	<h1 style="font-size: 60px; font-family: arial black"><b>Make happening great</b></h1>
 
  <div class="card" style="padding-right: 25%; border: none;">
              <div class="card-body text-center" >
                <form action="action_page.php" id="form">
                  <div class="form-group">
                  	<input type="email" class="form-control" id="email" placeholder="Email address" name="email"><br>
                    <p id="m1" class="text-danger"></p>
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name"><br>
                    <p id="m2" class="text-danger"></p>
                    <input type="text" class="form-control" id="phone" placeholder="Phone number" name="phone"><br>
                    <p id="m3"class="text-danger"></p>
                    <input type="password" class="form-control" id="psw" placeholder="Password" name="psw"><br>
                    <p id="m4"class="text-danger"></p>
                    <input type="password" class="form-control" id="re_psw" placeholder="Re-enter Password" name="re_psw"><br>
                    <p id="m5"class="text-danger"></p>
                    <button type="button" class="btn-primary form-control" onclick="fill()">Register</button><br>
                    <a href="#" class="card-link">Back to login</a>
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
  var name=document.getElementById("name").value;
  var phone=document.getElementById("phone").value;
  var psw=document.getElementById("psw").value;
  var re_psw=document.getElementById("re_psw").value;
  if(name==""&&email==""&&phone==""&&psw==""&&re_psw==""){
      document.getElementById("m1").innerHTML="Enter the Email ID";
      document.getElementById("m2").innerHTML="Enter the  Name";
      document.getElementById("m3").innerHTML="Enter the Phone number";
      document.getElementById("m4").innerHTML="Enter the Password";
      document.getElementById("m5").innerHTML="Enter the Re password";
    }
    else{
        // validate email
  if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value))) {
    document.getElementById('m1').innerHTML="Invalid email id";
    return;
    res=false;
  }
  else{
    document.getElementById('m1').innerHTML="";
    res=true;
  }
  // validate username
  var name = document.getElementById("name");
  var alphabetsOnly = /^[a-z A-Z]+$/g;
  if (!alphabetsOnly.test(name.value)) {
    document.getElementById('m2').innerHTML="Only alphabets are allowed for username";
    return;
    res=false;

  }
  if (name.length < 10) {
    document.getElementById('m2').innerHTML="username should at least contain 10 characters";
    return;
    res=false;
  }
  else{
    document.getElementById('m2').innerHTML="";
    res=true;
  }
  

   // validate mobile number
  var ph = document.getElementById("phone");
  var numbersOnly = /^[0-9]{10}$/g;
  if (!numbersOnly.test(ph.value)) {
    document.getElementById('m3').innerHTML="Mobile number should contain exactly 10 numbers";
    return;
    res=false;
  }
  else{
    document.getElementById('m3').innerHTML="";
    res=true;
  }

  // validate password
  var mypwd = document.getElementById("psw");
  var myrepwd = document.getElementById("re_psw");
  if(mypwd.value.length < 8) {
    document.getElementById('m4').innerHTML="Password should contain at least 8 characters";
    mypwd.focus();
    return;
    res=false;
  } else if(mypwd.value != myrepwd.value) {
    document.getElementById('m4').innerHTML="Passwords are not matching";
    mypwd.focus();
    return;
    res=false;
  } 
  else{
    document.getElementById('m4').innerHTML="";
    document.getElementById('m5').innerHTML="";
    res=true;
  }
}
if(res == true){
          $.ajax({
            type: 'post',
            url: 'process.php',
            data: $('form').serialize(),
            dataType: 'json',
            success: function (data) {
              
              if(data.sts_code==0)
              {
                alert(data.message);
                window.location.href='login.php';
              }
              else{
                document.getElementById("m1").innerHTML=data.message;
                //alert(data.message);
              }
            }
          });
}
    }
</script>
</body>
</html>
