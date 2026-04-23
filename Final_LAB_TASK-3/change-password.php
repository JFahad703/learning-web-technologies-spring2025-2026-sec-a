<?php
require_once 'config.php';
requireLogin();

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    $currentPasswordValid = false;
    if (isset($_SESSION['users'])) {
        foreach ($_SESSION['users'] as $user) {
            if ($user['user_id'] === $_SESSION['user_id']) {
                if (password_verify($current_password, $user['password'])) {
                    $currentPasswordValid = true;
                }
                break;
            }
        }
    }
    
    if (!$currentPasswordValid) {
        $errors[] = "Current password is incorrect";
    }
    
    if (empty($new_password)) {
        $errors[] = "New password is required";
    } elseif (strlen($new_password) < 6) {
        $errors[] = "New password must be at least 6 characters";
    }
    
    if ($new_password !== $confirm_password) {
        $errors[] = "New passwords do not match";
    }
    
    if (empty($errors)) {
        $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
        $_SESSION['password'] = $hashedPassword;
        
        if (isset($_SESSION['users'])) {
            foreach ($_SESSION['users'] as &$user) {
                if ($user['user_id'] === $_SESSION['user_id']) {
                    $user['password'] = $hashedPassword;
                    break;
                }
            }
        }
        
        $success = "Password changed successfully!";
    }
}
?>
<html lang="en">
<head>
    <title>Change Password - xCompany</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <h1><span style="color: #4CAF50;">X</span>Company</h1>
            </div>
            <nav>
                <a href="publicHome.php">Home</a> | 
                <a href="logout.php">Logout</a>
            </nav>
        </header>
        
        <div class="main-content">
            <aside class="sidebar">
                <ul class="menu">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="view-profile.php">View Profile</a></li>
                    <li><a href="edit-profile.php">Edit Profile</a></li>
                    <li><a href="change-password.php" class="active">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </aside>
            
            <main class="content">
                <h2>Change Password</h2>
                
                <?php if ($success): ?>
                    <div class="success">
                        <p><?php echo $success; ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($errors)): ?>
                    <div class="error">
                        <?php foreach ($errors as $error): ?>
                            <p>• <?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="" class="form">
                    <div class="form-group">
                        <label for="current_password">Current Password:</label>
                        <input type="password" id="current_password" name="current_password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="new_password">New Password:</label>
                        <input type="password" id="new_password" name="new_password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password">Confirm New Password:</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </div>
                    
                    <button type="submit" class="btn">Change Password</button>
                </form>
            </main>
        </div>
        
        <footer>
            <p>Copyright &copy; 2017</p>
        </footer>
    </div>
</body>
</html>