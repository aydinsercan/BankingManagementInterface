<?php
session_start();
include_once 'config/connection.php';
if (isset($_SESSION['customer'])) {
 $customer = $_SESSION['customer'];
}
/*
function mysqli_result($res, $row, $field=0) { 
    $res->data_seek($row); 
    $datarow = $res->fetch_array(); 
    return $datarow[$field]; 
}
*/
$acc_no = $_POST['accountno'];

$qc = "select CUSTOMER_ID from account where ACCOUNT_NO='$acc_no'";
$rc = mysqli_query($con,$qc);
if (mysqli_num_rows($rc)) {

 $sql = "select * from account where ACCOUNT_NO=$acc_no";
 $r = mysqli_query($con,$sql);
 if (mysqli_num_rows($r) == 1) {
 while ($row = mysqli_fetch_array($r)) {
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
<div><ul class="menusubnav">
 <li><a href="Customerhomepage.php">Customer</a></li>
 <li><a href="BalEnqInput.php">Account Enquiry</a></li>
 <li><a href="customerfundinput.php">Money Transfer</a></li>
 <li><a href="PasswordInput.php">Changepassword</a></li>
 <li><a href="Logout.php">Log out</a></li>
 </ul>
</div>
 <body>
 <br><br>
<table border="0" width="70%" align="center"
class="layout1">
 <td>
 <table align="center" border="1" cellspacing="0"
cellpadding="0">
 <tr>

 <td colspan="2"><p class="heading3"
align=center>Balance Details for Account <?php echo $acc_no; ?></p></td>
 </tr>
 <tr>
 <td>Account No</td>
<td><?php echo $row['ACCOUNT_NO'];
?></td>
 </tr>
 <tr>
 <td>Type of Account</td>
 <td><?php echo $row['ACCOUNT_TYPE'];
?></td>
 </tr>
 <tr>
 <td>Balance</td>
<td><?php echo $row['CURRENT_AMOUNT'];
?></td>
 </tr>
<tr><td colspan="2"><a
href="Customerhomepage.php">Continue</a></td></tr>
 </table>
 <?php
 }
 } 
 else {
 echo "<script type='text/javascript'>alert('You are not authorize to
get Balance details of this account!!');
.location.href='BalEnqInput.php'; </script>";
 }
} else {
 echo '<script type="text/javascript">alert("Account does not exist");
.location.href="BalEnqInput.php"; </script>';
}
?>
 <p align="right"><a href="Customerhomepage.php">Home</a></p>
 </td>
 </table>
</body>
</html>