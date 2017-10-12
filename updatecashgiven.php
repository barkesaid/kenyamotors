<?php
require("dbconnect.php");
extract($_POST);

$id= $_POST["id"]; echo $id;
$cdate=$_POST["cdate"]; echo $cdate;
$amount=$_POST["amount"]; echo $amount;
$details=$_POST["details"]; echo $details;


$query1="UPDATE givecash SET cdate ='$cdate',amount ='$amount',details ='$details' WHERE givecash.id='$id'";

$result1=$conn->query($query1);
if(!$result1){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}

header('Location:http://localhost/kenyamotors/displaycashgiven.php');

?>