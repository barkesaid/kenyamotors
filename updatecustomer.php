<?php
require("dbconnect.php");
extract($_POST);
extract($_GET);
$idno=$_POST["idno"];
$cname=$_POST["cname"];
$phoneno=$_POST["phoneno"];
$altphone=$_POST["altphone"];
$email=$_POST["email"];
$paddr=$_POST["paddr"];
$town=$_POST["town"];
$otherinfo=$_POST["otherinfo"];


$query="UPDATE customer SET idno = '$idno', cname = '$cname', phoneno = '$phoneno', altphone = '$altphone', email = '$email', paddr = '$paddr', otherinfo = '$otherinfo ' WHERE customer.idno = $idno";

$result=$conn->query($query);
if(!$result){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}

//header('Location:http://localhost/Learn/daikyo/carform.php');

?>