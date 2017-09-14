<?php
require("dbconnect.php");
extract($_POST);

$id= $_POST["id"]; echo $id;
$chasis=$_POST["chasis"]; echo $chasis;
$datepaid=$_POST["datepaid"]; echo $datepaid;
$reference=$_POST["reference"]; echo $reference;
$amountpaid=$_POST["amountpaid"]; echo $amountpaid;


$query1="UPDATE installments SET chasis ='$chasis',datepaid ='$datepaid',reference ='$reference', amountpaid='$amountpaid' WHERE installments.id='$id'";

$result1=$conn->query($query1);
if(!$result1){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}

 header('Location:http://localhost/kenyamotors/displayinstallments.php');

?>