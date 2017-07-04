<?php
require("dbconnect.php");
extract($_POST);

$reference=$_POST["reference"];
$datepaid=$_POST["datepaid"];
$amountpaid=$_POST["amountpaid"];
$chasis=$_POST["chasis"];


//try letting the customer table come first 
// insert cutomer details
$query="INSERT INTO installments(id,chasis,datepaid,amountpaid,reference) VALUES (NULL,'$$chasis','$datepaid','$amountpaid','$reference')";
$result=$conn->query($query);
if(!$result){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}


//header('Location:http://localhost/Learn/daikyo/carform.php');

?>