<?php

$servername = "intakedb.cbg8b2jlxopl.us-west-2.rds.amazonaws.com";
$username = "Shastasanu";
$password = "password";
$db_name = "test_accounsettings";
$select = "SELECT * FROM members";


$connect = new mysqli($servername, $username, $password, $db_name);
if($connect->connect_error){
    die("Connection failed: " . $connect->connect_error);
}
$result = $connect->query($select);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo "<div class=search-result>";
		echo $row["username"];
		echo "";
		echo $row["email"];
		echo "</div>";
	}
}
?>