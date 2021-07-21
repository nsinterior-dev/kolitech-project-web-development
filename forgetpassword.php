
<!DOCTYPE html>
<html>
<head>
    <link rel="apple-touch-icon" sizes="150x150" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <link rel="stylesheet" href="css/HomepageDesign.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta   content="width=device-width, initial-scale=1.0, minimum-scales=1.0" charset="UTF-8" name="viewport"/>
    <title>Forgot Password</title>
</head>
<style>
    .forget-p{
        position: absolute;
        top: 30vh;
        left: 5vw;
        font-family: Montserrat-medium, sans-serif;

    }
    form{
        position: absolute;
        top: 35vh;
        left: 5vw;
        display: flex;
    }
    label{
        margin-top: 1.25vh;
        margin-right: 1vh;
        font-family: Montserrat, sans-serif;
        vertical-align: middle;
        line-height: 1;
    }
    .email{
        font-family: Montserrat, sans-serif;
        padding: 1.25vh;
        outline: none;
        border-style: solid;
        border-width: thin;
        border-color: rgba(0,0,0,0.2);
    }
    .forget-btn{
        font-family: Montserrat-SemiBold, sans-serif;
        padding: 1.25vh;
        background-color: #00061a;
        color: #deeafc;
        border-top-right-radius: 2vh;
        border-bottom-right-radius: 2vh;
        outline: none;
        border-style: solid;
        border-width: thin;
        border-color: rgba(0,0,0,0.2);
        cursor: pointer;
    }
    .forget-btn:hover{
        background-color: #1a2346;
    }

    .error{
        position: absolute;
        top: 43vh;
        left: 8.5vw;
        color: rgba(221,44,0,0.87);
        font-family: Montserrat-SemiBold, sans-serif;
    }


</style>
<body>
        <div class="headie" ">

            <div class="head">
                <section class="section-one">
                    <a href="index.php" class="logo-active">
                        <h1 class="logo">koliTECH</h1>
                    </a>
                </section>
                <a href="sign-up.php" class="sign-up-active">
                    <svg class="button-svg-one">
                        <rect class="button-svg-one-rect" ></rect>
                    </svg>
                    SIGN UP
                </a>
                <a href="sign-in.php" class="sign-in-active">
                    <svg class="button-svg-one">
                        <rect class="button-svg-two-rect"></rect>
                    </svg>
                    SIGN IN
                </a>
            </div>
            <div class="line"></div>

            <div class="border-one">

                <center>
                    <svg class="svg-1" height="2vh" width="5vh" >
                        <a class="svg-text-active" href="index.php">
                            <text class="svg-text-1" x="0vh" y="0vh"  fill="transparent" text-anchor="middle" >koliTECH</text>

                        </a>
                    </svg>
                </center>
                <div class="company-div">
                    <a href="#" class="company">COMPANY </a>
                    <div class="company-div-items">
                        <a href="#" class="company-items">About Us</a>
                        <a href="#" class="company-items">FAQs</a>
                    </div>
                </div>
                <div class="services-div">
                    <a href="#" class="services">SERVICES </a>
                    <div class="services-div-items">
                        <a href="it-services.php" class="services-items">IT Services</a>
                        <a href="it-consultation-user.php" class="services-items">IT Consultation</a>
                        <a href="web-development.php" class="services-items">Web Development</a>
                    </div>
                </div>
                <div class="projects-div">
                    <a href="#" class="projects">WORKSHOP </a>
                    <div class="projects-div-items">
                        <a href="workshop-web-development.php" class="projects-items">Web Development</a>
                        <a href="workshop-basic-programming.php" class="projects-items">Basic Programming</a>
                        <a href="workshop-data-science.php" class="projects-items">Data Science</a>
                    </div>
                </div>

            </div>

        </div>
        <p class="forget-p">Please enter your email address that you provided when you created your account. </p>
        <form class="forget-form" action="" method="post">

            <!--Email -->
            <div class="col-1">
                <label for="txtEmail" class="sign-in-label">Email</label>
            </div>
            <div class="col-2">
                <input type="email" class="email" id="txtEmail" placeholder="username@email.com" name="txtEmail">
            </div>

            <!--Buttons -->
            <input type="submit" class="forget-btn" id="submitbtn" name="Submit" value="RESET PASSWORD">


        </form>
        <?php

        error_reporting(0);
        ob_start();

        session_start();
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\PHPMailer;
        $error ="";
        if (isset($_POST['Submit'])){
            require('config.php');
            $email = mysqli_real_escape_string($conn,$_POST['txtEmail']);

            $r_email = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

            if (!$email){
               $error= 'Please enter your email';
            }
            elseif (!preg_match($r_email,$email)){
                $error= 'Please enter a valid email.';
            }
            else{
                $result = mysqli_query($conn, "SELECT * FROM accounts WHERE Email = '$email' AND isVerified LIMIT 1");
                if (mysqli_num_rows($result)){
                    $row = mysqli_fetch_assoc($result);
                    $name = $row['Fname'];
                    $userID = $row['userID'];
                    date_default_timezone_set("Asia/Singapore");
                    $exp = mktime(date("H"),date("i"),date("s"),date("m"),date("d")+1, date("Y"));
                    $fkey = md5(time().$email);
                    $addkey = substr(md5(uniqid(rand(),1)),3,10);
                    $fkey = $fkey.$addkey;

                    mysqli_query($conn, "INSERT INTO token(userID, Email, fkey, expdate)VALUES('$userID','$email','$fkey','$exp')");


                    // email for recovery



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


                    $mail->addAddress($email,$name);



                    $mail->isHTML(true);
                    $mail->Subject = 'Reset Password';
                    $mail->Body = "<p class='email-recovery'>Dear ".$name."<br> </p>
                    <p class='email-recovery'>Please click on the following link to reset your password.</p>
                    <p class='email-recovery'>----------------------------------------------------------</p>
                    <p class='email-recovery'><a class='email-recovery' href='http://localhost/kolitech/reset-password.php?fkey=$fkey&Email=$email'>Reset Password</a></p>
                    <p class='email-recovery'>----------------------------------------------------------</p>
                    <p class='email-recovery'>Please be sure to copy the entire link into your browser.
                                The link will expire after 1 day for security reason<br></p>";

                    $mail->send();

                    ob_end_flush();
                    echo "<script language='javascript' type='text/javascript'>location.href='sent.php'</script>";
                    header('location: sent.php');


                }
                else{
                    $error = 'Something was wrong. It is initially that you email is not existing';
                }
            }

        }

        echo "<p class='error'>".$error."</p>";
        ?>


        <div class="content" id="content">


        </div>
        <div class="foot" id="footer">

        </div>
        <script src="scripts/Script.js"></script>
</body>
</html>
