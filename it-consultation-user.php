
<!DOCTYPE html>
<html lang="en">
<head>

    <link href="css/HomepageDesign.css"  rel="stylesheet">
    <link href="css/IT-Consul.css" rel="stylesheet">
    <link href="css/dashboard.css"  rel="stylesheet">
    <link href="css/mobile.css" media="screen and (max-width: 530px)"   rel="stylesheet">
    <link href="css/mobile-itcu.css" media="screen and (max-width: 530px)"   rel="stylesheet">
    <link href="css/tablet.css" media="screen and (max-width: 768px)"  rel="stylesheet">
    <link href="css/tablet-itcu.css" media="screen and (max-width: 768px)"  rel="stylesheet">
    <link href="css/small-screen.css" media="screen and (max-width: 1024px)"  rel="stylesheet">
    <link href="css/small-screen-itcu.css" media="screen and (max-width: 1024px)"  rel="stylesheet">
    <link href="css/average.css" media="screen and (max-width: 1200px)"  rel="stylesheet">
    <link href="css/average-itcu.css" media="screen and (max-width: 1200px)"  rel="stylesheet">
    <link href="css/bigscreen.css" media="screen and (max-width: 1500 px)"  rel="stylesheet">
    <link rel="apple-touch-icon" sizes="150x150" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta   content="width=device-width, initial-scale=1.0, minimum-scales=1.0" charset="UTF-8" name="viewport"/>
    <title>KoliTECH - IT Consultation</title>
</head>
<style>
    .content{
        height:250vh ;
    }
</style>
<body>
<?php
error_reporting(0);
session_start();

//if (!isset($_SESSION['userID'])){
//    require('config.php');
 //   ob_start();
 //   header('location: index.php');
//}
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
<div class="headie">

    <div class="head">
        <section class="section-one">
            <a href="<?php if ($_GET['origin']=='signIn' && isset($_SESSION['userID'])){ require('config.php'); echo 'dashboard.php?origin=signIn';}else{ echo 'index.php'; }?>" class="logo-active">
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
                <a class="svg-text-active" href="<?php if ($_GET['origin']=='signIn' && isset($_SESSION['userID'])){ require('config.php'); echo 'dashboard.php?origin=signIn';}else{ echo 'index.php'; }?>">
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

<div class="content" id="content">
    <div class="row">
        <h2 class="IT-C">Information Technology Consultation</h2>
        <p class="description">With IT counseling administrations, you redo your IT climate to make it go close by with your business needs.
            KoliTECH offers consultancy on comprehensive, quick, and savvy enhancement of IT frameworks and cycles to guarantee substantial business results.</p>
        <br>
        <p class="des1" href="#" >..................................................................</p>
        <hr>
    </div>
    <div class="consult-container">
        <a class="des" id="des" href="<?php if (isset($_SESSION['userID'])){echo 'it-consultation-user.php?origin=signIn';}else{echo 'it-consultation-user.php';} ?>"><h3 class="identity">IT Consultation</h3>
            <br></a>

        <a href="<?php if (isset($_SESSION['userID'])){echo 'bigdata.php?origin=signIn';}else{echo 'bigdata.php';} ?>" id="bigData" class="big-data">Big Data</a>
        <br>
        <br>
        <a href="<?php if (isset($_SESSION['userID'])){echo 'cybersecurity.php?origin=signIn';}else{echo 'cybersecurity.php';} ?>" id="cybersecurity" class="cybersecurity">Cybersecurity</a>
        <br>
        <br>
        <a href="<?php if (isset($_SESSION['userID'])){echo 'it-service-management.php?origin=signIn';}else{echo 'it-service-management.php';} ?>" id="serviceManagement" class="service-management">IT Service Mangement</a>

        <br>
        <br>
        <a href="<?php if (isset($_SESSION['userID'])){echo 'project-management-consulting.php?origin=signIn';}else{echo 'project-management-consulting.php';} ?>" id="projectManagement" class="project-management">Project Management Consulting</a>
        <br>
        <br>
        <a class="des1" href="#" id="des1">..................................................................</a>
    </div>
    <br>
    <div class="row-2">
        <h2 class="choose-your-options">choose your options</h2>
        <a href="#" class="div-container-1">
            <div class="the-div">
                <img class="strategy" src="img/strategy.png">
                <h3 class="h3-write">it strategy consulting <br> for cio</h3>
                <p class="ano">We make a technique that would unite an enhanced IT scene and make it run after supporting existing business cycles and driving new business activities.</p>
                <br>
                <input type="submit" name="okay" class="strategy-button" onclick="document.location.href='contact-us.php?origin=signIn&&from=strategy-consulting'" value="BUILD YOUR STRATEGY">

            </div>
        </a>
        <a href="#" class="div-container-2">
            <div class="the-div-2">
                <img class="project" src="img/project.png">
                <h3 class="h3-write-1">solution consulting<br> for project sponsor</h3>
                <p class="ano-1">We investigate your business needs and help you settle on essential choices on the quick and fruitful usage of business-basic arrangements.</p>
               <br>
                <br>
                <br>
                <br>
                <br>
                <input type="submit" name="okay" class="project-button" onclick="document.location.href='contact-us.php?origin=signIn&&from=project-consulting'" value="GET SOLUTION CONSULTING">
            </div>
        </a>
        <a href="#" class="div-container-3">
            <div class="the-div-3">
                <img class="technical" src="img/technical-support.png">
                <h3 class="h3-write-1">technology consulting<br> for it manager</h3>
                <p class="ano-2">We separate the current state of the advancement district of your preferred position and help its steady progression to cause it to expect a more recognizable part in your business improvement.</p>
                <input type="submit" name="okay" onclick="document.location.href='contact-us.php?origin=signIn&&from=technology-consulting'" class="tech-button" value="ADOPT NEW TECHNOLOGIES">
            </div>
        </a>

        <hr class="hr-1">
    </div>
    <br>
    <div class="row-3">
        <h2 class="approach">KoliTECH's Approach to IT Consultation</h2>
        <div class="the-div-4">
            <h4 class="h4-write"> doing the right IT</h4>

            <p class="doing-the-right-it">We don't acquaint new advancements just with make your organization "present day": the essential point is to carry recognizable business results with IT.</p>
        </div>
        <div class="the-div-5">
            <h4 class="h4-write" > doing IT right</h4>
            <p class="doing-the-right-it">We advance IT administrations to make them more solid and savvy and help present new IT benefits quick.</p>
        </div>
        <hr class="hr-2">
    </div>
    <div class="row-4">
            <img src="img/ceo.jpg" class="ceo">
            <div class="the-div-6">
                <h3 class="ceo-name">Nicolle Interior, CEO at KoliTECH</h3>
                <br>
                <p class="speech">"I generally discover motivation in reasoning the amount we at KoliTECH can assist organizations with accomplishing business by means of doing the correct IT and doing IT right.</p>
                <br>
                <p class="speech-1"> Each cycle can be improved or changed carefully. There's consistently an approach to accomplish a lot better yield on representatives' endeavors and an organization's assets. An organization can develop powerfully. What's more, an organization can make its clients and workers more fulfilled and considerably more joyful."</p>
            </div>
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
    color: #00061a;"><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y'); ?> All rights reserved by koliTECH.net</p>
    <p class="sample-website" style="font-size: 1.45vh; font-family: Montserrat, sans-serif;text-align: center;">KoliTECH.net is a sample website for school purposes.</p>

</div>

<script src="scripts/Script.js">

</script>
</body>
</html>