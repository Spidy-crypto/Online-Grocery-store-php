<?php
session_start();
try{
     $msg = "Invalid Captcha";
    if ($_POST['vercode1'] == $_SESSION['vercode']){
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $username=$_POST['username'];
        $_SESSION['username'] = $username;
        $query=$dbhandler->query('select * from register' );
                while($r=$query->fetch())
                {
                        if(strcmp($username,$r['username']) === 0)
                        {
                            $_SESSION['forget'] = "true";
                            header("location:email.php");
                            exit();
                        }       	
                }
                 $msg = "invalid Username" ;
    }
    header("location:login.php?msg=$msg");       
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}



?>