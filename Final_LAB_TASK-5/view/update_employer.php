<!DOCTYPE html>
<html>
<head>
    <title>Update Employer</title>
    <style>
        body{ font-family: Arial; margin: 50px; }
        form{ width: 400px; margin: auto; padding: 20px; border: 1px solid #ddd; }
        input{ width: 100%; padding: 8px; margin: 5px 0; box-sizing: border-box; }
        .error{ color: red; text-align: center; }
        .back{ display: inline-block; margin-top: 10px; text-decoration: none; color: #2196F3; }
    </style>
</head>
<body>
    <form method="post" action="../controller/UpdateController.php?id=<?php echo $id; ?>">
        <h2 style="text-align:center;">Update Employer</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <input type="text" name="employer_name" value="<?php echo $employer['employer_name']; ?>" />
        <input type="text" name="company_name" value="<?php echo $employer['company_name']; ?>" />
        <input type="text" name="contact_no" value="<?php echo $employer['contact_no']; ?>" />
        <input type="text" name="username" value="<?php echo $employer['username']; ?>" />
        <input type="password" name="password" placeholder="New Password (leave blank to keep)" />
        <input type="submit" name="update" value="Update Employer" />
        <a href="../view/dashboard.php" class="back">← Back</a>
    </form>
</body>
</html>