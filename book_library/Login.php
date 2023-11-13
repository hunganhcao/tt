<?php
    session_start();
    ob_start();
    require("db/condbpdo.php");
    require("db/user.php");

    if((isset($_POST["login"])) && ($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $roles = checkuser($username, $password);
        $_SESSION['roles'] = $roles;
        if($roles == 0) header('location: index.php');
        else if($roles == 1) header('location: admin/index.php');
        else header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Book Library</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <section>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <img src="images/bg.jpg" class="bg" alt="">
            <div class="login">
                <h2>Sign In</h2>
                <div class="inputBox">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="inputBox">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="inputBox">
                    <input type="submit" name="login" value="Login" id="btn">
                </div>
                <div class="group">
                    <a href="#">Foget Password</a>
                    <a href="#">Sign Up</a>
                    <!-- <a href="signup.php">Sign Up</a> -->
                </div>
            </div>
        </form>
    </section>
</body>
</html>