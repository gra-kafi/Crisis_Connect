<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
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
            <h2>Sign-in</h2>
            <p class="subtitle">Sign-in to continue</p>

            <form action="signinProcess.php" method="post">
                
                <label>Phone Number</label>
                <input type="text" name="phone" placeholder="+880 1712345678" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Create a secure password" required>


                <button type="submit" class="btn">Login</button>
            </form>


            <p class="link">
                Don't have an account? <a href="signup.php">Sign up</a>
            </p>
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