
<!DOCTYPE html>
<html>
<head>
    <link rel="apple-touch-icon" sizes="150x150" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta   content="width=device-width, initial-scale=1.0, minimum-scales=1.0" charset="UTF-8" name="viewport"/>
    <title>Sign In</title>
</head>
<style>
    .idea{
        position: absolute;
        left: 43vw;
        top: 7vh;
        color: #deeafc;
        font-family: Montserrat, sans-serif;
    }
</style>
<body>
<a href="index.php" class="logo">
    <h1 class="logo">koliTECH</h1>
</a>
<?php
error_reporting(0);
if ($_GET['origin'] == 'forgotPassword'){
    echo '<p class="idea">New password saved! Please login</p>';
}

?>
<div class="form-div-sign">
    <form action="" class="sign-form" method="post">

        <!--Email -->
        <div class="col-two">
            <input type="email" class="sign-in-email" id="txtEmail" placeholder="username@email.com" name="txtEmail" required>
        </div>
        <!--Password -->

        <div class="col-two">
            <input type="password" class="sign-in-password" id="password" placeholder="Password" name="Password" required>
        </div>
        <!--Buttons -->
        <input type="submit" class="signbtn" id="submitbtn" name="Submit" value="SIGN IN">


    </form>
</div>
<div class="sign-in-error">
    <?php
    error_reporting(0);
    session_start();
    $error = "";
   //
    if (isset($_POST['Submit'])){
        require('config.php');
        $email = mysqli_real_escape_string($conn,$_POST['txtEmail']);
        $password = mysqli_real_escape_string($conn,$_POST['Password']);

        $r_email = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        if (!$email || !$password){
            $error = 'Please fill up all fields';
        }
        elseif (!preg_match($r_email,$email)){
            $error = 'Invalid email';
        }
        elseif (!preg_match("#[A-Za-z]+#",$password)){
            $error = 'Invalid password';
        }
        else{
            $result = mysqli_query($conn, "SELECT * FROM accounts WHERE Email = '$email' AND Password =md5('$password') AND isVerified ");
            if (mysqli_num_rows($result)){
                $row = mysqli_fetch_assoc($result);
                $userid = $row['userID'];
                mysqli_query($conn, "INSERT INTO logs(userID, Email, Date, Time) VALUES ('$userid','$email',CURDATE(),CURTIME())");

                session_start();
                $_SESSION['userID'] = $row['userID'];
                header('location: dashboard.php?origin=signIn');

            }
            else{
                $err = 'Incorrect email or password.';
                $error = wordwrap($err, 30,"<br>", true);
            }
        }


    }

    echo '<p class="error">'.$error.'</p>';
    ?>
</div>
<a href="forgetpassword.php" class="forget-pass">Forget Password?</a>
<p class="no-account">Do not have account here? <a href="sign-up.php" class="no-account-a">SIGN UP NOW</a> </p>
</body>
</html>

