<?php
$host="localhost:3306";
$user="root";
$pass="";
$db="login1";
$conn=new mysqli($host,$user,$pass,$db);
if($conn->connect_error){
    echo "Failed to connect DB";
}
?>

