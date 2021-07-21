<?php
// when the user clicks 'view details' from it-services.php
?>
<?php
//other services
?>
<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en" class="sr">
<head>
    <link href="css/HomepageDesign.css"  rel="stylesheet">
    <link href="css/dashboard.css"  rel="stylesheet">
    <link href="css/desktop-application.css" rel="stylesheet">
    <link href="css/mobile.css" media="screen and (max-width: 530px)"   rel="stylesheet">
    <link href="css/tablet.css" media="screen and (max-width: 768px)"  rel="stylesheet">
    <link href="css/small-screen.css" media="screen and (max-width: 1024px)"  rel="stylesheet">
    <link href="css/average.css" media="screen and (max-width: 1200px)"  rel="stylesheet">
    <link href="css/bigscreen.css" media="screen and (max-width: 1500 px)"  rel="stylesheet">
    <link rel="apple-touch-icon" sizes="150x150" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.3/aos.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta   content="width=device-width, initial-scale=1.0" charset="UTF-8" name="viewport"/>
    <title>KoliTECH - Desktop Applications Services</title>
</head>
<?php
error_reporting(0);
session_start();
$message = " ";
$logout= " ";
$account_logo = " ";
$account_name = " ";
$div ="";
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
<body >

<div class="headie">

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

<div class="content" id="content" style="height: 280vh;">
    <div class="da-row">
        <h2 class="da-title">Desktop Application Development Services</h2>
        <p class="da-description">KoliTECH develops Rich Desktop Applications (RDAs) for companies that have unique business processes. Our team recommends using cross-platform standalone and client-server business applications, as you can save development time and money, get high performance and stability. We are concentrated on delivering efficient, bug-free, user-friendly and intuitive desktop application service that will meet with the modern technology stack.</p>
        <br>
       <center><img src="img/desktop.png" class="da-row-img"></center>
        <p class="linya" style="display: none;" href="#" >..................................................................</p>
        <br>
        <hr>
    </div>
    <div class="da-row-1">
        <h2 class="da-sub-title">We Have Expertise In The Next Fields</h2>
        <br>
        <div class="da-row-container">
            <div class="da-row-1-box">
                <i class="fas fa-microchip" style="font-size: 8.5vh;"></i>
              <center> <h5 class="da-row-1-box-sub">LOW-LEVEL APPLICATIONS</h5></center>
                <center><p class="da-row-1-box-p">File system encryption, real-time backups, custom network protocols, system reboot</p> </center>
            </div>
            <div class="da-row-1-box">
                 <i class="fas fa-hand-pointer" style="font-size: 8.5vh;"></i>
               <center><h5 class="da-row-1-box-sub">TOUCH / GESTURE BASED APPS</h5></center>
                <center><p class="da-row-1-box-p">Touch access to kiosk devices, tablet devices on Windows: tap, panning, rotate, swipe, zoom, pinch and flicks</p> </center>
            </div>
            <div class="da-row-1-box">
                <i class="fas fa-user-shield" style="font-size: 8.5vh;"></i>
                <center><h5 class="da-row-1-box-sub">SECURE SOLUTIONS</h5></center>
                <center><p class="da-row-1-box-p">Multilayer insurance of developed applications using ssh approaches and OS tweaks</p> </center>
            </div>
        </div>
    </div>
    <div class="da-row-2">
        <h2 class="da-sub-title">Technologies We Use</h2>
        <br>
        <div class="da-row-container">
            <div class="da-row-1-box-1">
                <center><img src="img/c%23.png" class="lang-img-1"></center>
                <center> <h5 class="da-row-1-box-sub-1">C++</h5></center>
            </div>
            <div class="da-row-1-box-1">
                <center><img src="img/c++-flat.png" class="lang-img-1"></center>
                <center> <h5 class="da-row-1-box-sub-1">C#</h5></center>
            </div>
            <div class="da-row-1-box-1">
                <center><img src="img/java%20(1).png" class="lang-img-1"></center>
                <center> <h5 class="da-row-1-box-sub-1">JAVA</h5></center>
            </div>
        </div>
        <br>
        <hr style="position: relative; top: 30vh;">
       
    </div>
    <div class="da-row-3">
        <p class="find-contact">Are you looking for an efficient, bug-free, user-friendly and intuitive desktop application?</p><input type="submit" name="okay" class="contact-btn" onclick="document.location.href='contact-us.php?origin=signIn&&from=desktop-applications'" value="CONTACT US">
        <p class="slogan-again">This Will Never Take Off. Tomorrow starts here.</p>
    </div>

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
    <p class="copyright-1" style="

    text-transform: Capitalize;
    text-align: center;
    font-family: Abel,sans-serif;
    letter-spacing: 0.25vh;
    color: #00061a;"><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y'); ?> All rights reserved by koliTech.co</p>
    <p class="sample-website" style="font-size: 1.45vh; font-family: Montserrat, sans-serif;text-align: center;">KoliTech.co is a sample website for school purposes.</p>

</div>

<script src="scripts/Script.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.3/aos.js"></script>
<script>
    AOS.init();


</script>
</body>
</html>


