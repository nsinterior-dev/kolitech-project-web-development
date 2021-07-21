
<!DOCTYPE html>
<html lang="en">
<head>

    <link href="css/HomepageDesign.css"  rel="stylesheet">
    <link href="css/IT-Consul.css" rel="stylesheet">
    <link href="css/dashboard.css"  rel="stylesheet">
    <link href="css/it-service-management.css"  rel="stylesheet">
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
    <title>KoliTECH - IT Service Management</title>
</head>
<style>
    .content{
        height:250vh ;
    }
    .service-management{
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
                <a class="svg-text-active" href="d<?php if (isset($_SESSION['userID'])){ require('config.php'); echo 'dashboard.php?origin=signIn';}else{ echo 'index.php'; }?>">
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
        <h2 class="IT-C">IT Service Management Consultation</h2>
        <img src="img/it-service-management.png" style="width: 60vw;">
        <p class="dess">KoliTECH offers a wide range of ITSM consulting and implementation services for businesses of any size and industry. We help companies tune their IT processes in line with their business’ wants and needs.</p>
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
    <div class="itsm-row-0">
        <h2 class="approach">Challenges We Solve</h2>
        <p class="dess">Companies may face plentiful ITSM-related challenges. They can be general or specific. But regardless of that, we can help you tackle any of them, for instance:</p>
        <div class="itsm-row-div-0">
                <img src="img/itsm1.png" class="itsm-1">
            <p class="itsm-sub"><strong>Inefficiency of IT support across distributed business units</strong></p>
            <p class="itsm-paragraph">Giving a single view on the IT processes and infrastructure, an ITSM solution will speed up IT support processes across a distributed IT environment.</p>
        </div>
        <div class="itsm-row-div-1">
            <img src="img/itsm2.png" class="itsm-2">
            <p class="itsm-sub"><strong>Inability to assess IT employees’ performance</strong></p>
            <p class="itsm-paragraph">We can help you exploit IT employee performance information to measure KPIs for IT employees, assignment groups and regional units. It’ll make it easier to visualize performance trends and react to them.
            </p>
        </div>
        <div class="itsm-row-div-2">
            <img src="img/itsm3.png" class="itsm-1">
            <p class="itsm-sub"><strong>Disorganization of Financial management for IT services</strong></p>
            <p class="itsm-paragraph">With Financial Management functionality integrated into your ITSM solution, you can gain visibility into IT service costs, make the sources of IT costs evident, and reveal whether they stay within budget.</p>
        </div>
        <div class="itsm-row-div-3">
            <img src="img/itsm4.png" class="itsm-3">
            <p class="itsm-sub"><strong>Complexity of monitoring vendors’ performance</strong></p>
            <p class="itsm-paragraph">KoliTECH’s team can configure a vendor assessment functionality to make vendor evaluation and ranking easy, convenient and compliant with your company’s workflows. This way, you can benefit from a better monitoring and ensure a high quality of IT services you deliver to users.</p>
        </div>
        <hr style="position: relative; top: 8vh;">
    </div>
    <br><br>
    <div class="itsm-row-1">
        <h2 class="solutions-all">Reach Out</h2>
        <hr style="width: 25%;margin: 1vh;">
        <p class="basta" style="margin: 2vh; text-align: justify; font-family: Montserrat, sans-serif; color: #112F4D;">Do you want to solve your ITSM issues? Hit the Contact us button to get a free initial consultation. We’re always ready to talk business.</p>
        <input type="button" name="okay" onclick="document.location.href='contact-us.php?origin=signIn&&from=contact-us-reach-out'" class="advise-btn" value="CONTACT US">
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