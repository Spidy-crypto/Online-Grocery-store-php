<?php
    session_start();
    $username = $_SESSION['username'];
    $pass = $_POST['pass'];
    $rpass = $_POST['rpass'];
    if(strcmp($pass,$rpass)===0){
        try{
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');
	
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
         
            $query=$dbhandler->query('select * from register');
             while($r=$query->fetch())
             {                
                if(strcmp($username,$r['username']) === 0)
                {
                    $dbhandler->query("update register set password='$pass' where username='$username'");
                    header("location:login.php?msg=Password changed Successfully");
                    session_unset();
                    session_destroy();
                    exit();
                }	
             }     
        }
    
        catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
    else{
        header("location:change_password.php?msg=Password Not match");
    }
?>