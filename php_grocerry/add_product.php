<?php
session_start();
    if(strcmp($_SESSION['username'],"admin")===0);
    else{
        session_unset();
        session_destroy();
        header("location:login.php?msg=You are not an Admmin");
    }
try{
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $product_name=$_POST['product_name'];
        $category_name=$_POST['category_name'];
        $product_description=$_POST['description'];
        $product_price=$_POST['product_price'];
        $product_expirydate=$_POST['product_expirydate'];
        $product_manufacturingdate=$_POST['product_manufacturingdate'];
        
        
        if(!(empty($_FILES["img1"]["name"] || empty($_FILES["img1"]["name"]))))
	{
		$img1=addslashes(file_get_contents($_FILES["img1"]["tmp_name"]));
                $img2=addslashes(file_get_contents($_FILES["img2"]["tmp_name"]));
                $sql="insert into product_details(product_name,category_name,product_description,product_price,product_expdate,product_mandate,product_img1,product_img2) values('$product_name','$category_name','$product_description','$product_price','$product_expirydate','$product_manufacturingdate','$img1','$img2')";
                 $query=$dbhandler->query($sql);
                 header("location:home.php");
	}    
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}


?>