<?php
$servername = "intakedb.cbg8b2jlxopl.us-west-2.rds.amazonaws.com";
$username = "Shastasanu";
$password = "password";
$db_name = "intaketest";

$projectName = $_POST['projectName'];
$shortDescription = $_POST['shortDescription'];
$details = $_POST['projectDetails'];
$platform = $_POST['platform'];
$userID = 0;

$insert = "INSERT INTO projects (ID, name, shortDescription, details, platform, userID) VALUES (NULL, '$projectName', '$shortDescription', '$details', $platform, $userID)";

//echo "INSERT INTO projects (ID, name, shortDescription, details, platform, userID) VALUES (NULL, '$projectName', '$shortDescription', '$details', $platform, $userID)";

$connect = new mysqli($servername, $username, $password, $db_name);

if($connect->connect_error){
    die("Connection failed: " . $connect->connect_error);
}

$result = $connect->query($insert);

header("Location: http://54.191.144.229/test/pages/searchpage/");
exit();
?>