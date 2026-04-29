<?php session_start(); ?>
<html lang="en">
<head>
    <title>Public Home</title>
    <style>
        .container{
            width: 800px;
            margin: auto;
            border: 1px solid black;
        }
         .header {
            padding: 15px;
            border-bottom: 1px solid black;
        }
        .nav {
            float: right;
        }
        .footer{
            text-align:center;
        }
        .content{
            padding: auto;
            border-bottom: 1px solid black;
        }
        
    </style>
    
</head>
<body>
    <div class="container">
    <div class="header">
        <img src="logo.png" alt="XCompany Logo">
        
        <div class="nav">
            <a href="publicHome.php">Home</a> |
            <a href="login.php">Login</a> |
            <a href="registration.php">Registration</a>
        </div>
    </div>

    
    <div class="content">
        <form method="post" action="../controller/loginCheck.php" enctype="multipart/form-data">
            <fieldset>
                <legend>LOGIN</legend>
                Username: <input type="text" name="username"><hr>
                Password: <input type="password" name="password"><hr>
                <input type="checkbox" name="remember"> Remember Me <br><br>
                <input type="submit" name="submit" value="Submit">
                <a href="forgotPassword.php">Forgot Password?</a>

            </fieldset>
        </form>
    </div>

    <div class="footer">
        Copyright © 2017
    </div>

</div>
</body>
</html>