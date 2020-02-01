<?php
//starting the session for logged in customer
session_start();
include_once 'config/connection.php';
$_SESSION['formid'] = md5(rand(0, 10000000));
?>
<html>
 <!--comments: fund transfer page-->
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
 <div><ul class="menusubnav">
 <li><a href="Customerhomepage.php">Customer</a></li>
 <li><a href="BalEnqInput.php">Account Enquiry</a></li>
 <li><a href="customerfundinput.php">Money Transfer</a></li>
 <li><a href="PasswordInput.php">Changepassword</a></li>
 <li><a href="Logout.php">Log out</a></li>
 </ul>
</div>
 <title>Money Transfer Entry Page</title>
</head>
</head>
<body>
 <br/><br/><br/><br/>
 <table class="layout1" border="0" align="center">
 <form name="addcust" method ="POST" action ="customerfund.php"
onsubmit="return validateFundTransfer();">
 <tr>
 <td align="center" colspan="2"><p class="heading3">Fund
Transfer</p></td>
 </tr>
 <tr>
 <td>Payers account no</td><td><input type="text"
name="payersaccount" value="" onBlur="validatepayersaccountno()" onKeyUp
="validatepayersaccountno()"/> <label id="message10"></label>

 </tr>
<tr>
 <td>Payees account no</td>
 <td>
 <input type="text" name="payeeaccount" value=""
onBlur="validatepayeeaccountno()" onKeyUp="validatepayeeaccountno()" />
<label id="message11"></label>
 </td>
 </tr>
<tr>
 <td>Amount</td><td><input type="text" name="ammount"
maxlength = "8" onBlur="validateammount()" onKeyUp="validateammount()"/>
<label id="message1"></label></td>
 </tr>
 <tr>
 <td>Description</span></td><td><input type="text" name="desc"
value="" onBlur="validatedesc()" onKeyUp="validatedesc()"/> <label
id="message17"></label> </td>
 </tr>
 <tr><input type="hidden" name="formid" value="<?php echo
$_SESSION["formid"]; ?>" />
 <td></td>
 <td><input type="submit" name="AccSubmit" value="Submit"
onClick=" return validateone();">
 <input type="reset" name="res" value="Reset"></td>
 </tr>
 </form>
 </table>
 <p align="right"><a href="Customerhomepage.php">Home</a></p>
</body>
</html>