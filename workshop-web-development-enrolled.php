<?php
// this page is inaccessible to non users unless they sign up or sign in
// this is the intro page for web development workshop
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/workshop-web-basics.css" rel="stylesheet">
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
    <title>Web Development</title>
</head>
<body>
<?php
error_reporting(0);
session_start();
$message = " ";
$logout= " ";
$account_logo = " ";
$account_name = " ";
$div ="";
// this if statement is about when the user tried to run this without signing in, the page will eventually redirect to the index.php
//if (!isset($_SESSION['userID'])){
//    require('config.php');
//    header('location: index.php');
//    exit();
//}
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
        $account_name = '<i style="font-size:4vh" class="fas">	&#xf2bd;</i><p style="top: -2.5vh;" class="name">'.$name.'</p>';
    }

}
else{
    $message='<p class="error">who are you?</p>';
}


?>
        <div class="head">
            <a href="dashboard.php?origin=signIn" class="logo">koliTECH</a>
            <?php
            echo $account_logo;
            echo $account_name;
            echo $div;
            echo $logout;
            echo $message;
            ?>
        </div>
        <div class="content">
            <div class="row-0">
                <h2 class="workshop-title">Web Development is Fun</h2>
                <br>
                <hr style="width: 100%">
            </div>
            <div class="row-1">
                <h2 class="workshop-sub-title">Front End Development</h2>
                <div class="row-1-container">
                    <div onclick="document.location.href='workshop-hello-world-html.php?origin=signIn'" class="row-1-box">
                        <center><img src="img/html5.png" class="img-1"></center>
                    </div>
                    <div onclick="document.location.href='workshop-background-color-css.php?origin=signIn'" class="row-1-box">
                        <center><img src="img/css3.png" class="img-2"></center>
                    </div>
                    <div onclick="document.location.href='workshop-alert-prompt-js.php?origin=signIn'" class="row-1-box" style="height: 47vh;width: 27vw;">
                        <center><img src="img/js.png" class="img-1"></center>
                    </div>
                </div>
                <br><br>
                <hr>
            </div>
            <div class="row-2">
                <h2 class="workshop-sub-title">Back End Development</h2>
                <div  class="row-1-container">
                    <div id="click" class="row-1-box">
                        <center><img src="img/php.png" class="img-3"></center>
                    </div>
                </div>

            </div>
            <hr style="position:relative;top: 155vh;width: 83vw; left: 6.5vw;">
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

        <div class="footer">
            <br> <br> <br>
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
<script>
    var openModal = document.querySelector('#click');
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
