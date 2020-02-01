<?php
//starting the session for logged in customer
session_start();
include_once 'config/connection.php';
if (isset($_SESSION['customer'])) {
 $customer = $_SESSION['customer'];
}
$uid = $_SESSION['customer'];
$opass = $_POST['oldpassword'];
$npass = $_POST['newpassword'];
$que = "SELECT * FROM login WHERE USER_ID = '$uid' ";
$result = mysqli_query($con,$que);

$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if($count == 1) 
{
 if ($opass == $row['PASSWORD']){
 $que1 = "UPDATE login set PASSWORD = '$npass' where USER_ID = '$uid' ";
 $result1 = mysqli_query($con,$que1);
 echo "<script type='text/javascript'> location.href='index.php'; </script>";
 }
 else{
 echo "<script type='text/javascript'> location.href='PasswordInput.php'; </script>";
 }
}
else {
 echo "not found";
}
?>