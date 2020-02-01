<?php
//starting the session for logged in customer
session_start();
include_once 'config/connection.php';
if (isset($_SESSION['customer'])){
 	$cid = $_SESSION['customer'];
}
?>
<html>
 <head>
<style type="text/css">
	.barone
	{
	margin:0px;
	background-color: lightblue;
	height:50px; 
	text-align: center;
	font-weight: bold;
	}
    .menusubnav{
    	list-style-type: none;
  		margin: 0;
  		padding: 0;
  		width: 200px;
  		background-color: #f1f1f1;
    }
    li a{
  		display: block;
  		color: #000;
  		padding: 8px 16px;
  		text-decoration: none;
	}
	li a:hover {
  		background-color: #555;
  		color: white;
	}
</style>
 <script language="JavaScript" src="test.js"></script>
 <div><h2 class="barone">Swiss Bank</h2></div>
 <title> Swiss Bank Balance Enquiry Page </title>
</head>
<div>
 <ul class="menusubnav">
 <li><a href="Customerhomepage.php">Customer</a></li>
 <li><a href="BalEnqInput.php">Account Enquiry</a></li>
 <li><a href="customerfundinput.php">Money Transfer</a></li>
 <li><a href="PasswordInput.php">Changepassword</a></li>
 <li><a href="Logout.php">Log out</a></li>
 </ul>
</div>
<body onLoad="document.fbal.txtaccno.select();">
 <br>
 <table border="0" width="70%" align="center" class="layout1">
 <form name="fbal" method="post" action="BalEnquiry.php" onsubmit="return validateone();">
 <td>
 <table align="center">
 <tr>
 <td colspan="2"><p class="heading3"
align=center>Account Enquiry Form</p></td>
 </tr>
 <tr>
 <td>Account No</td>
 <td><select name="accountno" style="width:150px"
onKeyUp="validateaccount();" onBlur="validateaccount();">
 <option>Select Account</option>
<?php
$que = "select * from account where CUSTOMER_ID = $cid";
 $result = mysqli_query($con,$que);
 while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
?> 
 <option> <?php echo $row['ACCOUNT_NO'];?> </option>
<?php 
} 
?>
 </select><label id="message25"></label></td>
 </tr>
 <tr>
 <td></td>
<td><input type="submit" name="AccSubmit"
value="Submit">
 <input type="reset" name="res"
value="Reset"></td>
 </tr>
 </table>
 </form>
 <p align="right"><a href="Customerhomepage.php">Home</a></p>
 </td>
</table>
</body>
</html>
