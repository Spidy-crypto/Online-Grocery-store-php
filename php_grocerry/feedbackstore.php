<?php

try{
        $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');
        $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $username = $_POST['name'];
        $feedback = $_POST['comments'];
        $bag = $_POST['experience'];
        $sql="insert into feedback (username,feedback,bag) values ('$username','$feedback','$bag')";
        $query=$dbhandler->query($sql);
        header("Location:home.php");
}
 catch(PDOException $e){
	echo $e->getMessage();
	die();
    }
?>