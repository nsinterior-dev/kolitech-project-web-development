<?php
// this page is for basic programming under workshop
// this page has the ff.
// title of workshop
// introduction-description
// intended learning outcomes
// a video about basic programming
// and a button linking to basic programming enroll
// this page is accessible by non-user and user
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link href="css/HomepageDesign.css"  rel="stylesheet">
    <link href="css/dashboard.css"  rel="stylesheet">
    <link href="css/workshow-basic-programming.css"  rel="stylesheet">
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
    <title>Workshop - Basic Programming</title>
</head>
<style>
    .content{
        height:120vh ;
    }
</style>
<body style="height: 120vh;">
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
        <h2 class="workshop-basic-programming-title">Basic Programming</h2>
        <hr>
    </div>
    <div class="row-1-col-1">
        <div class="insight">
            <p class="insight-paragraph">
                We assume you are well aware of English Language, which is a well-known Human Interface Language. English has a predefined grammar, which needs to be followed to write English statements in a correct way. Likewise, most of the Human Interface Languages (Hindi, English, Spanish, French, etc.) are made of several elements like verbs, nouns, adjectives, adverbs, propositions, and conjunctions, etc.

            </p>

            <p class="insight-paragraph">
                Similar to Human Interface Languages, Computer Programming Languages are also made of several elements.
            </p>
        </div>
        <div class="ILO">
            <h5 class="ILO-title">
                Intended Learning Outcomes:
            </h5>
            <ul class="workshop-basic-prog-ilo-list">
                <li>
                    Programming is about writing the instructions which a computer follows to enable it to store knowledge, process knowledge, and communicate knowledge with the outside world. Stemming from storing knowledge we can move into data structures and databases.
                </li>
                <li>Learn the languages: C and C++</li>
                <li>Demonstrate proficiency in problem-solving techniques using the computer.</li>
                <li>Demonstrate proficiency in at least two high-level programming languages and two operating systems.</li>
                <li>Demonstrate proficiency in the analysis of complex problems and the synthesis of solutions to those problems.</li>

            </ul>
        </div>
        <div class="enroll-now">
            <button class="enroll-now-btn" id="enroll-btn">Learn the basics of programming</button>
        </div>
    </div>
    <div class="row-1-col-2">
        <video style="position: relative; top: -8vh;border: none; outline: none;" height="420" width="560" controls>
            <source src="video/mobdev.mp4" type="video/mp4">
        </video>
    </div>
    <div class="modal" id="modal">
        <div class="modal-header">
            <div class="head-title">
                I'm Sorry
            </div>
            <button id="closebtn" class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <p class="text">
                This course is not yet available right now.
            </p>
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
    color: #00061a;"><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y'); ?> All rights reserved by koliTECH.net</p>
    <p class="sample-website" style="font-size: 1.45vh; font-family: Montserrat, sans-serif;text-align: center;">KoliTECH.net is a sample website for school purposes.</p>

</div>

<script src="scripts/Script.js">

</script>
<script>
    var openModal = document.querySelector('#enroll-btn');
    var closeModal = document.querySelector('#closebtn');
    var no_btn = document.querySelector('#no');
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
    no_btn.addEventListener('click',function (){
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
