<?php
    $disaster_id = $_POST['disaster_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join as Volunteer</title>
    <link rel="stylesheet" href="../style/signinNsignup.css">
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
            <h2>Join As Volunteer</h2>

            <form action="volunteerApplyProcess.php" method="post">
                <label for="info">Info and Skills</label>
                <textarea id="info" name="info" 
                style="
                height: 200px;
                border-radius: 10px;
                padding: 10px;
                " required placeholder="Write about yourself, skills, and experiences..."></textarea>
                <input type="hidden" name="disaster_id" value="<?php echo $disaster_id; ?>">
                <button type="submit" class="btn">Submit</button>
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