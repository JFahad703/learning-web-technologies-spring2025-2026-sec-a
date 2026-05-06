<!DOCTYPE html>
<html>
<head>
    <title>Register Employer</title>
    <style>
        body{ font-family: Arial; margin: 50px; }
        form{ width: 400px; margin: auto; padding: 20px; border: 1px solid #ddd; }
        input{ width: 100%; padding: 8px; margin: 5px 0; box-sizing: border-box; }
        .error{ color: red; text-align: center; }
        .back{ display: inline-block; margin-top: 10px; text-decoration: none; color: #2196F3; }
    </style>
</head>
<body>
    <form method="post" action="../controller/AddController.php">
        <h2 style="text-align:center;">Register New Employer</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <input type="text" name="employer_name" placeholder="Employer Name" value="<?php echo $_POST['employer_name']??''; ?>" />
        <input type="text" name="company_name" placeholder="Company Name" value="<?php echo $_POST['company_name']??''; ?>" />
        <input type="text" name="contact_no" placeholder="Contact No" value="<?php echo $_POST['contact_no']??''; ?>" />
        <input type="text" name="username" placeholder="Username" value="<?php echo $_POST['username']??''; ?>" />
        <input type="password" name="password" placeholder="Password" />
        <input type="submit" name="register" value="Register Employer" />
        <a href="../view/dashboard.php" class="back">← Back to Dashboard</a>
    </form>
</body>
</html>