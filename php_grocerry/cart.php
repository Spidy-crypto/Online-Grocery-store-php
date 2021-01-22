<?php
try{
    
    session_start();
    
    if($_SESSION['username'] == null){
        
        $msg = "You are not Logged in";
        header("location:login.php?msg=$msg");
    }

	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $product_name=$_GET['product_name'];
        $category=$_SESSION['category_name'];
        $product_id=$_GET['product_id'];
        $username=$_SESSION['username'];
        
        
                
        $sql="select * from drpapp_add_to_cart where username='$username'";
        $query=$dbhandler->query($sql);
        while($r=$query->fetch())
        {
            echo $r['username'];
            echo $r['id']."<br>";
            echo $r['product_name']."<br>";
            echo $product_name;
            
            if($r['id'] === $product_id && $r['product_name'] === $product_name)
            {
                
                $q=$r['quantity']+1;                
                $a="update drpapp_add_to_cart set quantity='$q' where id='$product_id'";
                $query1 = $dbhandler->query($a);
                $s="select * from product_details where product_id='$product_id'";
                $que=$dbhandler->query($s);
                
                if($p=$que->fetch())
                {
                    echo "inner";
                    
                    if($p['quantity'] > 0)
                    {
                        $quan=$p['quantity']-1;
                        $b="update product_details set quantity='$quan' where product_id='$product_id'";
                        $query0 = $dbhandler->query($b);
                        
                        $a="update drpapp_add_to_cart set quantity='$q' where id='$product_id'";
                        $query1 = $dbhandler->query($a);
                        header("location:shop.php");
                    }
                    else
                    {
                        echo "out of stock";
                        header("location:shop.php?stock=out of stock");
                    }
                }
                echo "outer";
                
            }
          
        }
        $q='1';
        
        $sql="insert into drpapp_add_to_cart(id,username,product_name,quantity) values('$product_id','$username','$product_name','$q')";
        $query=$dbhandler->query($sql);
        header("location:shop.php");	    
}
catch(PDOException $e){
	echo $e->getMessage();
	die();
}
?>