<?php
include 'con.php';
session_start();
$email=$_POST['email'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$password=md5($_POST['psw']);

$check="SELECT * FROM tab60 WHERE email='$email'";

$num=$con->query($check)->num_rows;

if($num==0){
$insert="INSERT INTO tab60(email,name,phone,password) VALUES ('$email','$name','$phone','$password')";
   $insert_query=mysqli_query($con,$insert);
   $_SESSION['reg_msg']='registered successfully';
   $result=array(
   	'sts_code' => 0,
   	'message' => 'Success'
   );

}
else{
	$result=array(
   	'sts_code' => 1,
   	'message' => "Email address is already exist!!!"
   );
}

echo json_encode($result);

?>