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

<div class="content" id="content" style="height: 150vh; ">
    <div class="div-box" style=" height: 80vh; width: 80vw; position: relative; left: 6.57vw; top: 25vh;">
        <h1 style="font-family: Ubuntu-Bold, sans-serif; font-size: 4.5vh; color: #0C2D48;">About us</h1>
        <br>
        <hr>
        <br>
        <h2 style="font-family: Ubuntu-Med, sans-serif; font-size: 4.25vh; color: #0F192A;">Company</h2>
        <br>
        <p style="font-family:Montserrat, sans-serif; font-size: 3vh; color: #495260; text-align: justify;">
            Kolitech company is a group of professional developers that are recognized by their accomplishments and experience from other projects.

            We provide different services that will surely help you and your team develop your own system be it an app or a site. We can offer you consultations regarding your challenges faced in your work and help you to understand the how’s around the problems. We can also create the site or app you want!

            Aside from these services, we also have a variety of workshops handled by our technical teams and professional individuals. If you get your interests piqued from how websites and mobile apps are made but do not have the basic information to do so, you can join us during our lectures!
        </p>
        <br>
        <h2 style="font-family: Ubuntu-Med, sans-serif; font-size: 4.25vh; color: #0F192A;">
            CEO
        </h2>
        <br>
        <h3 style="font-family: Ubuntu-Med, sans-serif; font-size: 4vh; color: #0F192A;">Engr. Nicolle Samiley Interior</h3>
        <p style="font-family:Montserrat, sans-serif; font-size: 3.25vh; color: #495260;text-align: justify;">
            Nicolle is one of the very few students that persevere and succeeded in the hellish university called Polytechnic University of the Philippines. The environment there is not at all welcoming for students that have plans to enhance their skills due to unending school works that are not thought by the professors that do not even bother teach their students about their subjects. That being said, she still aced the academy with flying colors, skills that are incomparable to many and experience that intimidates even seasoned developers.
        </p>
        <br><br>
        <h2 style="font-family:Ubuntu-Med, sans-serif; font-size: 4vh; color: #0F192A;">
            Goals
        </h2>
        <br>
        <p style="font-family: Montserrat, sans-serif; font-size: 3.25vh; color: #495260; text-align: justify;">
            The main goal of our company is to help current and future developers in improving their knowledge and skills. If you are interested to join the team, just contact us and let us grow together in the path of digital age!
        </p>
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
    <p class="copyright"><i class="fas fa-copyright"></i> <?php echo date('Y'); ?> All rights reserved by koliTech.co</p>
    <p class="sample-website" style="font-size: 1.45vh; font-family: Montserrat, sans-serif;text-align: center;">KoliTech.co is a sample website for school purposes.</p>

</div>

<script src="scripts/Script.js"></script>
</body>
</html>

