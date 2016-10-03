<?php
$user_db = mysqli_connect('intakedb.cbg8b2jlxopl.us-west-2.rds.amazonaws.com','Shastasanu',
    'password','intaketest')
or die('Error connecting to MySQL server');




$first_name=$last_name=$email=$password=$confirm_password=$type="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $first_name=test_input($_POST["first_name"]);
    $last_name=test_input($_POST["last_name"]);
    $email=test_input($_POST["email"]);
    $password=test_input($_POST["password"]);
    $confirm_password=test_input($_POST["confirm_password"]);
    if(isset($_POST["type"])) {
        $var = $_POST["type"];

    }

    echo $type;



    if(strlen($first_name)>0&&strlen($last_name)>0&&strlen($email)>0&&strlen($password)>0&&$type!="0"){


        echo "All values filled\n";

        $takenEmail = checkForUser($email);


        if($takenEmail){

            //TODO throw existing user  error mesage
        }else{

            //TODO Check type against email
            switch($var){
                case 1:
                    $type="Student";
                    break;
                case 2:
                    $type="Client";
                    break;
                case 3:
                    $type="Staff";
                    break;

            }
            //checkTypeAgainstEmail($email,$type);


            if($password==$confirm_password){


                $name = $first_name." ".$last_name;





                echo "Inserting";
                $query = "INSERT INTO Users(name,email,password,type) "." VALUES('$name','$email','$password','$type');";
                $result= mysqli_query($user_db,$query) or die("Error inserting");


            }else{

                echo "Passwords don't match";
                echo " ".$password;
                echo " ".$confirm_password;
                //TODO throw passwords don't match error
            }

        }




    }
    else{
        echo "Not all fields filled";
    }
}

function checkForUser($email){

    $user_db = mysqli_connect('intakedb.cbg8b2jlxopl.us-west-2.rds.amazonaws.com','Shastasanu',
        'password','intaketest')
    or die('Error connecting to MySQL server');


    $query = "SELECT * FROM Users WHERE EMAIL = '$email'";
    $result = mysqli_query($user_db,$query);


    if($result){

        $row = mysqli_fetch_array($result);
        if($email == $row['EMAIL']){

            echo "user taken";
            return true;
        }else{
            echo "user not taken";
            return false;
        }

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

    <link rel="stylesheet" href="../../../metaphor-master/dist/css/metaphor.css">
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
                <select name="type" id="type">
                    <option value="">-- Select Type --</option>
                    <option value="1">Student</option>
                    <option value="2">Client</option>
                    <option value="3">Staff</option>
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
                <input id="confirm_password" name="confirm_password"type="password" placeholder="Password">
            </div>
        </div>
   </div>
    <div class="row">
        <div class ="col-sm-3 col-sm-offset-1">
            <input type="submit" id="register" name="submit_register" value="Register">
            <a href="../Login/login.php">Login</a>
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

<script src="../../../metaphor-master/dist/js/metaphor.js" ></script>

<script>


</script>


</body>
</html>