<?php
require_once 'config.php';
requireLogin();

$success = '';
$errors = [];

if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

if (!file_exists('uploads/default.jpg')) {
    $img = imagecreatetruecolor(150, 150);
    $bg = imagecolorallocate($img, 200, 200, 200);
    imagefill($img, 0, 0, $bg);
    imagejpeg($img, 'uploads/default.jpg');
    imagedestroy($img);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['profile_picture']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($ext, $allowed)) {
            $new_filename = uniqid() . '.' . $ext;
            $upload_path = 'uploads/' . $new_filename;
            
            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $upload_path)) {
                $old_picture = $_SESSION['profile_picture'] ?? 'default.jpg';
                if ($old_picture !== 'default.jpg' && file_exists('uploads/' . $old_picture)) {
                    unlink('uploads/' . $old_picture);
                }
                
                $_SESSION['profile_picture'] = $new_filename;
                $success = "Profile picture updated successfully!";
                
                if (isset($_SESSION['users'])) {
                    foreach ($_SESSION['users'] as &$user) {
                        if ($user['user_id'] === $_SESSION['user_id']) {
                            $user['profile_picture'] = $new_filename;
                            break;
                        }
                    }
                }
            } else {
                $errors[] = "Failed to upload image";
            }
        } else {
            $errors[] = "Invalid file type. Allowed: jpg, jpeg, png, gif";
        }
    }
    
    if (isset($_POST['email'])) {
        $email = trim($_POST['email']);
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailExists = false;
            if (isset($_SESSION['users'])) {
                foreach ($_SESSION['users'] as $user) {
                    if ($user['email'] === $email && $user['user_id'] !== $_SESSION['user_id']) {
                        $emailExists = true;
                        break;
                    }
                }
            }
            
            if (!$emailExists) {
                $_SESSION['email'] = $email;
                
                if (isset($_SESSION['users'])) {
                    foreach ($_SESSION['users'] as &$user) {
                        if ($user['user_id'] === $_SESSION['user_id']) {
                            $user['email'] = $email;
                            break;
                        }
                    }
                }
                
                if (empty($success)) {
                    $success = "Profile updated successfully!";
                }
            } else {
                $errors[] = "Email already exists";
            }
        } else {
            $errors[] = "Invalid email address";
        }
    }
}
?>
<html lang="en">
<head>
    <title>Edit Profile - xCompany</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <h1><span style="color: #4CAF50;">X</span>Company</h1>
            </div>
            <nav>
                <a href="index.php">Home</a> | 
                <a href="logout.php">Logout</a>
            </nav>
        </header>
        
        <div class="main-content">
            <aside class="sidebar">
                <ul class="menu">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="view-profile.php">View Profile</a></li>
                    <li><a href="edit-profile.php" class="active">Edit Profile</a></li>
                    <li><a href="change-password.php">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </aside>
            
            <main class="content">
                <h2>Edit Profile</h2>
                
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
                
                <form method="POST" action="" enctype="multipart/form-data" class="form">
                    <div class="form-group">
                        <label>Current Profile Picture:</label>
                        <img src="uploads/<?php echo htmlspecialchars($_SESSION['profile_picture'] ?? 'default.jpg'); ?>" 
                             width="100" height="100" alt="Current" 
                             onerror="this.src='uploads/default.jpg'" 
                             style="border-radius: 50%; display: block; margin-bottom: 10px;">
                    </div>
                    
                    <div class="form-group">
                        <label for="profile_picture">Change Profile Picture:</label>
                        <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" 
                               value="<?php echo htmlspecialchars($_SESSION['email']); ?>" required>
                    </div>
                    
                    <button type="submit" class="btn">Update Profile</button>
                </form>
            </main>
        </div>
        
        <footer>
            <p>Copyright &copy; 2017</p>
        </footer>
    </div>
</body>
</html>