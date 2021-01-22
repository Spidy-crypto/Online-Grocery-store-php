<!DOCTYPE html>
<?php
session_start();
if($_SESSION['username'] == null){
        
        $msg = "You are not Logged in";
        header("location:login.php?msg=$msg");
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" href="fonts/material-icon/css1/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css1/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    
                    <form method="POST" id="signup-form" class="signup-form" action="otpvarifire.php">
                        
                        <div class="form-group">
                            <input type="text" class="form-input" name="otp" id="otp" placeholder="Enter Otp"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Confirm"/>
                        </div>
                    </form>
                                    <?php
                                        if(isset($_GET['msg']))
                                        {
                                            echo $_GET['msg'];
                                        }
                                    ?>
                </div>
            </div>
        </section>

    </div>
    <script src="vendor1/jquery/jquery.min.js"></script>
    <script src="js1/main.js"></script>
</body>
</html>