<?php session_start();
    
    if($_SESSION['username'] == null){
        $msg = "You are not Logged in";
        header("location:login.php?msg=$msg");
    }
    
?>
<html>
    <body>

<header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="home.php"><img src="img/core-img/logomain.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="home.php">Home</a></li>
<!--                    <li><a href="shop.html">Shop</a></li>-->
<!--                    <li><a href="product-details.html">Product</a></li>-->
                    <li><a href="show_cart.php">Cart</a></li>
                    <?php if(strcmp($_SESSION['username'],"admin")===0){
                        echo '<li><a href="add.php">Add Product</a></li>';
                    }?>
                    <li><a href="feedback.php">feed-back</a></li>
                    <li><a href="logout.php">LogOut</a></li>
                </ul>
            </nav>
            
            <?php
                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');
                $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $username=$_SESSION['username'];                 
                $sql="select * from drpapp_add_to_cart where username='$username'";
                $query=$dbhandler->query($sql);
                $qty = 0;
                while($r=$query->fetch())
                {
                    $qty = $qty + $r['quantity'];
                }   
             ?> 
            <br><br><br>
            <div class="cart-fav-search mb-100">
                <a href="show_cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(<?php echo $qty ?>)</span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
            </div>
            
            <?php
                if(isset($_GET['search']))
                {
                    $product = $_GET['search'];

                    try{
                        $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');
                        $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        $query=$dbhandler->query('select * from product_details');
                        while($r=$query->fetch())
                        {                
                            if(strcmp($r['product_name'],$product)===0){
                                $category = $r['category_name'];
                                header("location:shop.php?category=$category");
                            }
                        } 
                    }
                    catch(PDOException $e){
                        echo $e->getMessage();
                        die();
                    }
                }
            ?>
            
        </header>
    </body    
</html>