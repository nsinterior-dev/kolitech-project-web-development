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
    <title>Basic HTML Elements</title>
</head>
<style>
    .CodeMirror {
        border: none;
        height: auto;
    }
    .CodeMirror-line span{
        font-size: 2.25vh;
    }
    .CodeMirror-linenumber{
        font-size: 2.25vh;
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
            <div class="instructions-wrapper">
                <div class="breadcrumbs">
                    <p class="breadcrumbs-title">Basic HTML and HTML5</p>
                </div>
                <div class="instructions-title">
                    <p class="instructions-title-p">Say Hello World To HTML Elements</p>
                </div>
                <div class="instructions-paragraph">
                    <p class="instruction-line"> These will walk you through web development step-by-step.</p>
                    <p class="instruction-line">
                        First, you'll start by building a simple web page using HTML. You can edit code in your code editor, which is embedded into this web page.
                    </p>
                    <p class="instruction-line">Most HTML elements have an opening tag and a closing tag.</p>
                    <p class="instruction-line">Opening tags look like this:
                        <br>
                    <code>< h1 ></code></p>
                    <p class="instruction-line">Closing tags look like this:
                        <br>
                    <code>< /h1 ></code></p>
                    <p class="instruction-line">The only difference between opening and closing tags is the forward slash after the opening bracket of a closing tag.</p>
                </div>
                <div class="real-instruction">
                    <p class="rl-line">Under "Write your code here" area, write this code (with no space, except for Hello World)</p>
                    <p class="rl-line"> <code>< h1></code>Hello World<code>< /h1></code></p>
                    <p class="rl-line"> <code>< h2></code>Hello World<code>< /h2></code></p>
                    <p class="rl-line"> <code>< h3></code>Hello World<code>< /h3></code></p>
                    <p class="rl-line"> <code>< h4></code>Hello World<code>< /h4></code></p>
                    <p class="rl-line"> <code>< h5></code>Hello World<code>< /h5></code></p>

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
        <title>Hello World</title>
    </head>
    <body>
    <!--Write your code here-->
    </body>
    </html>
</textarea>
               <div class="buttons">
                   <input type="submit" style="width: 12vw;" value="NEXT" onclick="document.location.href='workshop-list-html.php?origin=signIn'" id="runbtn" class="btn">
               </div>
           </div>

        </div>
        <div class="box">
            <iframe id="frame-result" ></iframe>
        </div>
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
        mode: 'xml',
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

</body>
</html>
