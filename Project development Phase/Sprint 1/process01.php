<?php
include 'con.php';
session_start();
$email=$_POST['email'];

$password=md5($_POST['psw']);

$check="SELECT * FROM tab60 WHERE email='$email' AND password='$password'";

$num=$con->query($check)->num_rows;

if($num==1){
   
   $result=array(
   	'sts_code' => 0,
   	'message' => 'Success'
   );
}
else{
	$result=array(
   	'sts_code' => 1,
   	'message' => 'failed'
   );
}

echo json_encode($result);

?>