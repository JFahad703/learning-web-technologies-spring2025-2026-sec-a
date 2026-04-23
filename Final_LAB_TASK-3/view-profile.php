<?php
require_once 'config.php';
requireLogin();
?>
<html lang="en">
<head>
    <title>View Profile - xCompany</title>
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
                    <li><a href="view-profile.php" class="active">View Profile</a></li>
                    <li><a href="edit-profile.php">Edit Profile</a></li>
                    <li><a href="change-password.php">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </aside>
            
            <main class="content">
                <h2>View Profile</h2>
                <div class="profile">
                    <div class="profile-picture">
                        <img src="uploads/<?php echo htmlspecialchars($_SESSION['profile_picture'] ?? 'profileicon.png'); ?>" 
                             alt="Profile Picture" width="150" height="150" 
                             onerror="this.src='profileicon.png'">
                    </div>
                    <div class="profile-info">
                        <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                        <p><strong>Member Since:</strong> <?php echo $_SESSION['registered_at']; ?></p>
                        <p><strong>Last Login:</strong> <?php echo $_SESSION['logged_in_at'] ?? 'First login'; ?></p>
                    </div>
                </div>
            </main>
        </div>
        
        <footer>
            <p>Copyright &copy; 2017</p>
        </footer>
    </div>
</body>
</html>