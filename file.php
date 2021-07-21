<?php
ob_start();
$error = NULL;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
if (isset($_POST['submit'])){
    require('config.php');
    $_name = mysqli_real_escape_string($conn,$_POST['name']);
    $_email = mysqli_real_escape_string($conn,$_POST['email']);
    $_company = mysqli_real_escape_string($conn,$_POST['company']);
    $_message = $_POST['message'];
    $_file = $_FILES['file'];
    $allowed = array('pdf','docs');
    $_fileAllowed=in_array($_file,$allowed);


    $insert = mysqli_query($conn, "INSERT INTO contacts(name,email,message,file,company) VALUES ('$_name','$_email','$_message','$_fileAllowed','$_company')");
    if ($insert){
        //send email to user in order to verify account
        require 'vendor/PHPMailer/src/Exception.php';
        require 'vendor/PHPMailer/src/PHPMailer.php';
        require 'vendor/PHPMailer/src/SMTP.php';

        $mail = new PHPMailer();

        $mail = new PHPMailer(true);


        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host ='smtp.gmail.com';
        $mail->SMTPAuth = 'true';
        $mail->Username = 'kolitech08@gmail.com';
        $mail->Password = 'gJlYCO%AE*iN1hEp7a)W';
        $mail->SMTPSecure =PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port   = 587;

        $mail->setFrom('kolitech08@gmail.com','Kolitech');

        $mail->addAddress($_email,$_name);



        $mail->isHTML(true);
        $mail->Subject = 'Consultation Services';
        $mail->Body = "
                    We will contact you anytime. You may see us in Quezon City area for more information about are services.
                    Thank you!
                    ";

        $mail->send();

            if ($_GET['origin']=='signIn'){
                header('location: dashboard.php?origin=signIn');
            }
            else{
                header('location: index.php');
            }


    }
}
?>