<!DOCTYPE html>
<html>
<head>
    <link rel="apple-touch-icon" sizes="150x150" href="icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/sentmail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta   content="width=device-width, initial-scale=1.0" charset="UTF-8" name="viewport"/>
    <title>Kolitech</title>
</head>
<body>
<a href="index.php" class="logo">
    <h1 class="logo">koliTECH</h1>
</a>

<div style="font-size: 30vh;" id="mail" class="fa"></div>
<p class="sent">An email has been sent to you with instructions on how to reset your password</p>
<!-- this is when a successful submit from forgot-password.php -->



<script>
    function openMail(){
        let mail = document.getElementById('mail');
        mail.innerHTML = "&#xf0e0;";

        setTimeout(function () {
            mail.innerHTML = "&#xf2b6;";
        }, 1000)
    }

    setInterval(openMail,2000);
    openMail();
    //
</script>
</body>
</html>

