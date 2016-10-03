<?php

$servername = "intakedb.cbg8b2jlxopl.us-west-2.rds.amazonaws.com";
$username = "Shastasanu";
$password = "password";
$db_name = "intaketest";
$resultsPerPage = 6;
$count = 0;
$pageCount = 0;

$select = "SELECT * FROM projects";

$connect = new mysqli($servername, $username, $password, $db_name);

if($connect->connect_error){
    die("Connection failed: " . $connect->connect_error);
}

$result = $connect->query($select);

if($result->num_rows > 0){

	while($row = $result->fetch_assoc()){

		$count++;

		echo "<div class=search-result>";
		echo "<h4> " . $row["name"] . "</h4>";
		echo "<div class=short-description>" . $row["shortDescription"] . "</div>";
		echo "</div>";
	}
}

if($count > $resultsPerPage){

	$pageCount = ceil($count / $resultsPerPage);

}

$count = 0;

?>