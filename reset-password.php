<!DOCTYPE html>
<html>
<head>
    <link rel="apple-touch-icon" sizes="150x150" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta   content="width=device-width, initial-scale=1.0, minimum-scales=1.0" charset="UTF-8" name="viewport"/>
    <title>Reset Password</title>
</head>
<style>
    .form-reset {
        position: relative;
        left: 42vw;
        top: 14vh;
        width: 20vw;
        height: 25vh;
        border-style: solid;
        border-width: thin;
        border-color: rgba(0,0,0,0.2);
        background-color: #deeafc;
        border-radius: 2vh;
        box-shadow: 0 0.2vh 1vh 0 rgba(0,0,0,0.4);
    }
    .col-2-reset{
        margin: 0;
    }
    .password-reset, .password2-reset{
        position: relative;
        padding: 1.35vh;
        width: 17.5vw;
        height: 6vh;
        outline: none;
        font-family: Montserrat,sans-serif;
        font-size: 2vh;
        border-style: solid;
        border-width: thin;
        left: 0.5vw;
        border-color: rgba(0,0,0,0.2);
    }
    .password-reset{
        top: 1vh;
        border-top-right-radius: 1vh;
        border-top-left-radius: 1vh;
        border-style: solid;
        border-width: thin;
    }
    .submit-reset{
        position: relative;
        border-style: solid;
        border-width: thin;
        border-color: rgba(0,0,0,0.2);
        border-bottom-right-radius: 1vh;
        border-bottom-left-radius: 1vh;
        left: 0.5vw;
        width: 18.9vw;
        outline: none;
        height: 5.75vh;
        background-color: #00061a;
        color: #ccd9ff;
        font-family: Montserrat-medium, sans-serif;
        letter-spacing: 0.5vh;
        cursor: pointer;
    }
    .submit-reset:hover{
        background-color: #1a2346;
        color: white;
    }
    .instruction-reset{
        position: absolute;
        left: 42.5vw;
        top: 10vh;
        color: #deeafc;
        font-family: Montserrat, sans-serif;
    }
</style>
<body>
<a href="index.php" class="logo">
    <h1 class="logo">koliTECH</h1>
</a>
<?php

ob_start();
session_start();
error_reporting(0);
$error = " ";
if (isset($_GET['fkey']) && isset($_GET['Email'])){
    //process verification
    // this part is when the user clicked the link given by the email
    require('config.php');
    $fkey = mysqli_escape_string($conn,$_GET['fkey']);
    $email = mysqli_escape_string($conn,$_GET['Email']);
    $result = mysqli_query($conn,"SELECT * FROM token WHERE fkey = '$fkey' AND Email = '$email' LIMIT 1");
    $num = mysqli_num_rows($result);

    if ($num == 1){
        $row = mysqli_fetch_assoc($result);
        $userid = $row['userID'];
        $email = $row['Email'];
        // dito ung forms
?>
            <p class="instruction-reset">Please enter your new password:</p>
        <form class="form-reset" method="post" name="update">
            <div class="col-2-reset">
                <input type="hidden" class="email" id="txtEmail" name="Email" value="<?php echo $email;?>">
            </div>
            <!--New Password -->
            <div class="col-2-reset">
                <input type="password" class="password-reset" id="password" name="password" placeholder="New password" required>
            </div>

            <!--Confirm Password -->
            <div class="col-2-reset">
                <input type="password" class="password2-reset" id="password2" name="password2" placeholder="Confirm new password"  required>
            </div>

            <!--Buttons -->
            <input type="submit" class="submit-reset" id="submitbtn" name="Submit" value="SUBMIT NEW PASSWORD">

        </form>
<?php
        // when pressed submit
        if (isset($_POST['Submit'])){
            $pass = mysqli_real_escape_string($conn, $_POST['password']);
            $pass2 = mysqli_real_escape_string($conn, $_POST['password2']);

            // it will first identify if passwords are matched
            if ($pass != $pass2)
            {
               $error = 'passwords do not match';
            }
            // else checks the length of the password which the minimum is 8
            elseif (strlen($pass)<8){
                $error = 'password too short';
            }
            // else checks the regex pattern of password
            elseif (!preg_match("#[0-9]+#",$pass)){
                $error = 'must include a number';
            }
            elseif (!preg_match("#[A-Za-z]+#",$pass)){
                $error = 'must include a letter';
            }
            else{
                //if the user succeeded this restrictions
                // the database will now update a new password for its account

                mysqli_query($conn, "update accounts set Password = md5('$pass') where Email = '$email' AND userID = '$userid' LIMIT 1");
                //then delete the data from the table of token which occured in forgot password
                mysqli_query($conn, "delete from token where Email = '$email' AND userID = '$userid' LIMIT 1");
                // this will redirect to sign in page
                header('location: sign-in.php?origin=forgotPassword');
            }

        }
    }
    else{
        $error = "You entered unidentified account.";
    }
}
else{
    $error =  'Something went wrong.';
}

echo $error;
?>

</body>
</html>