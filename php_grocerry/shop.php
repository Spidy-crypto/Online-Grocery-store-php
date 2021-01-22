

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

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
                <a href="index.html"><img src="img/core-img/logomain.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
            <?php include 'header.php';?>
        <!-- Header Area End -->

        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Categories</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                        <li><a href="shop.php?category=Fruits">fruits</a></li>
                        <li><a href="shop.php?category=Vegetables">Vegetables</a></li>
                        <li><a href="shop.php?category=DryFruits">Dryfruits</a></li>
                        <li><a href="shop.php?category=Biscuits">biscuit</a></li>
                        <li><a href="shop.php?category=Stationary">stationery</a></li>
                         <li><a href="shop.php?category=Masala">Masala</a></li>
                        <li><a href="shop.php?category=Beans">Beans</a></li>
                        <li><a href="shop.php?category=Grains">Grains</a></li>
                        <li><a href="shop.php?category=Bathroom Accessories">Bathroom Accessories</a></li>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->

            <!-- ##### Single Widget ##### -->


            <!-- ##### Single Widget ##### -->

        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">


                <div class="row">

                    <!-- Single Product Area -->
                    
                    
                    <?php
            $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=sp','root','');

            $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            if(isset($_GET['category']))
            {
                $category=$_GET['category'];
            }
            else
            {
                $category =$_SESSION['category_name'];
            }
            $_SESSION['category_name']=$category;
            
            
            $query=$dbhandler->query("select * from product_details where category_name='$category' ");
                    while($r=$query->fetch()){
                    $product_id =$r['product_id'];
                    $product_name = $r['product_name'];
                    ?>
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <?php
                                 echo '<img src="data:image/jpeg;base64,'.base64_encode($r['product_img1']).'" >';	
                                
                                 echo '<img src="data:image/jpeg;base64,'.base64_encode($r['product_img2']).'" class="hover-img">';	
                                        
                                ?>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price"><?php echo $r['product_price'] ?></p>
                                    <a href="#">
                                        <h6><?php echo $r['product_name'] ?></h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="cart">
                                     <?php       
                                     // echo '<a href="cart.php?product_id='.$product_id.' " data-toggle="tooltip" data-placement="left" title="Add to Cart">';
                                             
                                     ?>
                                      <!--  <img src="img/core-img/cart.png" alt=""></a> -->
                                     
                                    </div>
                                    <?php 
                                        if(isset($_GET['stock']))
                                        {
                                            echo $_GET['stock'];
                                        }
                                        else
                                        {
                                            echo '<a href="cart.php?product_id='.$product_id.'&product_name='.$product_name.' " data-toggle="tooltip" data-placement="left" title="Add to Cart">';
                                            echo '<img src="img/core-img/cart.png" alt=""></a>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                    
                    
                    
                    
                    
                    
                    
                    <!-- Single Product Area -->
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span></span>Free Delivery</h2>
                       
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
  
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    
    <script src="js/popper.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/plugins.js"></script>
    
    <script src="js/active.js"></script>

</body>

</html>