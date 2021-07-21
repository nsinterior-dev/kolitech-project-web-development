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
    <link href="css/it-services.css" rel="stylesheet">
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
    <title>KoliTECH - IT Services</title>
</head>
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
<body>
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

<div class="content" id="content" style="height: 190vh;">
    <div class="img-of-it-services">
        <img src="img/managed-it-solutions.jpeg" class="it-services-img" >
        <h2 class="slogan-0">providing solutions by</h2>
        <h2 class="slogan-1">KoliTECH's Services</h2>

    </div>
    <div class="divider" ></div>
    <div class="our-services-div">
        <h3 class="our-services-text" data-aos="fade-right" data-aos-duration="800" data-aos-delay="100" >Our Services</h3>
        <p class="our-services-paragraph" data-aos="fade-left" data-aos-duration="800" data-aos-delay="100">Simple Solutions for Complex Connections</p>
    </div>
   <div id="flexbox" data-aos="fade-in" data-aos-duration="200" data-aos-delay="0"   class="flexbox-container">

       <div id="service-box-1" class="services-box">
          <center><img src="img/icons8-windows-client-48.png" class="services-box-img-1"></center>
          <h5 class="services-box-text-1">Window<br> Applications</h5>
           <p class="services-box-text-p-1">We design and develop a variety of applications for windows including specialized and custom software.</p>
          <center> <input type="button" onclick="document.location.href='desktop-applications.php?origin=signIn'" value="VIEW DETAILS" class="view-details-btn"></center>
       </div>
       <div  id="service-box-2" class="services-box">
           <center><img src="img/ui-ux.png" class="services-box-img-2"></center>
           <h5 class="services-box-text-2">UI & UX <br>Design</h5>
           <p class="services-box-text-p-2">KoliTECH provides top-notch database management solutions for small and medium businesses.</p>
           <center> <input type="button" onclick="document.location.href='web-development.php?origin=signIn'" value="VIEW DETAILS" class="view-details-btn"></center>
       </div>
       <div  id="service-box-3" class="services-box">
           <center><img src="img/qa-test.png" class="services-box-img-3"></center>
           <h5 class="services-box-text-3">QA & <br>Testing</h5>
           <p class="services-box-text-p-3">Our team of UX designers creates easy-to-understand interfaces for all kinds of applications.</p>
           <center> <input type="button" onclick="document.location.href='cybersecurity.php?origin=signIn'" value="VIEW DETAILS" class="view-details-btn"></center>
       </div>
       <div  id="service-box-4" class="services-box">
           <center><img src="img/android-app.png" class="services-box-img-4"></center>
           <h5 class="services-box-text-4">Android<br>Application</h5>
           <p class="services-box-text-p-4">We pay a lot of attention in QA and testing procedures to ensure the best quality of our software.</p>
           <center> <button id="open" value="VIEW DETAILS" class="view-details-btn">VIEW DETAILS</button></center>
       </div>

       <div  id="service-box-5" class="services-box">
           <center><img src="img/database-management.png" class="services-box-img-5"></center>
           <h5 class="services-box-text-5">Database<br>Management</h5>
           <p class="services-box-text-p-5">Our Android apps are highly rated by media and our users as they offer great features on all Android devices.</p>
           <center> <input type="button" onclick="document.location.href='bigdata.php?origin=signIn'" value="VIEW DETAILS" class="view-details-btn"></center>
       </div>


   </div>


    <div class="modal" id="modal">
        <div class="modal-header">
            <div class="head-title">
                Hi there!
            </div>
            <button id="closebtn" class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <p class="text">
                Sorry, this is not available right now.
            </p>
            <img src="img/sad.png" class="sad">
        </div>
    </div>
    <div id="overlay"></div>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.3/aos.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();

    var openModal = document.querySelector('#open');
    var closeModal = document.querySelector('#closebtn');
    var modal = document.querySelector('#modal');
    var overlay = document.getElementById('overlay');

   openModal.addEventListener('click',function (){
        modal.classList.add('active');
        overlay.classList.add('active');
   })
    closeModal.addEventListener('click',function (){
        modal.classList.remove('active');
        overlay.classList.remove('active');
    })
    overlay.addEventListener('click',function (){
        modal.classList.remove('active');
        overlay.classList.remove('active');
    })

</script>
</body>
</html>

