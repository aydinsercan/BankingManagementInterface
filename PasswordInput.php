
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
 <title> Swiss Bank New Customer Entry Page </title>
</head>
<div><ul class="menusubnav">
 <li><a href="Customerhomepage.php">Customer</a></li>
 <li><a href="BalEnqInput.php">Account Enquiry</a></li>
 <li><a href="customerfundinput.php">Money Transfer</a></li>
 <li><a href="PasswordInput.php">Changepassword</a></li>
 <li><a href="Logout.php">Log out</a></li>
 </ul>
</div>
<!--comments: change password form body-->
<body>
 <br>
 <table class="layout1" border="0" align="center">
 <form name="addcust" action="Password.php" method="POST"
onsubmit="return validateChangePassword();">
 <td colspan="2">
 <table border="0" align="center">
 <tr>
 <td align="center" colspan="2"><p
class="heading3">Change Password</p></td>
 </tr>
<tr></tr>
<tr></tr>
 <tr>
 <td>Old Password</td><td><input type="password"
name="oldpassword" maxlength="25" onKeyUp="validateoldpassword();"
onBlur="validateoldpassword();"><label id="message20"></label></td>
 </tr>
<tr>
 <td>New Password</td><td><input type="password"
name="newpassword" maxlength="25" onKeyUp="validatenewpassword();"
onBlur="validatenewpassword();">
<label id="message21"></label></td>
 </tr>
<tr>
 <td>Confirm Password</td><td><input type="password"
name="confirmpassword" maxlength="25" onKeyUp="validateconfirmpassword();"
onBlur="validateconfirmpassword();"><label id="message22"></label></td>
 </tr>
 <tr>
 <td></td>
<td><input type="submit" value="Submit" name="sub"/>
 <input type ="reset" value ="Reset" name="res"></td>
 </tr>
 </form>
 </table>
</td>
</table>
<p align="right"><a href="Customerhomepage.php">Home</a></p>
</body>
</html>