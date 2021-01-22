<?php
session_start();
    if($_SESSION['username'] == null){       
        $msg = "You are not Logged in";
        header("location:login.php?msg=$msg");
    }
$_SESSION['del'] = 0;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->isHTML();
$username = $_SESSION['username'];
$mail->SMTPDebug = 1;
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';  
$mail->Port = 587;
$mail->Username = 'rajkalathiya143@gmail.com';
$mail->Password = 'PASSWORD';
$mail->SetFrom('rajkalathiya143@gmail.com','noreply@gmail.com');
$subject = "Grocery Story";
$message = "Thanks $username"
        . " for subscribing."
        . "Now You can enjoy free Delivery on your order";
$check = $_SESSION['check'];
if(strcmp($_SESSION['forget'],"true")===0){
    $subject = "Forgot Password";
    $message = "Open the link to Change the password"
            . "<br>"
            . "http://localhost/php_grocerry/change_password.php";
}
if(isset($_GET['checkout'])){
    $subject = "Order";
    $message = "Your Order placed Successfully";
}
if(strcmp($check,"1") === 0)
{
    $mail->Subject = "OTP";
    $mail->Body = $_SESSION['otp'];
    $email = $_SESSION['email'];
    $mail->AddAddress($email);
    $q = $mail->Send();
    $_SESSION['check'] = 0;
    header("location:otp.php");
}
else{
    try{
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');
	$username = $_SESSION['username'];
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $query=$dbhandler->query('select * from register');
        while($r=$query->fetch())
        {                
            if(strcmp($username,$r['username']) === 0 ){
                $email = $r['email_id'];
            }
        }
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AddAddress($email);
        $q = $mail->Send();
        if(strcmp($_SESSION['forget'],"true")===0){
            $_SESSION['forget'] = "false";
            header("location:login.php?msg=Please Check Your mail to change the password"); 
            exit();
        }
        header("location:home.php");
    }
    catch(PDOException $e){
	echo $e->getMessage();
	die();
    }
}
?>