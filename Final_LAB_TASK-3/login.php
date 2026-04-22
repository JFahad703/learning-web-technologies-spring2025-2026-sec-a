<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

$errors = [];
$remembered_username = $_COOKIE['remember_username'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);
    
    
    if (empty($username) || empty($password)) {
        $errors[] = "Please enter both username and password";
    } else {
        $login_success = false;
        
        if (isset($_SESSION['users']) && is_array($_SESSION['users'])) {
            foreach ($_SESSION['users'] as $user) {
                
                
                if ($user['username'] === $username) {
                    if (password_verify($password, $user['password'])) {
                        $_SESSION['user_id'] = $user['user_id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['profile_picture'] = $user['profile_picture'];
                        $_SESSION['registered_at'] = $user['registered_at'];
                        $_SESSION['logged_in_at'] = date('Y-m-d H:i:s');
                        
                        if ($remember) {
                            setcookie('remember_username', $username, time() + (86400 * 30), "/");
                        }
                        
                        $login_success = true;
                        header('Location: dashboard.php');
                        exit();
                    } else {
                        $errors[] = "Invalid username or password";
                    }
                    break;
                }
            }
            
            if (!$login_success && empty($errors)) {
                $errors[] = "Invalid username or password";
            }
        } else {
            $errors[] = "No users registered yet. Please register first.";
        }
    }
}
?>
<html lang="en">
<head>
    <title>Login - xCompany</title>
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
            <h2>Login</h2>
            
            <?php if (!empty($errors)): ?>
                <div class="error">
                    <?php foreach ($errors as $error): ?>
                        <p>• <?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="" class="form">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required 
                           value="<?php echo htmlspecialchars($_POST['username'] ?? $remembered_username); ?>">
                </div>
                
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="form-group checkbox">
                    <label>
                        <input type="checkbox" name="remember" <?php echo $remembered_username ? 'checked' : ''; ?>>
                        Remember Me
                    </label>
                </div>
                
                <button type="submit" class="btn">Login</button>
            </form>
            
            <p class="mt-20"><a href="forgot-password.php">Forgot Password?</a></p>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </main>
        
        <footer>
            <p>Copyright &copy; 2017</p>
        </footer>
    </div>
</body>
</html>