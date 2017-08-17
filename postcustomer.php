<?php
require("dbconnect.php");
extract($_POST);

$idno=$_POST["idno"];
$cname=$_POST["cname"];
$phoneno=$_POST["phoneno"];
$altphone=$_POST["altphone"];
$email=$_POST["email"];
$paddr=$_POST["paddr"];
$town=$_POST["town"];
$otherinfo=$_POST["otherinfo"];

$phoneno="+254".$phoneno; 
$altphone="+254".$altphone; 

$query="INSERT INTO customer(idno,cname,phoneno,altphone,email,paddr,town,otherinfo) VALUES ('$idno','$cname','$phoneno','$altphone','$email','$paddr','$town','$otherinfo')";

$result=$conn->query($query);
if(!$result){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}

header('Location:http://localhost/kenyamotors/addcustomer.php');

?>