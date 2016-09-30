

<?php

$servername = "intakedb.cbg8b2jlxopl.us-west-2.rds.amazonaws.com";
$username = "Shastasanu";
$password = "password";
$db_name = "intaketest";
$select = "SELECT * FROM Users";


$projectName = $_POST['email']; 
$passwords = $_POST['password'];
$biog = $_POST['bio']; 
$proj = $_POST['projects'];


$insert = "INSERT INTO Users (PASSWORD, EMAIL, BIO, PROJECTS) VALUES('$passwords', '$projectName','$biog','$proj')";

$connect = new mysqli($servername, $username, $password, $db_name);


if($connect->connect_error){
    die("Connection failed: " . $connect->connect_error);

}


$result = $connect->query($insert);



header("Location: accountSettings.html");
exit;


?>
