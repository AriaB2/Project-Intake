<?php

$user_db = mysqli_connect('intakedb.cbg8b2jlxopl.us-west-2.rds.amazonaws.com','Shastasanu',
    'password','intaketest')
or die('Error connecting to MySQL server');

$email=$password="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$input_email=$_POST["email"];
$input_password=$_POST["password"];

 $query= "SELECT EMAIL,PASSWORD FROM Users WHERE EMAIL='$input_email'";
  $result=mysqli_query($user_db,$query);

$row = mysqli_fetch_array($result);
 $email = $row["EMAIL"];
  if($result) {
      if ($email == $input_email) {

          //Valid email , check password
          $password = $row["PASSWORD"];
          if ($input_password == $password) {

              //TODO go to project view page
              echo "Succesful Login";
          } else {
              echo "Invalid Password";
          }
      } else {
          echo "Invalid email";
      }
  }

}

?>





<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intake</title>
    <meta name="description" content="">

    <script src="//use.typekit.net/gfb2mjm.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>

    <link rel="stylesheet" href="../../../metaphor-master/dist/css/metaphor.css">
</head>
<body>

<?php include ("../../../includes/header.php");?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <div class="row ">
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form__group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="example@e.com">
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form__group">
                <label for="password">Password</label>
                <input id="password"name="password"  type="password" >
            </div>
        </div>
    </div>
    <div class="row">
        <div class ="col-sm-3 col-sm-offset-1">
            <input type="submit" id="login" name="login" value="Login">
            <a href="register.php">Register</a>
        </div>

    </div>




</form>



</form>

<script src="../../../metaphor-master/dist/js/metaphor.js" ></script>
</body>
</html>