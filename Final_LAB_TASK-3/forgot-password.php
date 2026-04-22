<?php
require_once 'config.php';
redirectIfLoggedIn();

$success = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    
    if (empty($email)) {
        $errors[] = "Please enter your email";
    } else {
        $emailFound = false;
        if (isset($_SESSION['users'])) {
            foreach ($_SESSION['users'] as &$user) {
                if ($user['email'] === $email) {
                    $emailFound = true;
                    $tempPassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
                    $user['password'] = password_hash($tempPassword, PASSWORD_DEFAULT);
                    
                    $success = "A temporary password has been generated. Your new password is: <strong>" . $tempPassword . "</strong><br>Please login and change your password immediately.";
                    break;
                }
            }
        }
        
        if (!$emailFound) {
            $success = "If an account exists with that email, reset instructions have been sent.";
        }
    }
}
?>
<html lang="en">
<head>
    <title>Forgot Password - xCompany</title>
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
                <a href="login.php">Login</a> | 
                <a href="register.php">Registration</a>
            </nav>
        </header>
        
        <main>
            <h2>Forgot Password</h2>
            
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
                    <label for="email">Enter your email address:</label>
                    <input type="email" id="email" name="email" required 
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </div>
                
                <button type="submit" class="btn">Reset Password</button>
            </form>
            
            <p class="mt-20"><a href="login.php">Back to Login</a></p>
        </main>
        
        <footer>
            <p>Copyright &copy; 2017</p>
        </footer>
    </div>
</body>
</html>