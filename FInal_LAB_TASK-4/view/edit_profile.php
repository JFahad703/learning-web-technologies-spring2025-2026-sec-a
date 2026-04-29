<?php
session_start();
?>
<html lang="en">
<head>
    <title>Edit Profile</title>
    <style>
       .container{
            width: 800px;
            margin: auto;
            border: 2px solid black;
        }
         .header {
            padding: 15px;
            border-bottom: 2px solid black;
        }
        .nav {
            float: right;
        }
        .main{
            display:flex;
        }
        .footer{
            text-align:center;


        }
        .sidebar{
            width:30%;
            border-right: 2px solid black;
            padding: 10px;
            border-bottom: 2px solid black;
        }
        .content{
            width:70%;
            padding:20px;
            border-bottom: 2px solid black;
        }
        
    </style>
    
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="logo.png" height="40">
                <div class="nav">
                Logged in as <?=$_SESSION['user']['name']?> |
                <a href="logout.php">Logout</a>
                </div>
        </div>

        <div class="main">

            <div class="sidebar">
                <b>Account</b><hr>
                <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profile.php">View Profile</a></li>
                <li><a href="edit_profile.php">Edit Profile</a></li>
                <li><a href="change_password.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>

        <div class="content">
            <fieldset>
                <legend>EDIT PROFILE</legend>
                Name     : <input type="text" name="name">
                <hr>
                Email    : <input type="email" name="email">
                <hr>
                Gender   : <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female">Female
                <hr>
                Date of Birth    : <input type="text" size="2" maxlength="2" name="dd" value=""/> / 
                <input type="text" size="2" maxlength="2" name="mm" value=""/> / 
                <input type="text" size="4" maxlength="4" name="yyyy" value=""/> <br>
                (dd/mm/yyyy) 
            </fieldset>
                

            
        </div>

    </div>

<div class="footer">Copyright © 2017</div>

</div>
</body>
</html>