<?php
// website services
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
    <link href="css/webdev.css" rel="stylesheet">
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
    <title>KoliTECH - Web Development</title>
</head>
<body >
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

<div class="content" id="content" style="height: 380vh;">
    <div class="wb-row">
        <h2 class="wb-title">Website Development Services</h2>
        <p class="wb-description"> Our website solutions power mature businesses in Healthcare, Telecommunications, Banking and Finance, Retail, Manufacturing, Education and other industries.</p>
        <img src="img/wb-img.png" class="wb-img-0">
        <br><br>
        <hr>
    </div>
    <div class="wb-row-0">
        <h2 class="wb-sub-title">Website Development From A To Z</h2>
        <p class="wb-sub-title-description">Keeping abreast of the evolving web technologies, we have been continuously shaping our services to meet the growing demand for fast, secure and interactive websites:</p>
        <div class="wb-row-div-0">
            <p class="wb-sub"><strong>Full-cycle website design and development</strong></p>
            <p class="wb-paragraph">Creating a website from scratch, including requirements gathering, design, implementation, quality assurance as well as maintenance and support.</p>
            <img src="img/cycle.png" class="wb-img-1" style="width: 7vw; margin: 2vh;">
        </div>
        <div class="wb-row-div-1">
            <p class="wb-sub"><strong>Redesign</strong></p>
            <p class="wb-paragraph">Porting your legacy website, including all the data, to a new, modern solution (it can be another content management system) with a slick and responsive user interface.</p>
            <img src="img/redesign.png" class="wb-img-1" style="width: 7vw; margin: 2vh;">
        </div>
        <div class="wb-row-div-2">
            <p class="wb-sub"><strong>Web application development and integration</strong></p>
            <p class="wb-paragraph">Enriching your website with out-of-the-box and custom social networking apps, payment solutions, advanced analytics and other tools to increase user engagement.</p>
            <img src="img/web-integration.png" class="wb-img-1" style="width: 7vw; margin: 2vh;">

        </div>
        <div class="wb-row-div-3">
            <p class="wb-sub"><strong>Migration to cloud</strong></p>
            <p class="wb-paragraph">Moving your existing website and applications to Amazon Web Services (AWS), Microsoft Azure, Google Cloud Platform and other cloud services to improve scalability and administration and lessen costs</p>
            <img src="img/migration-to-cloud.png" class="wb-img-1" style="width: 8vw; margin: 2vh;">
        </div>
        <hr style="position: relative; top: 10vh;" >
    </div>
    <div class="wb-row-1">
        <h2 class="wb-sub-title">Websites Across Boundaries</h2>
        <p class="wb-sub-title-description">We bring in technological excellence to create websites that achieve various business goals:</p>
        <div class="wb-container">
            <div class="wb-box">
                <center><img src="img/e-commerce.png" class="wb-img-1" style="width: 8vw;position: relative;top: 2vh;"></center>
                <center><p class="wb-row-sub" style="position: relative; top: 3vh; font-family: Ubuntu-Med, sans-serif; font-size: 2.5vh;">E-Commerce<br>Solutions</p> </center>
            </div>
            <div class="wb-box">
                <center><img src="img/media.png" class="wb-img-1" style="width: 6vw;position: relative;top: 2vh;"></center>
                <center><p class="wb-row-sub" style="position: relative; top: 2vh; font-family: Ubuntu-Med, sans-serif; font-size: 2.5vh;">Entertainment, news<br>and media websites</p> </center>
            </div>
            <div class="wb-box">
                <center><img src="img/educ.png" class="wb-img-1" style="width: 6vw;position: relative;top: 2vh;"></center>
                <center><p class="wb-row-sub" style="position: relative; top: 2vh; font-family: Ubuntu-Med, sans-serif; font-size: 2.5vh;">Education<br>websites</p> </center>
            </div>
            <div class="wb-box">
                <center><img src="img/corporate.png" class="wb-img-1" style="width: 6vw;position: relative;top: 2vh;"></center>
                <center><p class="wb-row-sub" style="position: relative; top: 2vh; font-family: Ubuntu-Med, sans-serif; font-size: 2.5vh;">Corporate<br>web portals</p> </center>
            </div>
        </div>
        <hr style="position: relative; top: 7vh;">
    </div>
    <div class="wb-row-3">
        <h2 class="wb-sub-title">Technologies We Use</h2>
        <div class="wb-div-container">
            <div class="wb-data-side-nav" id="big-data-side-nav">
                <button id="front-end" class="btn actib">FRONT END</button>
                <button id="back-end" class="btn">BACK END</button>
                <button  id="databases" class="btn">DATABASES OR DATA STORAGE</button>
                <button  id="cloud" class="btn">CLOUD</button>
            </div>
            <div class="wb-side-contents" id="wb-data-side-contents">
                <div  style="display: flex; position: relative;top: 2vh; left: 5vw;" id="one" class="one">
                    <p class="sub-title"><b>Front End</b></p>
                    <div class="line-line"></div>
                    <br> <br>
                    <div class="img-div-1">
                      <center><img src="img/html5.png" class="img-1"></center>
                    </div>
                    <div class="img-div-2">
                        <center><img src="img/css3.png" class="img-2"></center>
                    </div>
                    <div class="img-div-3">
                        <center><img src="img/js.png" class="img-3"></center>

                    </div>

                </div>

                <div  style="display:none;position: relative;top: 2vh; left: 5vw;" id="two" class="two">
                    <p class="sub-title"><b>Back End</b></p>
                    <div class="line-line"></div>
                    <br> <br>
                    <div class="img-div-1">
                        <img src="img/python.png" class="img-4">
                    </div>
                    <div class="img-div-2">
                        <center>
                            <img src="img/php.png" class="img-5">
                        </center>

                    </div>
                    <div class="img-div-3">
                        <center>
                            <img src="img/c++.png" class="img-6">
                        </center>
                    </div>
                    <div class="img-div-4">
                        <center>
                            <img src="img/java.png" class="img-7">
                        </center>

                    </div>

                </div>

                <div  style="display:none;position: relative;top: 2vh; left: 5vw;" id="three" class="three">
                    <p class="sub-title"><b>Databases or Data Storage</b></p>
                    <div class="line-line"></div>
                    <br> <br>
                    <div class="img-div-1">
                        <img src="img/google-cloud.png" class="img-8">
                    </div>
                </div>

                <div  style="display: none;position: relative;top: 2vh; left: 5vw;" id="four" class="four">
                    <p class="sub-title"><b>Clouds</b></p>
                    <div class="line-line"></div>
                    <br> <br>
                    <p class="sub-title-p">SQL</p>
                    <div class="img-div-5">
                        <img src="img/mysql.png" class="img-9">
                    </div>
                    <div class="img-div-6">
                        <center>
                            <img src="img/sql-server.png" class="img-10">
                        </center>

                    </div>
                    <br>
                    <p class="sub-title-p-1">NO SQL</p>
                    <div class="img-div-7">
                        <center>
                            <img src="img/mongoDB.png" class="img-11">
                        </center>

                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="wb-row-4">
        <p class="find-contact">Build a Website that is Easy for Users and Effective for Business</p><input type="submit" name="okay" class="contact-btn" onclick="document.location.href='contact-us.php?origin=signIn&&from=web-dev'" value="CONTACT US">
        <p class="slogan-again">KoliTECH’s team is ready to deliver the solution to help your leverage streamlined, transparent and consistent web communication with your clients, partners, employees, or community.</p>
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
    color: #00061a;"><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y'); ?> All rights reserved by koliTech.co</p>
    <p class="sample-website" style="font-size: 1.45vh; font-family: Montserrat, sans-serif;text-align: center;">KoliTech.co is a sample website for school purposes.</p>

</div>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.3/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    $(document).on('click', 'button',function (){
        $(this).addClass('actib').siblings().removeClass('actib');
    });

    //current for web-dev
    var fe = document.getElementById('front-end');
    var be = document.getElementById('back-end');
    var db = document.getElementById('databases');
    var cl = document.getElementById('cloud');

    fe.addEventListener('click',function (){


        document.getElementById('one').style.display = 'flex';
        document.getElementById('two').style.display = 'none';
        document.getElementById('three').style.display = 'none';
        document.getElementById('four').style.display = 'none';
    });
    be.addEventListener('click',function (){

        document.getElementById('one').style.display = 'none';
        document.getElementById('two').style.display = 'flex';
        document.getElementById('three').style.display = 'none';
        document.getElementById('four').style.display = 'none';
    });
    db.addEventListener('click',function (){

        document.getElementById('one').style.display = 'none';
        document.getElementById('two').style.display = 'none';
        document.getElementById('three').style.display = 'flex';
        document.getElementById('four').style.display = 'none';
    });
    cl.addEventListener('click',function (){

        document.getElementById('one').style.display = 'none';
        document.getElementById('two').style.display = 'none';
        document.getElementById('three').style.display = 'none';
        document.getElementById('four').style.display = 'flex';
    });
</script>
<script>
    AOS.init();

</script>
</body>
</html>


