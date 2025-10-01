<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account – Crisis Connect</title>
    <link rel="stylesheet" href="../style/signinNsignup.css">
</head>

<body>
    <!-- Top Navbar -->
    <header class="top-bar">
        <div>
            <span class="brand">Crisis Connect</span>
        </div>
    </header>




    <!-- White Card Form -->
    <div class="container">
        <div class="card">
            <h2>Create Account</h2>
            <p class="subtitle">Sign up to continue</p>

            <form action="signupProcess.php" method="post">
                <label>Name:</label>
                <input type="text" name="name" placeholder="Jhon Uddin Bob" required>
                
                <label>Email Address:</label>
                <input type="email" name="email" placeholder="your@gmail.com" required>

                <label>Phone Number</label>
                <input type="text" name="phone" placeholder="+880 1712345678" required>

                <!-- 🟢 Date of Birth -->
                <label>Date of Birth</label>
                <input type="date" name="dob" required>

                <!-- 🟢 Blood Group -->
                <label>Blood Group</label>
                <select name="blood_group" required>
                    <option value="">Select your blood group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>

                <label>Password</label>
                <input type="password" name="password" placeholder="Create a secure password" required>

                <label>Confirm Password</label>
                <input type="password" name="confirm_password" placeholder="Re-enter your password" required>

                <button type="submit" class="btn">Create Account</button>
            </form>


            <p class="link">
                Already have an account? <a href="signin.php">Sign in</a>
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