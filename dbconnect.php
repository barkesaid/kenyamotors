<?php

$dbhost = 'localhost';
$dbuser= 'root';
$dbpass = '';
$database='kenyamotors';

$conn= new mysqli($dbhost,$dbuser,$dbpass,$database);
if($conn->connect_error)
{
	die ("Connection failed " .$conn->connect_error);
}
else  
{
//echo "Connection successful";
}

?>