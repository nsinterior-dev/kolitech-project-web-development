
<!DOCTYPE html>
<html lang="en">
<head>

    <link href="css/HomepageDesign.css"  rel="stylesheet">
    <link href="css/IT-Consul.css" rel="stylesheet">
    <link href="css/dashboard.css"  rel="stylesheet">
    <link href="css/cybersecurity.css"  rel="stylesheet">
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
    <meta   content="width=device-width, initial-scale=1.0, minimum-scales=1.0" charset="UTF-8" name="viewport"/>
    <title>KoliTECH - Cybersecurity</title>
</head>
<style>
    .content{
        height:350vh ;
    }
    .cybersecurity{
        background-color: #ccd9ff;
        color: #00061a;
    }
</style>
<body>
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
<div class="headie">

    <div class="head">
        <section class="section-one">
            <a href="<?php if (isset($_SESSION['userID'])){ require('config.php'); echo 'dashboard.php?origin=signIn';}else{ echo 'index.php'; }?>" class="logo-active">
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
                <a class="svg-text-active" href="<?php if (isset($_SESSION['userID'])){ require('config.php'); echo 'dashboard.php?origin=signIn';}else{ echo 'index.php'; }?>">
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
        <h2 class="IT-C">Cybersecurity Services</h2>
            <img src="img/cybersecurity.png" style="width: 60vw;">
        <p class="dess">KoliTECH offers an assortment of administrations from data security counseling to surveying, testing and improving the assurance of utilizations and organizations for organizations working in medical services, producing, banking, retail, broadcast communications, and different enterprises.</p>
       <br>
        <p class="dess">Our security specialists build up an individual way to deal with every client dependent on prescribed procedures and advanced with our own insight. We are prepared to help our customers at all undertaking stages.</p>
       <br><br>
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
    <div class="cybersecurity-services">
        <h2 class="cyber-services">Cybersecurity Services by KoliTECH</h2>
        <p class="eto">We offer our customers a variety of cybersecurity services to:</p>
        <ul class="hm">
            <li class="hm1">Significantly reduce the number of security weaknesses in web, mobile, and desktop applications, as well as in our clients’ networks.</li>
            <li class="hm1">Ensure their constant compliance with appropriate regulations and standards (PCI DSS, GDPR, HIPAA).</li>
        </ul>
        <div class="cybersecurity-1">
            <img class="img-security-1" src="img/security-planning.png">
            <h3 class="security-text-1">Security Planning</h3>
            <ul class="security-list-1">
                <li>Information security consulting</li>
                <li>Security testing of IT infrastructures and its components</li>
                <li>Stress testing: emulation of DDoS / DoS attacks</li>
            </ul>
        </div>
        <div class="cybersecurity-2">
            <img class="img-security-2" src="img/application-security.png">
            <h3 class="security-text-2">Application Security</h3>
            <ul class="security-list-2">
                <li>Security code review</li>
                <li>Mobile device management and mobile application management</li>
                <li>Cloud security</li>
                <li>Web application security</li>
            </ul>
        </div>
        <div class="cybersecurity-3">
            <img class="img-security-3" src="img/network-security.png">
            <h3 class="security-text-3">Network Security</h3>
            <ul class="security-list-3">
                <li>SIEM</li>
                <li>DDoS protection</li>
                <li>Email security</li>
                <li>Firewalls, IDS / IPS, DLP implementation and setting</li>
                <li>Antivirus protection</li>
            </ul>
        </div>
        <hr style="position: relative; top: 85vh;">
    </div>
    <div class="security-planning">
        <h2 class="security">Security Assessment and Planning</h2>
        <p class="eto">KoliTECH delivers full-scale security assessment and planning services for the components of IT infrastructures:</p>

        <div class="cybersecurity-4">
            <p class="sulat">Web, Mobile, Desktop App</p>

        </div>
        <div class="cybersecurity-5">
            <p class="sulat">Network Services</p>

        </div>
        <div class="cybersecurity-6">
            <p class="sulat">Remote Access Software</p>

        </div>
        <div class="cybersecurity-7">
            <p class="sulat"> IoT Devices</p>

        </div>
        <div class="cybersecurity-8">
            <p class="sulat">Employee Behavior</p>

        </div>
        <div class="cybersecurity-9">
            <p class="sulat">  Client Side</p>

        </div>

    </div>

    <div class="big-data-row-1">
        <h2 class="solutions-all">Bring Your Cybersecurity to the Front</h2>
        <hr style="width: 25%;margin: 1vh;">
        <p class="basta" style="margin: 2vh; text-align: justify; font-family: Montserrat, sans-serif; color: #112F4D;">
            KoliTECH's security team is ready to help you to apply the most relevant defense measures for your IT environment. Don’t hesitate to get in touch with us for a free consultation on any security issue you have, and we’ll define and implement an optimal way to address it.
        </p>
        <input type="button" name="okay" onclick="document.location.href='contact-us.php?origin=signIn&&from=cyber-security'" class="advise-btn" value="GET A QUOTE">
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