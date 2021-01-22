<?php
session_start();
try{
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');
	
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $username=$_POST['name'];
        $password=$_POST['password'];
        $reenter=$_POST['re_password'];
        $gender=$_POST['gender'];
        $email = $_POST['email'];
        $mobile_no=$_POST['mobile_no'];
        $email=$_POST['email'];
        $query=$dbhandler->query('select * from register');
        while($r=$query->fetch())
        {                
             if(strcmp($username,$r['username']) === 0)
             {
                 header("location:register.php?msg=username is already exist ");
                 die();
             }
             else if(strcmp($email,$r['email_id']) === 0)
             {
                 header("location:register.php?msg=Email-id is already exist ");
                 die();
             }	
	}        
        $_SESSION['check'] = "1";
        $_SESSION['otp'] = rand(1000,9999);
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['gender'] = $gender;
        $_SESSION['email'] = $email;
        $_SESSION['mobile_no'] = $mobile_no;
        $otp = $_SESSION['otp'];
        if(strcmp($password,$reenter) === 0)
        {
            header("location:email.php");
        }
        else {
            header("location:register.php?msg=password does not match");
        }      
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}


?>