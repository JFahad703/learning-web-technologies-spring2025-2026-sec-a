<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($username)) $errors[] = "Username is required.";
    if (empty($email)) $errors[] = "Email is required.";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
    if (empty($password)) $errors[] = "Password is required.";
    elseif (strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";
    if ($password !== $confirm_password) $errors[] = "Passwords do not match.";

    if (empty($errors)) {
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }

        foreach ($_SESSION['users'] as $user) {
            if ($user['username'] === $username) {
                $errors[] = "Username already exists.";
                break;
            }
            if ($user['email'] === $email) {
                $errors[] = "Email already exists.";
                break;
            }
        }
    }

    if (empty($errors)) {
        $newUser = [
            'user_id' => uniqid('user_', true),
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'profile_picture' => 'default.jpg',
            'registered_at' => date('Y-m-d H:i:s')
        ];

        $_SESSION['users'][] = $newUser;

        $_SESSION['user_id'] = $newUser['user_id'];
        $_SESSION['username'] = $newUser['username'];
        $_SESSION['email'] = $newUser['email'];
        $_SESSION['profile_picture'] = $newUser['profile_picture'];
        $_SESSION['registered_at'] = $newUser['registered_at'];

        setcookie('remember_username', $username, time() + (86400 * 30), "/");

        header('Location: dashboard.php');
        exit(); 
    }
}
?>
<html lang="en">
<head>
    <title>Registration - xCompany</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo"><h1><span style="color:#4CAF50;">X</span>Company</h1></div>
            <nav>
                <a href="index.php">Home</a> | 
                <a href="login.php">Login</a> | 
                <a href="register.php">Registration</a>
            </nav>
        </header>
        
        <main>
            <h2>Registration</h2>
            
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
                           value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required 
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </div>
                
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                
                <button type="submit" class="btn">Register</button>
            </form>
            
            <p class="mt-20">Already have an account? <a href="login.php">Login here</a></p>
        </main>
        
        <footer>
            <p>Copyright &copy; 2017</p>
        </footer>
    </div>
</body>
</html>