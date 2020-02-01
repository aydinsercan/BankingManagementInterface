<?php
session_start();
if (isset($_SESSION['customer'])){
 $customer = $_SESSION['customer'];
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
 <div><h2 class="barone">Swiss Bank</h2></div>
 <title> Swiss Bank Customer HomePage </title>
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
<body>
 <table class="layout1" border="0" align="center">
 <td>
 <table align="center" width="70%">
 <tr>
 </tr>
 <tr>
<td><h>Welcome to Customer's Page</h></td>
 </tr>
</table>
</td>
</table>
</body>
</html>