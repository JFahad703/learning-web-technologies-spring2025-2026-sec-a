<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';
?>
<html lang="en">
<head>
    <title>Public Home - xCompany</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <h1>XCompany</h1>
            </div>
            <nav>
                <a href="publicHome.php" class="active">Home</a> | 
                <a href="login.php">Login</a> | 
                <a href="register.php">Registration</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    | <a href="dashboard.php">Dashboard</a>
                    | <a href="logout.php">Logout</a>
                <?php endif; ?>
            </nav>
        </header>
        
        <main>
            <h2>Welcome to xCompany</h2>
            <?php if (isset($_SESSION['user_id'])): ?>
                <p>Welcome back, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>!</p>
                <p><a href="dashboard.php" class="btn">Go to Dashboard</a></p>
            <?php else: ?>
                <p>Please login or register to access your account.</p>
            <?php endif; ?>
        </main>
        
        <footer>
            <p>Copyright &copy; 2017</p>
        </footer>
    </div>
</body>
</html>