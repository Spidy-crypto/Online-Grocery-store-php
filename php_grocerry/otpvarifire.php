<?php
    session_start();
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $gender = $_SESSION['gender'];
    $email = $_SESSION['email'];
    $mobile_no = $_SESSION['mobile_no'];
    $otp = $_POST['otp'];
    try{
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');
	
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if($_SESSION['otp'] == $otp){

                $sql="insert into register (username,password,email_id,mobile_no,gender) values ('$username','$password','$email','$mobile_no','$gender')";
                $query=$dbhandler->query($sql);
                session_unset();
                session_destroy();
            header("Location:login.php");
        }
        else{
            $msg = "Please Enter Correct Otp";
            header("location:otp.php?msg=$msg");
        }
    }
    catch(PDOException $e){
	echo $e->getMessage();
	die();
}
?>
