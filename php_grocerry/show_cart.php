
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Cart</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    
    <style>
    .button {
  background-color: #e7e7e7 !important; 
  color: black !important; 
  border: none !important;
  padding: 15px 32px !important;
  text-align: center !important;
  text-decoration: none !important;
  display: inline-block !important;
  font-size: 16px !important;
}

p.round2 {
  border: 1px solid red;
  border-radius: 8px;
}
</style>



</head>

<body>
    
    
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index"><img src="img/core-img/logomain.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
            <?php include "header.php" ?>
        <!-- Header Area End -->



        
    
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <form action="update_cart.php" method="post">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>
                        <?php
                        if(isset($_SESSION['cart']))
                        {
                            foreach ($_SESSION['cart'] as $key=>$value) {
                                echo '<p class="round2">'.$value.'</p>' ;
                            }
                            unset($_SESSION['cart']);
                        }    
                        ?>
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                $msg1 = "";
                                    $del = $_SESSION['del'];
                                    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');

                                    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
                                    $username=$_SESSION['username'];
                                    $sql="select * from drpapp_add_to_cart where username='$username'";
                                    $query=$dbhandler->query($sql);
                                    $sub_total_price=0;
                                    while($r=$query->fetch())
                                    {
                                        
                                        $product_id=$r['id'];
                                        $s="select * from product_details where product_id='$product_id'";
                                        $que=$dbhandler->query($s);
                                        if($r['quantity'] > 0)
                                        {
                                        if($p=$que->fetch())
                                        {
                               ?>

                                    <tr>
                                        <td class="cart_product_img">
                                            <?php
                                            $msg1 = "empty";
                                            echo '    <a href="#"><img src="data:image/jpeg;base64,'.base64_encode($p['product_img2']).'" ></a>';
                                            ?>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>
                                            <?php
                                            echo $p['product_name'];
                                            ?>
                                            </h5>
                                        </td>
                                        <td class="price">
                                            <span>
                                                <?php
                                                $sub_total_price=$sub_total_price+$p['product_price']*$r['quantity'];
                                                echo $p['product_price'];
                                                ?>
                                            </span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('<?php echo $p['product_id'] ?>'); var qty = effect.value;
                                                    if( !isNaN( qty ) &amp;&amp; qty &gt; 0 )
                                                        effect.value--;return false;">
                                                        <i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id='<?php echo $p['product_id']?>' step="1" min="0" max="300" name='<?php echo $p['product_id']?>' value='<?php echo $r['quantity']?>'>
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('<?php echo $p['product_id'] ?>'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>

                                                </div>


                                            </div>
                                        </td>
                                        
                                        
                                    </tr>
                                        <?php } } }?>
                                
                                <?php $total_price = $sub_total_price + $del;?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span><?php echo $sub_total_price?></span></li>
                                <li><span>delivery:</span> <span><?php echo $del ?></span></li>
                                <li><span>total:</span> <span><?php echo $total_price?></span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                               <?php
                                echo '<a href="checkout.php?sub='.$sub_total_price.'&total='.$total_price.'" class="btn amado-btn w-100">Checkout</a>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php
                            if(strcmp($msg1,"empty") === 0){
                                echo '&nbsp;&nbsp;&nbsp;<input type="submit" value="Update Cart" class="button">';
                            }
                     ?>
                </form>
            </div>
        </div>
    </div>
    
   <?php $query=$dbhandler->query("update bill set total_bill='$total_price' where username='$username'");?>
    
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>Free Delivery</span></h2>
                      
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="email.php" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
   

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>