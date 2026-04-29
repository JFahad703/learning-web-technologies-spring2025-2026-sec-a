<?php
session_start();
?>
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
            padding: 5px;
        }
        .content{
            padding: 20px;
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
        <h3>Welcome to XCompany</h3>
    </div>

    <div class="footer">
        Copyright © 2017
    </div>

</div>
</body>
</html>