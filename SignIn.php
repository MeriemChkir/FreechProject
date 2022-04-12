<?php
require 'Config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $Password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM signup WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($Password == $row['Password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      echo
      "<script> alert('done'); </script>";
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--icons link-->
    <script src="https://kit.fontawesome.com/14c8f9e7a2.js" crossorigin="anonymous"></script>
    <title>Sign in and Sign Up form</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

<!--sign in form start freechor-->

            <form action="SignIn.php" class="sign-in-form">
                <h2 class="title">Sign In</h2>
<!--Username-->      
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username/Email" name="UserName">
                </div>
<!--Password-->
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password"  name="Password">
                </div>
<!--Sign in / Login button-->
                <input type="submit" class="btn solid" value="Login" name="btn-login">
                <p class="social-text">Or sign in with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </form>
            <a href="SignUp.php">Registration</a>
<!--Sign in form end-->
            </div>
        </div>
    </div>
        <script src="login.js"></script>
  </body>
</html>