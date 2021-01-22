<?php
    session_start();
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');
    $username=$_SESSION['username'];
    $sql="select * from drpapp_add_to_cart where username='$username'";
    $query=$dbhandler->query($sql);
    
    while($c=$query->fetch())
    {
        $product_id=$c['id'];
        
        $sql1="select * from product_details where product_id='$product_id'";
        
        $q_before_update=$c['quantity'];
        
        if($q_before_update > 0)
        {
            $q_after_update=$_POST[$product_id];
        
            $delta=$q_after_update-$q_before_update;
            $query1=$dbhandler->query($sql1);
            if($p=$query1->fetch())
            {
                echo 'delta= '.$delta.'<br>';
                echo 'q after update ='.$q_after_update.'<br>';
                $q_in_product_details=$p['quantity'];
                $name=$p['product_name'];
                if($delta <= $p['quantity'])
                {
                    $dbhandler->query("update drpapp_add_to_cart set quantity='$q_after_update' where username='$username' and id='$product_id'");
                    $set_quantity_in_priduct_details=$p['quantity']-$delta;

                    echo 'vfg bknbg ='.$set_quantity_in_priduct_details.'<br>';  

                    $dbhandler->query("update product_details set quantity='$set_quantity_in_priduct_details' where product_id='$product_id'");
                }
                else
                {
                    $q=$q_in_product_details+$c['quantity'];
                    echo "q=====".$q."<br>";
                     $dbhandler->query("update drpapp_add_to_cart set quantity='$q' where username='$username' and id='$product_id'");
                    $set_quantity_in_priduct_details=0;
                    $dbhandler->query("update product_details set quantity='$set_quantity_in_priduct_details' where product_id='$product_id'");
                    
                    if (!isset($_SESSION['cart'])) 
                    {
                        $_SESSION['cart'] = array();
                    }
                    $stock="Stock is not Available for '$name'";
                    
                    array_push($_SESSION['cart'], $stock);
                    
                }
            }       
        }
        
        
    }   
    
    header('location:show_cart.php');
?>
