
<html>

<head>

<body>


<?php

// Connect to Database

$user_db = mysqli_connect('intakedb.cbg8b2jlxopl.us-west-2.rds.amazonaws.com','Shastasanu',
    'password','intaketest')
    or die('Error connecting to MySQL server');




//Get data from form
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];

echo $first_name;

$query = "INSERT INTO Users (name,email,password) "."VALUES ('Michael Habib','example@gmail.com',
                                                        'password')";

$result = mysqli_query($user_db,$query)
        or die ('Error inserting data');


mysqli_close($user_db);


?>



</body>





</head>





</html>





