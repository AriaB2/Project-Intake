<?php




$first_name=$last_name=$email=$password=$confirm_password=$type="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $first_name=test_input($_POST["first_name"]);
    $last_name=test_input($_POST["last_name"]);
    $email=test_input($_POST["email"]);
    $password=test_input($_POST["password"]);
    $confirm_password=test_input($_POST["confirm_password"]);
    $type = test_input($_POST["Type"]);


    $takenEmail = checkForUser($email);




}

function checkForUser($email){

    $user_db = mysqli_connect('intakedb.cbg8b2jlxopl.us-west-2.rds.amazonaws.com','Shastasanu',
        'password','intaketest')
    or die('Error connecting to MySQL server');


    $query = "SELECT * FROM Users WHERE EMAIL = '$email'";
    $result = mysqli_query($user_db,$query);
    echo "**** Email : $email***** \n\n";
    echo strlen($email);

    if($result&&strlen($email)>0){

        $row = mysqli_fetch_array($result);
        $email = $row['EMAIL'];
        echo $email."\n";
        echo "User taken";
        return true;
    }else{

        echo "User not taken";
        return false;
    }





}

function test_input($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;


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

    <link rel="stylesheet" href="../metaphor-master/dist/css/metaphor.css">
</head>
<body>

<nav class="primary-nav primary-nav--cream">
    <div class="container">
        <div class="primary-nav__mobile">
            <div class="primary-nav__btn">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <div class="primary-nav__brand " ><span class="sr-only">California State University, Northridge (CSUN)</span></div>
        </div>
    </div>
</nav>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <div class="row ">
         <div class="col-sm-5 col-sm-offset-1">
            <div class="form__group">
                <label for="first_name">First Name</label>
                <input id="first_name" name="first_name" type="text" placeholder="Billy">
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form__group">
                <label for="last_name">Last Name</label>
                <input id="last_name"name="last_name"  type="text" placeholder="Jean">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form__group">
                <label for="type">Type</label>
                <select name="" id="type">
                    <option value="">-- Select Type --</option>
                    <option value="student">Student</option>
                    <option value="client">Client</option>
                    <option value="staff">Staff</option>
                </select>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form__group">
                <label  for="email">Email</label>
                <input id="email" type="email"name="email" placeholder="Email">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 col-sm-offset-1 ">
            <div class="form__group">
                <label c for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Password">
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form__group">
                <label for="confirm_password">Confirm Password</label>
                <input id="confirm_password" name="conform_password"type="password" placeholder="Password">
            </div>
        </div>
   </div>
    <div class="row">
        <div class ="col-sm-3 col-sm-offset-1">
            <input type="submit" id="register" name="submit_register" value="Register">
            <a href="../Login/login.html">Login</a>
        </div>
    </div>
    <div class="row">
        <div class="alert alert--warning col-sm-6 first_name" style="visibility:hidden">
            <strong>Warning! </strong>First name field empty
            <a href="#" class="alert__close" data-alert-close>x</a>
        </div>
</div>

</form>



</form>

<script src="../metaphor-master/dist/js/metaphor.js" ></script>

<script>


</script>


</body>
</html>