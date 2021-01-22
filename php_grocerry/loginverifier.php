<?php
session_start();
$_SESSION['search'] = "false";
$_SESSION['forget'] = "false";
$_SESSION['check'] = "0";
try{
     $msg = "Invalid Captcha";
    if ($_POST['vercode1'] == $_SESSION['vercode']){
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $username=$_POST['username'];
        $_SESSION['username'] = $username;
        $password=$_POST['password'];
        $query=$dbhandler->query('select * from register' );

                while($r=$query->fetch())
                {
                        if(strcmp($username,$r['username']) === 0 && strcmp($password,$r['password']) === 0)
                        {
                            
                            session_start();
                            $_SESSION['del'] = 40;
                            $_SESSION['username']=$r['username'];
                                header("location:home.php");
                                exit();
                        }       	
                }
                 $msg = "invalid Username or Password " ;
    }
                header("location:login.php?msg=$msg");
        
}

catch(PDOException $e){
	echo $e->getMessage();
	die();
}



?>