<?php
session_start();

session_destroy();
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
 <title> Swiss Bank Logout Output Page </title>
</head>
<div><ul class="menusubnav">
 <li><a href="Customerhomepage.php">Customer</a></li>
 <li><a href="BalEnqInput.php">Account Enquiry</a></li>
 <li><a href="customerfundinput.php">Money Transfer</a></li>
 <li><a href="PasswordInput.php">Changepassword</a></li>
 <li><a href="Logout.php">Log out</a></li>
 </ul>
</div>
<!--comments: logout body-->
<body onLoad="document.fbal.txtaccno.select();">
 <br><br>
 <table border="0" width="70%" align="center" class="layout1">
 <form name="fbal" method="post">
 <tr>

<?php 
echo "<script type='text/javascript'> location.href='index.php'; </script>";
?>

 </tr>
 </form>
 </table>
 <!--comments: to link to home page-->
 <p align="right"><a href="Customerhomepage.php">Home</a></p>

</body>
</html>