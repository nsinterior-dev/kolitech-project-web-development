
<!DOCTYPE html>
<html lang="en">
<head>

    <link href="css/HomepageDesign.css"  rel="stylesheet">
    <link href="css/IT-Consul.css" rel="stylesheet">
    <link href="css/dashboard.css"  rel="stylesheet">
    <link href="css/it-consult-sub.css"  rel="stylesheet">
    <link href="css/mobile.css" media="screen and (max-width: 530px)"   rel="stylesheet">
    <link href="css/mobile-big-data.css" media="screen and (max-width: 530px)"   rel="stylesheet">
    <link href="css/tablet.css" media="screen and (max-width: 768px)"  rel="stylesheet">
    <link href="css/tablet-big-data.css" media="screen and (max-width: 768px)"  rel="stylesheet">
    <link href="css/small-screen.css" media="screen and (max-width: 1024px)"  rel="stylesheet">
    <link href="css/small-screen-big-data.css" media="screen and (max-width: 1024px)"  rel="stylesheet">
    <link href="css/average.css" media="screen and (max-width: 1200px)"  rel="stylesheet">
    <link href="css/average-big-data.css" media="screen and (max-width: 1200px)"  rel="stylesheet">
    <link href="css/bigscreen.css" media="screen and (max-width: 1500 px)"  rel="stylesheet">
    <link rel="apple-touch-icon" sizes="150x150" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta   content="width=device-width, initial-scale=1.0, minimum-scales=1.0" charset="UTF-8" name="viewport"/>
    <title>KoliTECH - Big Data Services</title>
</head>
<style>
    .content{
        height:320vh ;
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
        <h2 class="IT-C">Big Data Consulting Services</h2>
        <p class="description">Big data consultation investigates large information and uncover concealed examples, obscure connections, and other significant bits of knowledge.</p>
        <br>
        <img src="img/bigdata.png" class="big-data-img">
        <p class="des1" href="#" >..................................................................</p>
        <hr>
    </div>
    <div class="consult-container">
        <a class="des" id="des" href="<?php if (isset($_SESSION['userID'])){echo 'it-consultation-user.php?origin=signIn';}else{echo 'it-consultation-user.php';} ?>"><h3 class="identity">IT Consultation</h3>
            <br></a>

        <a href="<?php if (isset($_SESSION['userID'])){echo 'bigdata.php?origin=signIn';}else{echo 'bigdata.php';} ?>" id="bigData" class="big-data active">Big Data</a>
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
    <div class="big-data-row">
        <h2 class="solutions-all">Solutions for All Industries</h2>
        <div class="big-data-div-container-1">
            <div class="png-div">
                <img src="img/customer-analytics.png" class="png-0">
            </div>
            <h3 class="customer-analytics"><b>Customer Analytics</b></h3>
            <ul class="first-list">
                <li class="first-list-one"><p>Customer segmentation, customer models.</p></li>
                <li class="first-list-one"><p>Prediction of buying behavior, risks and churn.</p></li>
            </ul>
            <a href="contact-us.php?from=contact-get-customer-understanding" class="get-this">Get Customer Understanding &nbsp;<i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="big-data-div-container-2">
            <div class="png-div-1">
                <img src="img/operational.png" class="png-1">
            </div>
            <h3 class="operational-analytics"><b>Operational Analytics</b></h3>
            <ul class="first-list">
                <li class="first-list-one"><p>Benchmarking.</p></li>
                <li class="first-list-one"><p>Deviations and undesirable patterns detection.</p></li>
                <li class="first-list-one"><p>Cause-effect analysis, bottleneck recognition.</p></li>
            </ul>
            <a href="contact-us.php?from=contact-get-operations-under-control" class="get-this">Get Operations Under Contol &nbsp;<i class="fa fa-arrow-right"></i></a>
        </div>

    </div>
    <div class="big-data-row-1">
        <h2 class="solutions-all">Build your Big Data Solution Fast and Easy</h2>
        <hr style="width: 25%;margin: 1vh;">
        <p class="basta" style="margin: 2vh; text-align: justify; font-family: Montserrat, sans-serif; color: #112F4D;">KoliTECH is prepared to help you assemble an ideal enormous information arrangement inside time and spending plan for your dynamic interaction to be founded on realities, not hunch.</p>
        <input type="submit" name="okay" class="advise-btn" onclick="document.location.href='contact-us.php?origin=signIn&&from=advise-me-bigData'" value="ADVISE ME ON BIG DATA">

    </div>
    <div class="big-data-row-2">
        <h2 class="solutions-all">Technical Components of a Big Data we cover</h2>
        <div class="big-data-div-container-3">
            <img src="img/data-visual.png" class="img-11">
            <p class="data"><b>Data Visualization</b></p>
        </div>
        <div class="big-data-div-container-4">
            <img src="img/data-security.png" class="img-12">
            <p class="data-1"><b>Data Security</b></p>
        </div>
        <div class="big-data-div-container-5">
            <img src="img/data-warehouse.png" class="img-11">
            <p class="data"><b>Data Warehouse</b></p>
        </div>
        <div class="big-data-div-container-6">
            <img src="img/olap-cube.png" class="img-13">
            <p class="data-1"><b>OLAP Cubes</b></p>
        </div>
        <br><br><br><br> <br> <br> <br> <br>
        <hr class="hr-big">
    </div>
    <div class="big-data-row-3">
        <h2 class="solutions-all">Technologies We Use</h2>
        <div class="big-data-div-container-7">
            <div class="big-data-side-nav" id="big-data-side-nav">
                <button id="data-management" class="btn actib">Data Management</button>
                <button id="database-management" class="btn">Database Management</button>
                <button  id="machine-learning" class="btn">Machine Learning</button>
                <button  id="programming" class="btn">Programming Languages</button>
            </div>
            <div class="big-data-side-contents" id="big-data-side-contents">
                <div  style="display: flex; position: relative;top: 2vh; left: 5vw;" id="one" class="one">
                    <p class="sub-title"><b>Data Management</b></p>
                    <div class="line-line"></div>
                    <br> <br>
                    <div class="img-div-1">
                        <img src="img/informatica.png" class="img-1">
                    </div>
                    <div class="img-div-2">
                        <img src="img/hadoop.png" class="img-2">
                    </div>


                </div>

                <div  style="display:none;position: relative;top: 2vh; left: 5vw;" id="two" class="two">
                    <p class="sub-title"><b>Database Management</b></p>
                    <div class="line-line"></div>
                    <br> <br>
                    <div class="img-div-1">
                        <img src="img/phpmyadmin.png" class="img-3">
                    </div>
                    <div class="img-div-2">
                        <img src="img/mongoDB.png" class="img-4">
                    </div>

                </div>

                <div  style="display:none;position: relative;top: 2vh; left: 5vw;" id="three" class="three">
                    <p class="sub-title"><b>Machine Learning</b></p>
                    <div class="line-line"></div>
                    <br> <br>
                    <div class="img-div-1">
                        <img src="img/matlab.png" class="img-5">
                    </div>
                    <div class="img-div-2">
                        <img src="img/azure-ml.png" class="img-6">
                    </div>
                </div>

                <div  style="display: none;position: relative;top: 2vh; left: 5vw;" id="four" class="four">
                    <p class="sub-title"><b>Programming Languages</b></p>
                    <div class="line-line"></div>
                    <br> <br>
                    <div class="img-div-1">
                        <img src="img/c++.png" class="img-7">
                    </div>
                    <div class="img-div-2">
                        <img src="img/java.png" class="img-8">
                    </div>
                    <div class="img-div-3">
                        <img src="img/mysql.png" class="img-9">
                    </div>
                    <div class="img-div-4">
                        <img src="img/python.png" class="img-10">
                    </div>
                </div>

            </div>

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


<script src="scripts/Script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    $(document).on('click', 'button',function (){
        $(this).addClass('actib').siblings().removeClass('actib');
    });


        </script>
</body>
</html>