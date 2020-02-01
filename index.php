
<?php
session_start();
include_once 'config/connection.php'; //to include database connection
if (isset($_POST['uid'])){
 $uid = $_POST['uid'];
 $pass = $_POST['password'];
$sql = "SELECT * FROM `login` WHERE `USER_ID` = '$uid' AND `PASSWORD` ='$pass' ";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
 $count = mysqli_num_rows($result);

 if ($count == 1) {
 if ($row['ROLE'] == 'C' || $row['ROLE'] == 'c'){
 	$_SESSION['customer'] = $uid;
 	echo "<script type='text/javascript'> window.location.href ='Customerhomepage.php';</script>";
 } 
 else {
 	echo "<script type='text/javascript'> window.location.href = 'index.php' ;</script>";
 }
}
}
?>
<html>
 <head>
<style>
	.barone
	{
	margin:200px;
	background-color: lightblue;
	height:50px; 
	text-align: center;
	font-weight: bold;
	}
</style>
 <script language="JavaScript" src="test.js"></script>
 <div><h2 class="barone">Swiss Bank</h2></div>
 <title> Swiss Bank Home Page </title>
</head>
<body>
<form NAME="frmLogin" METHOD="POST" ACTION="index.php">
 <table border="0" width="50%" align="center" style="margin-top: 300px">
 <tr>
 <td align="right">UserID</td>
 <td><INPUT TYPE="text" NAME="uid" MAXLENGTH="10"
onKeyUp="validateuserid();" onBlur="validateuserid();"><label
id="message23"></label></td>
 </tr>
 <tr>
 <td align="right">Password</FONT></td>
 <td><INPUT TYPE="password" NAME="password" onKeyUp="validatepassword();" onBlur="validatepassword();"><label id="message18"></label></td>
 </tr>
 <tr>
 <td></td>
 <td>
 <input type ="submit" name ="btnLogin" value ="LOGIN">
 <input type ="reset" name ="btnReset" value="RESET">
 </td>
 </tr>
 </table>
</form>
</body>
</html>