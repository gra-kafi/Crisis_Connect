<?php
session_start();
include '../dbConnect.php';

$user_id = $_SESSION['user_id'];
$query = "SELECT name, phone, email, dob, bloodgroup FROM users,userbloodgroup WHERE users.id = '$user_id' AND users.id = userbloodgroup.id";

$result = mysqli_query($connect, $query);
$user   = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user-profile</title>
    <link rel="stylesheet" href="../style/profile.css">
</head>

<body>
    <!-- Top Navbar -->
    <header class="top-bar">
        <div>
            <span>Crisis Connect</span>
        </div>
    </header>


    <!-- White Card Form -->
    <div class="container">
        <div class="card">
            <img src="../Image/logos/profile-user.png" alt="Profile Picture" class="profile-pic">
            <h2><?php echo $user['name']; ?></h2>
            <div>
                <p><strong>Phone Number:</strong> <?php echo $user['phone']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p><strong>Blood Group:</strong><?php echo $user['bloodgroup']; ?></p>
                <p><strong>Date of Birth:</strong> <?php echo $user['dob']; ?></p>
            </div>
            <div class="profile-actions">
                <a href="update-profile.php" class="update-btn">Update Info</a>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-left">
            <h2>Crisis Connect</h2>
            <p>
                Real-time disaster response coordination platform connecting
                victims, volunteers, and emergency responders.
            </p>
        </div>
        <div class="footer-middle">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">Report Emergency</a></li>
                <li><a href="#">Volunteer</a></li>
                <li><a href="#">Live Map</a></li>
            </ul>
        </div>
        <div class="footer-right">
            <h3>Contact</h3>
            <p>Email: crisisconnect999@gmail.com</p>
            <p>© 2025 Crisis Connect</p>
        </div>
    </footer>
</body>

</html>