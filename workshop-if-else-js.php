<?php
// this page is inaccessible to non users unless they sign up or sign in
// this is the intro page for web development workshop
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/workshop-web-basics.css" rel="stylesheet">
    <link href="css/html.css" rel="stylesheet">
    <link href="css/mobile.css" media="screen and (max-width: 530px)"   rel="stylesheet">
    <link href="css/tablet.css" media="screen and (max-width: 768px)"  rel="stylesheet">
    <link href="css/small-screen.css" media="screen and (max-width: 1024px)"  rel="stylesheet">
    <link href="css/average.css" media="screen and (max-width: 1200px)"  rel="stylesheet">
    <link href="css/bigscreen.css" media="screen and (max-width: 1500 px)"  rel="stylesheet">
    <link rel="apple-touch-icon" sizes="150x150" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="codemirror-5.59.4/lib/codemirror.css">
    <link href="codemirror-5.59.4/theme/midnight.css" rel="stylesheet">
    <script src="codemirror-5.59.4/"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta   content="width=device-width, initial-scale=1.0, minimum-scales=1.0" charset="UTF-8" name="viewport"/>
    <title>Basic JS</title>
</head>
<style>
    .CodeMirror {
        border: none;
        height: auto;
    }
    .CodeMirror-line span{
        font-size: 2vh;
    }
    .CodeMirror-linenumber{
        font-size: 2vh;
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
<div class="page-wrapper">
    <div class="box">
        <div class="instructions-wrapper" style="overflow-y: hidden; scroll-behavior: unset;">
            <div class="breadcrumbs">
                <p class="breadcrumbs-title">Basic JS</p>
            </div>
            <div class="instructions-title">
                <p class="instructions-title-p">Using If Else</p>
            </div>
            <div class="instructions-paragraph" style="height: 52vh;">
                <p class="instruction-line">If Else in JavaScript</p>
                <p class="instruction-line">
                    Conditional statements are used to perform different actions based on different conditions.</code>;
                </p>
                <p class="instruction-line">Conditional Statements
                </p>
                <p class="instruction-line">In JavaScript we have the following conditional statements:
                </p>
                <p class="instruction-line">
                    Use <code>if</code>to specify a block of code to be executed, if a specified condition is true
                </p>
                <p class="instruction-line">
                    Use <code>else</code>to specify a block of code to be executed, if the same condition is false
                </p>
                <p class="instruction-line">
                    Use <code>else if</code>to specify a new condition to test, if the first condition is false
                </p>
                <p class="instruction-line">
                    Use <code>switch</code>to specify many alternative blocks of code to be executed
                </p>
            </div>
            <div class="real-instruction">
                <p class="rl-line">Change "//write your code here" into <code>if else</code></p>
                <p class="rl-line">Make sure that name is equal to John or else, an alert box will pop up.</p>
            </div>

        </div>
    </div>
    <div  class="box">
        <div class="editable-box">
<textarea id="code">
    <!DOCTYPE html>
    <html>
    <head>
        <meta   content="width=device-width, initial-scale=1.0, minimum-scales=1.0" charset="UTF-8" name="viewport"/>
        <title>If Else</title>
    </head>
    <body>
    <h3>If Else</h3>
    <script>
       function myFunction() {
          var name = prompt("who are you?");
            //write your code here
            //name must be == John
            //else
            //alert('we do not know you');
            }
    </script>
    </body>
    </html>
</textarea>
            <div class="buttons">
                <input type="submit" style="width: 12vw;" value="NEXT"  id="runbtn" class="btn">
            </div>
        </div>

    </div>
    <div class="box">
        <iframe id="frame-result" ></iframe>
    </div>
    <div class="modal" id="modal">
        <div class="modal-header">
            <div class="head-title">
                Congratulations!
            </div>
            <button id="closebtn" class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <p class="text">
                You have completed the Basic JavaScript Course
            </p>
            <button class="no" id="no">Okay, Nice</button>
            <form class="yes-form" style="top: 20.5vh;" method="post">

                <input type="submit" value="I want to learn more"  class="yes" id="yes" name="submit">
            </form>
            <?php
            session_start();
            if ($_POST['submit'] && isset($_SESSION['userID'])){
                ob_start();
                echo '<script>document.location.href="workshop-web-development-enrolled.php?origin=signIn"</script>';
            }
            elseif($_POST['submit'] && !isset($_SESSION['userID'])){
                ob_start();
                echo '<script>document.location.href="sign-up.php"</script>';
            }

            ?>
        </div>
    </div>
    <div id="overlay"></div>
</div>
<script src="codemirror-5.59.4/lib/codemirror.js"></script>
<script src="codemirror-5.59.4/mode/xml/xml.js"></script>
<script src="codemirror-5.59.4/addon/edit/closetag.js"></script>
<script src="codemirror-5.59.4/addon/edit/closebrackets.js"></script>
<script src="codemirror-5.59.4/addon/selection/active-line.js"></script>
<script src=codemirror-5.59.4/mode/javascript/javascript.js></script>
<script src=codemirror-5.59.4/mode/css/css.js></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src=codemirror-5.59.4/mode/htmlmixed/htmlmixed.js></script>
<script type="application/javascript">
    $.ajaxSetup({ dataType: "jsonp" });
    var delay;
    var Editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        lineNumbers: true,
        viewportMargin: 5,
        lineWrapping: true,
        mode: 'javascript',
        theme: 'midnight',
        autoCloseTags: true,
        autoCloseBrackets:true,
        styleActiveLine:true,
    });
    Editor.on("change", function() {
        clearTimeout(delay);
        delay = setTimeout(update, 1000);
    });

    function update(){
        var frame = document.getElementById('frame-result');
        var preview = frame.contentDocument || frame.contentWindow.document;
        preview.open();
        preview.write(Editor.getValue());
        preview.close();
    }
    setTimeout(update,1500);
</script>
<script>
    var openModal = document.querySelector('#runbtn');
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
