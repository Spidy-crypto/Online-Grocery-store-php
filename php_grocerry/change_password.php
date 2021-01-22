<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css1/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css1/style.css">
</head>
<body>
    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    
                    <form method="POST" id="signup-form" class="signup-form" action="password_store.php">
                        
                        <div class="form-group">
                            <input type="password" class="form-input" name="pass" id="password" placeholder="New Password"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="rpass" id="rpassword" placeholder="Confirm Password"/>
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

    <!-- JS -->
    <script src="vendor1/jquery/jquery.min.js"></script>
    <script src="js1/main.js"></script>
</body>
</html>