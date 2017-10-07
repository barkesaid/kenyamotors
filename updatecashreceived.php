<?php
require("dbconnect.php");
extract($_POST);

$id= $_POST["id"]; echo $id;
$cdate=$_POST["cdate"]; echo $cdate;
$amount=$_POST["amount"]; echo $amount;
$details=$_POST["details"]; echo $details;


$query1="UPDATE addcash SET cdate ='$cdate',amount ='$amount',details ='$details' WHERE addcash.id='$id'";
// UPDATE expenses SET edate ='$edate ', amount ='$amount', details ='$details' WHERE expenses.id='$id' 
// UPDATE `expenses` SET `edate` = '2017-05-16', `amount` = '200', `details` = 'This is a test' WHERE `expenses`.`id` = 1;

$result1=$conn->query($query1);
if(!$result1){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}

header('Location:http://localhost/kenyamotors/displaycashreceived.php');

?>