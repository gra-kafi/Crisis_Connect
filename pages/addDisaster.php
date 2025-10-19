<?php
session_start();
include '../dbConnect.php';
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add-disaster</title>
    <link rel="stylesheet" href="../style/addDisaster.css">
</head>

<body>
    <!-- Top Navbar -->
    <header class="top-bar">
        <div>
            <img src="../image/logos/previous.png" width="35px" onclick="window.location.href='admin.php'">
            <h1>Crisis Connect</h1>
        </div>
    </header>


    <!-- White Card Form -->
    <div class="container">
        <div class="card">
            <h1>Add a new disaster</h1>
            <form method="post" action="insert_disaster.php">
      
            <label for="disaster_name">Disaster Name</label>
            <input type="text" id="disaster_name" name="disaster_name" required>

            <label for="type_id">Disaster Type</label>
            <select id="type_id" name="type_id" required>
                <option value="">Select Type</option>
                <option value="1">FLOOD</option>
                <option value="2">CYCLONE</option>
                <option value="3">EARTHQUAKE</option>
                <option value="4">FIRE</option>
                <option value="5">OTHER</option>
            </select>
            
            <label for="severity_level">Severity Level</label>
            <select id="level_id" name="level_id" required>
                <option value="">Select Level</option>
                <option value="1" style="color: #28a745;">MINOR</option>
                <option value="2" style="color: #ffc107;">MODERATE</option>
                <option value="3" style="color: #fd7e14;">SEVERE</option>
                <option value="4" style="color: #dc3545;">CRITICAL</option>
            </select>
            
            <label for="started_date">Start Date</label>
            <input type="date" id="started_date" name="started_date" required>

            <button type="submit">Save Disaster</button>
            </form>
            
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