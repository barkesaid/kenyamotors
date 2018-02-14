<?php
require("dbconnect.php");
extract($_POST);
extract($_GET);
$id=$_POST["id"];
$username=$_POST["username"];
$pass=$_POST["pass"];
$privilege=$_POST["privilege"];



$query="UPDATE login SET username = '$username', pass = '$pass', privilege = '$privilege'  WHERE login.id = $id";

$result=$conn->query($query);
if(!$result){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}

header('Location:http://localhost/kenyamotors/displayusers.php');

?>