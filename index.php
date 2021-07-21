<?php
    session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/HomepageDesign.css"  rel="stylesheet">
    <link href="css/index.css"  rel="stylesheet">
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
<body style="height: 100vh;">

        <div class="headie">

            <div class="head">
                <section class="section-one">
                    <a href="index.php" class="logo-active">
                        <h1 class="logo">koliTECH</h1>
                    </a>
                </section>
                <a href="sign-up.php" class="sign-up-active">
                    <svg class="button-svg-one">
                        <rect class="button-svg-one-rect" ></rect>
                    </svg>
                    SIGN UP
                </a>
                <a href="sign-in.php" class="sign-in-active">
                    <svg class="button-svg-one">
                        <rect class="button-svg-two-rect"></rect>
                    </svg>
                    SIGN IN
                </a>
                <div class="line"></div>
            </div>
            <br>


            <div class="border-one">

                    <center>
                        <svg class="svg-1" height="2vh" width="5vh" >
                            <a class="svg-text-active" href="index.php">
                                <text class="svg-text-1" x="0vh" y="0vh"  fill="transparent" text-anchor="middle" >koliTECH</text>

                            </a>
                        </svg>
                    </center>
                <div class="company-div">
                    <a href="#" class="company">COMPANY </a>
                    <div class="company-div-items">
                        <a href="about-us.php" class="company-items">About Us</a>
                        <a href="faqs.php" class="company-items">FAQs</a>
                    </div>
                </div>
                <div class="services-div">
                    <a href="#" class="services">SERVICES </a>
                    <div class="services-div-items">
                        <a href="it-services.php" class="services-items">IT Services</a>
                        <a href="it-consultation-user.php" class="services-items">IT Consultation</a>
                        <a href="web-development.php" class="services-items">Web Development</a>
                    </div>
                </div>
                <div class="projects-div">
                    <a href="#" class="projects">WORKSHOP </a>
                    <div class="projects-div-items">
                        <a href="workshop-web-development.php" class="projects-items">Web Development</a>
                        <a href="workshop-basic-programming.php" class="projects-items">Basic Programming</a>
                        <a href="workshop-data-science.php" class="projects-items">Data Science</a>
                    </div>
                </div>




            </div>




        </div>

        <div class="content" id="content" style="height: 120vh;">
            <h2 class="index-title-1">Want to start and launch a fully operational website?</h2>
            <p class="index-description-1">Ask for assistance from our team of developers and professionals. We offer consultations to guide our clients and give <br>solutions to problems they cannot solve alone.</p>
            <h2  class="index-title-2">Want to create an app based on your imaginations?</h2>
            <p class="index-description-2">The KoliTech Company is composed of personally handpicked professionals that can make anything impossible, POSSIBLE! <br>'Your wish is OUR command' and we are more than happy to comply!</p>
            <h2  class="index-title-3">Want to learn how to make all of your brilliant ideas come to life?</h2>
            <p class="index-description-3">Not only does our company offer development of websites and apps, we also strive to teach future developers by giving them <br>crash courses that they would need for the industry!</p>

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
