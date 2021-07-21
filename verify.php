
<!DOCTYPE html>
<html>
<head>
    <link rel="apple-touch-icon" sizes="150x150" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/sentmail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta   content="width=device-width, initial-scale=1.0, minimum-scales=1.0" charset="UTF-8" name="viewport"/>
    <title>Verification</title>
</head>
<style>
    .message{
        position: absolute;
        top: 40vh;
        left: 40vw;
        color: white;
        font-family: Montserrat-medium,sans-serif;
        font-size: 3vh;
    }
    .verified{
        position: absolute;
        top: 42vh;
        left: 33vw;
        color: white;
        font-family: Montserrat-medium,sans-serif;
        font-size: 3vh;
    }
</style>
<body>
<a href="index.php" class="logo">
    <h1 class="logo">koliTECH</h1>
</a>

<?php
// this is where the user redirects when it clicked the link from its email right after she signs up
error_reporting(0);
$user = 'root';
$pass = '';
$host = 'localhost';
$db = 'db_user';
$conn = mysqli_connect($host, $user, $pass, $db);
$error = "";

if(mysqli_connect_errno()){
    $error =  "Error occured while establishing connection into the database." . mysqli_connect_error(); }

$res = mysqli_query($conn, 'select * from accounts');
$hash = mysqli_escape_string($conn,$_GET['hash']);
if (isset($_GET['hash'])){
    //process verification

    $hash = mysqli_escape_string($conn,$_GET['hash']);// this is to check the hash if it is equal from the hash generated in php and placed in database
    $result = mysqli_query($conn,"SELECT * FROM accounts WHERE isVerified = 0 AND hash = '$hash' LIMIT 1");
    $num = mysqli_num_rows($result);

    if ($num == 1){
        //validate the email
        $update = mysqli_query($conn,"UPDATE accounts SET isVerified = 1 WHERE hash = '$hash' LIMIT 1");
        if ($update){
            echo '<div style="font-size: 30vh;" id="mail" class="fa"></div>';
           echo '<p class="verified">Your account has been verified. You may now log in</p>';
        }
        else{
            $error = mysqli_error();
        }

    }
    else{
        echo '<div style="font-size: 30vh;" id="error" class="fa"></div>';
        $error = "The account is invalid or the link has been expired.";
    }
}
else{
    echo '<div style="font-size: 30vh;" id="error" class="fa"></div>';
    $error = 'Something went wrong';
}

echo "<p id='message' class='message'>".$error."</p>";
?>
<script>
    function openMail(){
        let mail = document.getElementById('mail');

        mail.innerHTML = "&#xf0e0;";

        setTimeout(function () {
            mail.innerHTML = "&#xf00c";
        }, 1000)
    }

    setInterval(openMail,2000);
    openMail();

    function wrong()
    {
        let error = document.getElementById('error');
        error.innerHTML = "&#xf0e0;";

        setTimeout(function (){
            error.innerHTML = "&#xf00d";
        })
    }
    setInterval(wrong,2000);
    wrong();
    //
</script>
</script>
</body>
</html>
