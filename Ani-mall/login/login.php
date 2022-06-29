<?php
require('config.php');



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if(isset($_POST['email'] ) && isset($_POST['password'])){

    $statement = $DB->prepare("SELECT * FROM users WHERE user_email= :email AND user_password = :password");
    $statement -> bindValue(":password", $_POST['password'] );
    $statement -> bindValue(":email", $_POST['email'] );
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
   
   session_start();
   $_SESSION['userid']=$users['user_id']; }
    if(!empty($users)){
       header("location: ../userprofile.php");
}

else{
  echo  ("<span style='color: red'> Something went wrong <span>");
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">

    <title>Document</title>
</head>

<body>
    <form action="login.php" method="POST">
        <div class="container">

            <div class="row"></div>

            <div class="col-sm-3" id="forms">
                <h1> Login </h1>

                <hr class="mb-3">
        

                <label for="email"> Email: </label>
                <input class="form-control" type="email" name="email" placeholder="Email" required> <br>
                <?php
                if (isset($outputemail)) {
                    echo $outputemail;
                }
                ?>
                <label for="password"> Password: </label>
                <input class="form-control" type="password" name="password" placeholder="password" required><br>

                <?php
                if (isset($output)) {
                    echo $output;
                }
                ?>

                <hr class="mb-3">

                <input id="botton" class="btn btn-secondary" type="submit" name="create"><br>

                
                <div class="d-flex justify-content-center links">
                    Don't have an account? <a href="registration.php" class="ml-2">Sign Up</a>
                </div>

            </div>
        </div>
    </form>

    </div>
    </div>
    </div>
    </div>

</body>

</html>