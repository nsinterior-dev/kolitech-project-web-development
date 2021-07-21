<!DOCTYPE html>
<html>
<head>
    <link rel="apple-touch-icon" sizes="150x150" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta   content="width=device-width, initial-scale=1.0" charset="UTF-8" name="viewport"/>
    <title>Sign Up</title>
</head>
<body>
        <a href="index.php" class="logo">
            <h1 class="logo">koliTECH</h1>
        </a>
        <div class="form-div">
            <form action="" class="sign-up-form" method="post">
                <!--First Name -->
                <div class="col-2">
                    <input type="text" class="fName" id="txtFirstname" name="txtFirstname" placeholder="First Name" required>
                </div>

                <!--Last Name -->
                <div class="col-2">
                    <input type="text" class="Name" id="txtLastame" name="txtLastname" placeholder="Last Name" required>
                </div>
                <!--Email -->
                <div class="col-2">
                    <input type="email" class="email" id="txtEmail" name="txtEmail" placeholder="username@email.com" required>
                </div>
                <!--Password -->
                <div class="col-2">
                    <input type="password" class="password" id="password" name="password" placeholder="Password" required>
                </div>

                <!--Confirm Password -->
                <div class="col-2">
                    <input type="password" class="password2" id="password2" name="password2" placeholder="Confirm Password" required>
                </div>
                <div id="match-div">
                    <p id="match" > </p>
                </div>
                <!--Buttons -->
                <input type="submit" class="submitbtn" id="submitbtn" name="Submit" value="SIGN UP">
                <input type="reset" class="resetbtn" id="resetbtn" name="Reset" VALUE="CLEAR">

            </form>

        </div>
        <div class="error-message">
            <?php
            ob_start();
            $error = NULL;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\PHPMailer;
            if(isset($_POST['Submit'])){
                require('config.php');
                //Get form data
                $Fname = $_POST['txtFirstname'];
                $Lname = $_POST['txtLastname'];
                $Email = $_POST['txtEmail'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];

                $r_email = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

                $sql_email = "SELECT * FROM accounts WHERE Email = '$Email' LIMIT 1";
                $res_email = mysqli_query($conn,$sql_email);
                if (strlen($password != $password2)){
                    //password compare
                    $error =  "<p class='php-match'>Passwords do not match</p>";
                }
                // else when the passwords matched but...
                elseif (strlen($password) < 8){
                    $error =  'Password too short';
                }
                elseif (!preg_match("#[0-9]+#",$password)){
                    $error = 'Must include a number';
                }
                elseif (!preg_match("#[A-Za-z]+#",$password)){
                    $error =  'Must include a letter';
                }
                elseif (mysqli_num_rows($res_email) > 0){
                    // check if email already exists
                    $error =  'Email already existing';
                }
                elseif (!preg_match($r_email,$Email)){
                    $error = 'Invalid email address';
                }
                else{

                    require('config.php');
                    // sanitize the data
                    $Fname = mysqli_real_escape_string($conn,$Fname);
                    $Lname = mysqli_real_escape_string($conn,$Lname);
                    $Email = mysqli_real_escape_string($conn,$Email);
                    $password = mysqli_real_escape_string($conn,$password);
                    $password2 = mysqli_real_escape_string($conn,$password2);
                    $gender = mysqli_real_escape_string($conn,$gender);

                    //generate hash
                    $hash = md5(time().$Email);

                    //insert account into database
                    $password =md5($password);
                    $insert = mysqli_query($conn, "INSERT INTO accounts(Fname,Lname,Email,Password,hash)VALUES('$Fname','$Lname','$Email','$password','$hash')");

                    if ($insert)
                    {

                        //send email to user in order to verify account
                        require 'vendor/PHPMailer/src/Exception.php';
                        require 'vendor/PHPMailer/src/PHPMailer.php';
                        require 'vendor/PHPMailer/src/SMTP.php';

                        $mail = new PHPMailer();

                        $mail = new PHPMailer(true);


                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                        $mail->isSMTP();
                        $mail->Host ='smtp.gmail.com';
                        $mail->SMTPAuth = 'true';
                        $mail->Username = 'kolitech08@gmail.com';
                        $mail->Password = 'gJlYCO%AE*iN1hEp7a)W';
                        $mail->SMTPSecure =PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port   = 587;

                        $mail->setFrom('kolitech08@gmail.com','Kolitech');

                        $mail->addAddress($Email,$Fname);



                        $mail->isHTML(true);
                        $mail->Subject = 'Verification Email';
                        $mail->Body = "
                    <a href='http://localhost/kolitech/verify.php?hash=$hash'>Register Account</a>";

                        $mail->send();

                        header("location: Submitted.php");


                    }

                }
            }


            echo '<p class="error">'.$error.'</p>';
            ?>



        </div>
        <div class="alt">
            <p class="account-already">Already have an account? <a href="sign-in.php" class="account-already">Sign in</a></p>

        </div>


</body>
<script rel="script" src="Script.js"><script>
</html>
