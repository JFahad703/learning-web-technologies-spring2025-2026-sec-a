<?php
require_once 'config.php';
requireLogin();
?>
<html lang="en">
<head>
    <title>Dashboard - xCompany</title>
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
                Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong> | 
                <a href="logout.php">Logout</a>
            </nav>
        </header>
        
        <div class="main-content">
            <aside class="sidebar">
                <ul class="menu">
                    <li><a href="dashboard.php" class="active">Dashboard</a></li>
                    <li><a href="view-profile.php">View Profile</a></li>
                    <li><a href="edit-profile.php">Edit Profile</a></li>
                    <li><a href="change-password.php">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </aside>
            
            <main class="content">
                <h2>Dashboard</h2>
                <div class="welcome-box">
                    <h3>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h3>
                    <p>You are successfully logged in.</p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                    <p><strong>Member since:</strong> <?php echo $_SESSION['registered_at']; ?></p>
                    <p><strong>Last login:</strong> <?php echo $_SESSION['logged_in_at'] ?? 'First login'; ?></p>
                </div>
            </main>
        </div>
        
        <footer>
            <p>Copyright &copy; 2017</p>
        </footer>
    </div>
</body>
</html>