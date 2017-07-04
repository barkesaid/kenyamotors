<?php
require("dbconnect.php");
extract($_POST);
extract($_GET);

$regno=$_POST["regno"];
$chasis=$_POST["chasis"];
$vname=$_POST["vname"];
$datesold=$_POST["datesold"];
$sellingprice=$_POST["sellingprice"];
$deposit=$_POST["deposit"];
$balance=$_POST["balance"];
$duedate=$_POST["duedate"];
$client_idno=$_POST["client_idno"];
$cname=$_POST["cname"];
$phoneno=$_POST["phoneno"];
$email=$_POST["email"];
$brokername=$_POST["brokername"];
$brokercommission=$_POST["brokercommission"];
$brokerphone=$_POST["brokerphone"];



//update 4 dififferent tables (vehicles. sold cars, client table, broker)
//vehicles table
$query="UPDATE vehicles SET chasis = '$chasis',regno = '$regno', vname = '$vname' WHERE vehicles.regno = '$regno'";
$result=$conn->query($query);
if(!$result){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}

//sold cars table
$query1="UPDATE soldcars SET chasis = '$chasis',datesold = '$datesold', sellingprice='$sellingprice', deposit='$deposit',balance='$balance',duedate='$duedate' WHERE soldcars.chasis = '$chasis'";
$result1=$conn->query($query1);
if(!$result1){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}
// //client table
$query2="UPDATE soldcars SET chasis = '$chasis',datesold = '$datesold', sellingprice='$sellingprice', deposit='$deposit',balance='$balance',duedate='$duedate' WHERE soldcars.chasis = '$chasis'";
$result2=$conn->query($query2);
if(!$result2){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}

//broker table 
$query3="UPDATE broker SET brokername = '$brokername',brokercommission = '$brokercommission', brokercommission='$brokercommission' WHERE broker.chasis = '$chasis'";
$result3=$conn->query($query3);
if(!$result3){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}

header('Location:http://localhost/kenyamotors/displaysales.php');



?>