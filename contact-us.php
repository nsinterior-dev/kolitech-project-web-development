
<!DOCTYPE html>
<html lang="en">
<head>

    <link href="css/HomepageDesign.css"  rel="stylesheet">
    <link href="css/dashboard.css"  rel="stylesheet">
    <link href="css/contact-us.css"  rel="stylesheet">
    <link href="css/mobile.css" media="screen and (max-width: 530px)"   rel="stylesheet">
    <link href="css/tablet.css" media="screen and (max-width: 768px)"  rel="stylesheet">
    <link href="css/small-screen.css" media="screen and (max-width: 1024px)"  rel="stylesheet">
    <link href="css/average.css" media="screen and (max-width: 1200px)"  rel="stylesheet">
    <link href="css/bigscreen.css" media="screen and (max-width: 1500 px)"  rel="stylesheet">
    <link rel="apple-touch-icon" sizes="150x150" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta   content="width=device-width, initial-scale=1.0, minimum-scales=1.0" charset="UTF-8" name="viewport"/>
    <title>Contact Us</title>
</head>
<style>
    .content{
        height:100vh ;
    }
</style>
<body style="height: 150vh;">
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
<?php
        $title = " ";
        $paragraph = "";
        if ($_GET['from']=='strategy-consulting'){
            $title = 'Remove IT Performance Blocks';
            $paragraph = "Better sound through research.";
        }
        elseif ($_GET['from']=='project-consulting'){
            $title = 'Consulting for Smooth Solution Implementation';
            $paragraph = "Creating value through true convergence.";
        }
        elseif ($_GET['from']=='technology-consulting'){
            $title ='Use Technology to the Full';
            $paragraph = "Computers help people help people.";
        }
        elseif ($_GET['from']=='advise-me-bigData'){
            $title = 'LET’S GIVE MEANING TO YOUR DATA';
            $paragraph = "Empowered by Innovation.";
        }
        elseif ($_GET['from']=='contact-get-customer-understanding'){
            $title = 'Customer Analytics';
            $paragraph = "Building Networks for People.";
        }
        elseif ($_GET['from']=='contact-get-operations-under-control'){
            $title ='Operational Analytics';
            $paragraph = "In Touch with Tomorrow.";
        }
        elseif ($_GET['from']=='cyber-security'){
            $title ='Start Your Way to Digital Success';
            $paragraph = "In a World of Technology, People Make the Difference.";
        }
        elseif ($_GET['from']=='contact-us-reach-out'){
            $title = 'Start Your Way to Digital Success';
            $paragraph = "It Does More. It Costs Less. It’s That Simple.";
        }
        elseif ($_GET['from']=='pmConsulting'){
            $title ='Ensure Consistent and Efficient Project Flow';
            $paragraph = "Soon there will be 2 kinds of people. Those who use computers, and those who use Apples.";
        }
        elseif ($_GET['from']=='pmConsultlead'){
            $title ='Bring In Efficient Management to Your Project';
            $paragraph = "Your Vision, Our Future.";
        }
        elseif ($_GET['from']=='desktop-applications'){
            $title ='You’ve got questions, we’ve got answers.';
            $paragraph = "People Making Technology Work.";
        }
        elseif ($_GET['from']=='web-dev'){
            $title ='In a World of Technology, People Make the Difference.';
            $paragraph = "Empowering the Internet generation.";
        }
        else{
            $title = 'test';
            $paragraph = "another one";
        }
?>
<div class="content" id="content">
    <div class="row">
        <h2 class="title" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200"><?php echo $title; ?></h2>
        <br>
        <p class="pangungusap" data-aos="fade-right" data-aos-duration="800" data-aos-delay="200"><?php echo $paragraph; ?></p>
        <br>
        <hr style="width: 25%; color: #112F4D;">
        <br>
             <form action="<?php if ($_GET['origin']=='signIn' && isset($_SESSION['userID'])){echo 'file.php?origin=signIn';}else{echo 'file.php';}?>" method="post" class="contact-form" data-aos="fade-in" data-aos-duration="800" data-aos-delay="200">
            <p class="panuto">Please outline briefly business challenges you need to address, and we’ll follow up within 30 minutes to schedule an initial discussion of how our collaboration can unfold.</p>
            <input type="text" id="name" placeholder="Full Name" class="full-name" name="name">
            <input type="text" id="company" placeholder="Company" class="company-name" name="company">
            <input type="email" id="email" placeholder="Work Email" class="work-email" name="email">
            <br>
            <textarea class="textarea" style="resize: none;" placeholder="How can we help you?" name="message"></textarea>
            <div class="upload-file">
                <label for="file-icon">
                    <i class="fa fa-paperclip" style="font-size: 3vh;" aria-hidden="true"></i>
                   tap here to upload a file
                </label>
                <input type="file" id="file-icon" name="file">
            </div>
            <input type="submit" class="requestbtn" name="submit" value="REQUEST CONSULTING">
        </form>


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
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();


</script>
</body>
</html>
