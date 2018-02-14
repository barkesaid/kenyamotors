<?php
require("dbconnect.php");
extract($_POST);

$name=$_POST["username"];
$password=$_POST["password"];


$query="INSERT INTO login(username,pass,privilege) VALUES ('$name','$password',2)";

$result=$conn->query($query);
if(!$result){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}

header('Location:http://localhost/kenyamotors/createuser.php');

?>