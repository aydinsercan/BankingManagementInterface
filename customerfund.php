<?php
//starting the session for logged in customer
session_start();
include_once 'config/connection.php';
if (isset($_SESSION['customer'])) {
 $customer = $_SESSION['customer'];
 } 
else{
 echo "<script type='text/javascript'>alert('You are not authorize to do
fund transfer!!'); .location.href='customerfundinput.php'</script>";
}
if ($_POST['formid'] == $_SESSION['formid']) {
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
 <title> Swiss Bank Fund Transfer Page </title>
 </head>
 <div><ul class="menusubnav">
 <li><a href="Customerhomepage.php">Customer</a></li>
 <li><a href="BalEnqInput.php">Account Enquiry</a></li>
 <li><a href="customerfundinput.php">Money Transfer</a></li>
 <li><a href="PasswordInput.php">Changepassword</a></li>
 <li><a href="Logout.php">Log out</a></li>
 </ul>
</div>
 <?php
 $payer_no = $_POST['payersaccount'];
 $payee_no = $_POST['payeeaccount'];
 if ($payer_no == $payee_no) {
 ?>
 <script type="text/javascript">
 alert('Payers account No and Payees account No Must Not be Same!!!');
 window.location.href = "customerfundinput.php";
 </script>
 <?php
 }
//Getting info using sql queries.
 $qc = "SELECT CURRENT_AMOUNT,CUSTOMER_ID FROM account WHERE ACCOUNT_NO=$payer_no";
 $rc = mysqli_query($con,$qc);
 $c = "SELECT CURRENT_AMOUNT from account where account_no=$payee_no";
 $ac = mysqli_query($con,$c);
 ?>
 <body>
 <br><br>
 <table border="0" align="center" class="layout1">
 <tr>
 <td colspan="2"><p class="heading3" align=center>Fund Transfer Details for Account No: <?php echo $payer_no; ?></p></td>
 </tr>
 <?php
 $row = mysqli_fetch_array($rc);
 $row1 = mysqli_fetch_array($ac);
 if (mysqli_num_rows($rc) == 1) {
 if (mysqli_num_rows($ac) == 1) {
 $c_id = $row['CUSTOMER_ID']; //2

 if ($c_id == $customer) {    
 if ($row["CURRENT_AMOUNT"] <= $_POST['ammount']) {
 ?>
<script type="text/javascript">
 alert('Transfer Failed. Account Balance low!!');
 window.location.href = "customerfundinput.php";
 </script>
<?php
 } 
 else {
 $fundminus = $row["CURRENT_AMOUNT"] - $_POST['ammount'];
 $fundplus = $row1["CURRENT_AMOUNT"] + $_POST['ammount'];
 $sql1 = "UPDATE account SET CURRENT_AMOUNT=$fundminus WHERE ACCOUNT_NO=$payer_no";
 $sql11 = mysqli_query($con,$sql1);
 $sql2 = "UPDATE account SET CURRENT_AMOUNT=$fundplus WHERE account_no=$payee_no";
 $sql22 = mysqli_query($con,$sql2);
 $sql3 = "INSERT INTO transaction (ACCOUNT_NO,DATE_OF_TRANSACTION,AMOUNT,TRANSACTION_TYPE,DESCRIPTION) VALUES(". $_POST['payersaccount'] . ",CURDATE()," . $_POST['ammount'] . ",'t','" . $_POST['desc'] . "Tansfer To" . $_POST['payeeaccount'] . "')";
 $sql33 = mysqli_query($con,$sql3);
 $tid = mysqli_insert_id($con);
$sql4 = "INSERT INTO transaction (ACCOUNT_NO,DATE_OF_TRANSACTION,AMOUNT,TRANSACTION_TYPE,DESCRIPTION) VALUES(". $_POST['payeeaccount'] . ",CURDATE()," . $_POST['ammount'] . ",'t','" .
$_POST['desc'] . " Tansfer From " . $_POST['payersaccount'] . "')";
 $sql44 = mysqli_query($con,$sql4);
 ?>
 <td>
 <table border="1" align="center"
style="margin-top:0px" cellspacing="0" cellpadding="2">
 <tr>
 <td>Transaction Id</td>
<td><?php echo $tid; ?></td>
 </tr>
<tr>
 <td>Amount</td>
<td><?php echo $_POST['ammount'];
?></td>
 </tr>

 <tr>
 <td >FROM ACCOUNT NUMBER</td>
<td ><?php echo
$_POST['payersaccount']; ?></td>
 </tr>
<tr>
 <td >TO ACCOUNT NUMBER</td>
<td ><?php echo
$_POST['payeeaccount']; ?></td>
 </tr>
<tr>
 <td >Description</td>
<td ><?php echo $_POST['desc'];
?></td>
 </tr>
 <tr>
 <td colspan="2"><p
class="heading3"><a href="Customerhomepage.php">Continue</a></p></td>
 </tr>
 </table>
 </td>
 </table>
 <?php
 }
 }
//---------
else {
 echo '<script type="text/javascript">
 alert("You are not authorize to Transfer Funds from this account!!");
 window.location.href="customerfundinput.php"
 </script>';
 }
 }
 else {
 ?>
 <script type="text/javascript">
 alert('Account <?php echo $payee_no ?>does not exist!!!');
 window.location.href = "customerfundinput.php";
 </script>
<?php
 }
 } 
 else {
 ?>
 <script type="text/javascript">
 alert('Account <?php echo $payer_no ?> does not exist!!!');
 window.location.href = "customerfundinput.php";
 </script>
 <?php
 }
 $_SESSION["formid"] = '';
 } else {
 echo '<script type="text/javascript">window.location.href="customerfundinput.php";</script>';
 }
 ?>

 <!--comments: to link to home page-->
 <p align="right"><a href="Customerhomepage.php">Home</a></p>
</body>
</html>