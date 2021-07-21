<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/HomepageDesign.css"  rel="stylesheet">
    <link href="css/mobile.css" media="screen and (max-width: 530px)"   rel="stylesheet">
    <link href="css/tablet.css" media="screen and (max-width: 768px)"  rel="stylesheet">
    <link href="css/small-screen.css" media="screen and (max-width: 1024px)"  rel="stylesheet">
    <link href="css/average.css" media="screen and (max-width: 1200px)"  rel="stylesheet">
    <link href="css/bigscreen.css" media="screen and (max-width: 1500 px)"  rel="stylesheet">
    <link rel="apple-touch-icon" sizes="150x150" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta   content="width=device-width, initial-scale=1.0" charset="UTF-8" name="viewport"/>
    <title>KoliTECH</title>
</head>
<body style="height: 120vh;>
<div class="headie">
    <?php
    error_reporting(0);
    session_start();
    $message = " ";
    $logout= " ";
    $account_logo = " ";
    $account_name = " ";
    $div ="";
    // this if statement is about when the user tried to run this without signing in, the page will eventually redirect to the index.php
    //if (!isset($_SESSION['userID'])){
    //    require('config.php');
    //    header('location: index.php');
    //    exit();
    //}
    // if an account is signed in first name will be fetch and link of sign out will be displayed
    if ($_GET['origin'] =='signIn' && isset($_SESSION['userID'])){
        require('config.php');
        $userid = $_SESSION['userID'];
        $result = mysqli_query($conn, "select * from accounts where userID ='$userid' LIMIT 1");
        $num = mysqli_num_rows($result);
        if ($num == 1){
            $row = mysqli_fetch_assoc($result);
            $name = $row['Fname'];
            $logout = '<a class="sign-out" href="logout.php">SIGN OUT</a>';
            $div = "<p class='div'>|</p>";
            $account_logo = "";
            $account_name = '<i style="font-size:4vh" class="fas">	&#xf2bd;</i><p class="name">'.$name.'</p>';
        }

    }
    else{
        // else echo the sign up and sign in on the head
        $signup = '<a href="sign-up.php" class="sign-up-active"><svg class="button-svg-one"><rect class="button-svg-one-rect" ></rect></svg>SIGN UP</a>';
        $signin = '<a href="sign-in.php" class="sign-in-active"><svg class="button-svg-one"><rect class="button-svg-two-rect"></rect></svg>SIGN IN</a>';
    }

    ?>
    <div class="head">
        <section class="section-one">
            <a href="<?php if ($_GET['origin'] =='signIn' && isset($_SESSION['userID'])){ require('config.php'); echo 'dashboard.php?origin=signIn';}else{ echo 'index.php'; }?>" class="logo-active">
                <h1 class="logo">koliTECH</h1>
            </a>
        </section>
        <div class="line"></div>
        <!--- ung accts icon-->
        <?php
        echo $account_logo;
        echo $account_name;
        echo $div;
        echo $logout;
        echo $signup;
        echo $signin;
        ?>

    </div>
    <br>


    <div class="border-one">

        <center>
            <svg class="svg-1" height="2vh" width="5vh" >
                <a class="svg-text-active" href="<?php if ($_GET['origin'] =='signIn' && isset($_SESSION['userID'])){ require('config.php'); echo 'dashboard.php?origin=signIn';}else{ echo 'index.php'; }?>">
                    <text class="svg-text-1" x="0vh" y="0vh"  fill="transparent" text-anchor="middle" >koliTECH</text>

                </a>
            </svg>
        </center>
        <div class="company-div">
            <a href="#" class="company">COMPANY </a>
            <div class="company-div-items">
                <a href="<?php if (isset($_SESSION['userID'])){echo 'about-us.php?origin=signIn';}else{echo 'about-us.php';} ?>" class="company-items">About Us</a>
                <a href="<?php if (isset($_SESSION['userID'])){echo 'faqs.php?origin=signIn';}else{echo 'faqs.php';} ?>" class="company-items">FAQs</a>
            </div>
        </div>
        <div class="services-div">
            <a href="#" class="services">SERVICES </a>
            <div class="services-div-items">
                <a href="<?php if (isset($_SESSION['userID'])){echo 'it-services.php?origin=signIn';}else{echo 'it-services.php';} ?>" class="services-items">IT Services</a>
                <a href="<?php if (isset($_SESSION['userID'])){echo 'it-consultation-user.php?origin=signIn';}else{echo 'it-consultation-user.php';} ?>" class="services-items">IT Consultation</a>
                <a href="<?php if (isset($_SESSION['userID'])){echo 'web-development.php?origin=signIn';}else{echo 'web-development.php';} ?>" class="services-items">Web Development</a>

            </div>
        </div>
        <div class="projects-div">
            <a href="#" class="projects">WORKSHOP </a>
            <div class="projects-div-items">
                <a href="<?php if (isset($_SESSION['userID'])){echo 'workshop-web-development.php?origin=signIn';}else{echo 'workshop-web-development.php';} ?>" class="projects-items">Web Development</a>
                <a href="<?php if (isset($_SESSION['userID'])){echo 'workshop-basic-programming.php?origin=signIn';}else{echo 'workshop-basic-programming.php';} ?>" class="projects-items">Basic Programming</a>
                <a href="<?php if (isset($_SESSION['userID'])){echo 'workshop-data-science.php?origin=signIn';}else{echo 'workshop-data-science.php';} ?>"  class="projects-items">Data Science</a>
            </div>
        </div>




    </div>




</div>

<div class="content" id="content" style="height: 130vh; ">
    <h1 style="position: relative; top: 30vh; left: 6.57vw;font-family: Ubuntu-Bold, sans-serif; font-size: 5vh;color: #112F4D;">Frequently Asked Questions</h1>
    <hr style="width: 80%; position: relative; left: 6.57vw; top: 32vh;font-family: Montserrat, sans-serif; font-size: 4vh;color: #112F4D;">
    <br>
    <h2 style="position: relative; top: 34vh;left: 6.57vw; width: 80vw;font-family: Ubuntu-Med, sans-serif; font-size: 4vh;color: #112f4d;">How can we join the team?</h2>
        <p style="position: relative; top: 36vh;left: 6.57vw; width: 80vw;font-family: Montserrat, sans-serif; font-size: 2.5vh;color: #5B6D86;">Contact us using any of our social media platforms and we will reply as soon as we can upon your submission of resume and portfolio</p>
    <br> <br>
    <h2 style="position: relative; top: 34vh;left: 6.57vw; width: 80vw;font-family: Ubuntu-Med, sans-serif; font-size: 4vh;color: #112F4D;">How much does creating a website cost?</h2>
        <p style="position: relative; top: 36vh;left: 6.57vw; width: 80vw;font-family: Montserrat, sans-serif; font-size: 2.5vh;color: #5B6D86;">The price varies depending on the scope of the website and the included features and functionalities the client wants.</p>
    <br>  <br>
    <h2 style="position: relative; top: 34vh;left: 6.57vw; width: 80vw;font-family: Ubuntu-Med, sans-serif; font-size: 4vh;color: #112F4D;">Hoe much for creating an app?</h2>
        <p style="position: relative; top: 36vh;left: 6.57vw; width: 80vw;font-family: Montserrat, sans-serif; font-size: 2.5vh;color: #5B6D86;">Varies as well just like for the website.</p>
    <br>  <br>
    <h2 style="position: relative; top: 34vh;left: 6.57vw; width: 80vw;font-family: Ubuntu-Med, sans-serif; font-size: 4vh;color: #112F4D;">What kind of app can we make?</h2>
        <p style="position: relative; top: 36vh;left: 6.57vw; width: 80vw;font-family:Montserrat, sans-serif; font-size: 2.5vh;color: #5B6D86;">We can cover almost any kind of app be it for a game or a business app.</p>
    <br> <br>
    <h2 style="position: relative; top: 34vh;left: 6.57vw; width: 80vw;font-family: Ubuntu-Med, sans-serif; font-size: 4vh;color: #112F4D;">Will the price for the workshops worth it?</h2>
        <p style="position: relative; top: 36vh;left: 6.57vw; width: 80vw;font-family:Montserrat, sans-serif; font-size: 2.5vh;color: #5b6d86;">We can guarantee its worth 100%. Our team does not only get the job done, they also make sure that they monitor each student to <br>do their best in applying the lessons and we make sure to train them in order to do so.</p>
</div>
<div class="foot" id="footer">
    <br>
    <p class="follow">Follow us on</p>
    <div class="soc">
        <a class="soc-med" href="#"><i  style=" font-size: 3vh;padding: 2vh;" class="fab fa-facebook"></i></a>
        <a class="soc-med" href="#"><i style=" font-size: 3vh;padding: 2vh;" class="fab fa-twitter"></i></a>
        <a class="soc-med" href="#"><i style=" font-size: 3vh;padding: 2vh;" class="fab fa-instagram"></i></a>
        <a class="soc-med" href="#"><i style=" font-size: 3vh;padding: 2vh;" class="fab fa-linkedin-in"></i></a>
        <a class="soc-med" href="#"><i style=" font-size: 3vh;padding: 2vh;"  class="fab fa-google"></i></a>
    </div>
    <br>

    <p class="cntct-us">contact us</p>
    <br>
    <p class="num">09998217524 | kolitech08@gmail.com</p>
    <p class="address">123 St. Brgy. Cardo, Quezon City, NCR, Philippines</p>
    <br>
    <p class="name1">nicolle interior | john christopher bagas</p>
    <br>
    <p class="copyright"><i class="fas fa-copyright"></i> <?php echo date('Y'); ?> All rights reserved by koliTech.co</p>
    <p class="sample-website" style="font-size: 1.45vh; font-family: Montserrat, sans-serif;text-align: center;">KoliTech.co is a sample website for school purposes.</p>

</div>

<script src="scripts/Script.js"></script>
</body>
</html>
