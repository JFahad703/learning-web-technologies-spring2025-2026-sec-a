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
            
        }
        .content{
            padding: 40px;
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
        <form method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>REGISTRATION</legend>
                Name: <input type="text" name="name"><hr>
                Email: <input type="email" name="email"><hr>
                Username: <input type="text" name="username"><hr>
                Password: <input type="password" name="password"><hr>
                Confirm Password: <input type="password" name="cpassword"><hr>
                <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female">Female<hr>
                </fieldset>
                
                <fieldset>
                    <legend>DOB</legend>
                    <input type="text" size="2" maxlength="2" name="dd" value=""/> / 
                <input type="text" size="2" maxlength="2" name="mm" value=""/> / 
                <input type="text" size="4" maxlength="4" name="yyyy" value=""/> 
                (dd/mm/yyyy)  
                </fieldset>

                

                <input type="submit" name="submit" value="Submit">
                <input type="reset" name="reset" value="Reset">

            </fieldset>

        </form>
        <?php
        if(isset($_POST['submit'])){
        if($_POST['password'] == $_POST['cpassword']){
            $dob = $_POST['dd']."/".$_POST['mm']."/".$_POST['yyyy'];
        $_SESSION['user'] = [
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "gender" => $_POST['gender'],
            "dob" => $dob
        ];
        echo "Registration successful!";
        echo "<br><a href='login.php'>Go to Login</a>";
    } else {
        echo "Password mismatch!";
    }
}
?>
    </div>

    <div class="footer">
        Copyright © 2017
    </div>

</div>
</body>
</html>