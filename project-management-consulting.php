
<!DOCTYPE html>
<html lang="en">
<head>

    <link href="css/HomepageDesign.css"  rel="stylesheet">
    <link href="css/IT-Consul.css" rel="stylesheet">
    <link href="css/dashboard.css"  rel="stylesheet">
    <link href="css/pm.css"  rel="stylesheet">
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
    <title>KoliTECH - Project Management Consulting</title>
</head>
<style>
    .content{
        height:330vh ;
    }
    .project-management{
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
        <h2 class="IT-C">IT Project Management Consultation</h2>
        <img src="img/pm.png " style="width: 60vw;">
        <p class="dess">IT project management consulting services are aimed to help businesses successfully run and complete IT projects.</p>
        <br>
        <p class="dess">KoliTECH offers a comprehensive set of project management consulting services to help you deliver IT initiatives at improved speed, within the established budget and quality.</p>
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
    <div class="pm-div-0">
        <i style="font-size:20vh; margin: 3vh" id="flag" class="fa">&#xf024;</i>
        <h2 class="pm-approach">Watch Out For the Red Flags of a Troubled Project!</h2>
        <p class="pm-paragraph">Wary of starting your IT initiative in fear of the problems below or experience them right now?
        </p>
        <ul class="pm-list">
            <li>The project is consistently behind the schedule.</li>
            <li>The project is over budget.</li>
            <li>Low quality of the output (software with defects).</li>
            <li>Project scope creep.</li>
            <li>High technical debt.</li>
            <li>Low project progress transparency..</li>
            <li>Poor communication in the project team.</li>
        </ul>
        <input type="button" onclick="document.location.href='contact-us.php?origin=signIn&&from=pmConsulting'" name="okay" class="advise-btn" value="SOLVE PM ISSUES">
    </div>
    <div class="pm-div-1">
      <h2 class="pm-approach-1">Deliverables you get with project management consulting</h2>
        <div class="pm-1">
            <h3 class="pm-text-1"><b>Supporting PM documentation</b></h3>

            <ul class="pm-list-1">
                <li>Estimated project scope, risks and budgets.</li>
                <li>Description of a chosen PM methodology and project implementation approach.</li>
                <li>Detailed project timeline estimates and breakdown into work phases, deliverables, and activities.</li>
                <li>Optimal project schedule.</li>
                <li>Scheme and/or schedule for optimal resource allocation throughout the project.</li>
            </ul>
        </div>
        <div class="pm-2">
            <h3 class="pm-text-1"><b>PM instruments</b></h3>

            <ul class="pm-list-2">
                <li>Project KPI system and KPI templates.</li>
                <li>Recommended project management software (we can customize, set it up on demand and provide initial user training).</li>
                <li>Requirements traceability matrix.</li>
            </ul>
        </div>
        <div class="pm-3">
            <h3 class="pm-text-1"><b>Established processes for</b></h3>

            <ul class="pm-list-1">
                <li>Requirements formalization.</li>
                <li>Quality assurance (QA).</li>
                <li>Project communication, including project performance reporting.</li>
                <li>Continuous integration and continuous delivery (our DevOps experts can design and implement the CI/CD pipeline).</li>
                <li>Release and deployment management.</li>
            </ul>
        </div>
        <hr style="position: relative; top: 75vh;">
    </div>
    <div class="pm-div-2">
        <h2 class="solutions-all">Easily Navigate Your IT Project!</h2>
        <hr style="width: 25%;margin: 1vh;">
        <p class="basta" style="margin: 2vh; text-align: justify; font-family: Montserrat, sans-serif; color: #112F4D;">KoliTECH is ready to help you start and keep large IT initiatives on track – with balanced process standardization and agility.</p>
        <input type="button" name="okay" onclick="document.location.href='contact-us.php?origin=signIn&&from=pmConsultlead'" class="lead-btn" value="LEAD MY PROJECT TO SUCCESS">
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

<script src="scripts/Script.js"></script>
<script>
    function redflag(){
        let flag = document.getElementById('flag');
        flag.style.color = '#07032b';

        setTimeout(function () {
            flag.style.color = "#ad2d45";
        }, 1000)
    }

    setInterval(redflag,2000);
    redflag();
</script>
</body>
</html>