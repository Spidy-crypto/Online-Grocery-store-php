<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <link rel="stylesheet" href="fonts/material-icon/css1/material-design-iconic-font.min.css">
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="css1/style.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="add_product.php" enctype="multipart/form-data">
                        <h2 class="form-title"><br></h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="product_name" placeholder="Product_Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="category_name" placeholder="Product_category"/>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="4" cols="20" class="form-input" placeholder="Product Description"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="product_price" placeholder="Price"/>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-input" name="product_manufacturingdate" placeholder="Product Manufacturing Date"/>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-input" name="product_expirydate"/>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-input" name="img1"/>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-input" name="img2"/>
                        </div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                    <button class="login100-form-btn">
                                        Add Product
                                    </button>
                            </div>
                        </div>
                     </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>