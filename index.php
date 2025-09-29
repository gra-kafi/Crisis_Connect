<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crisis Connect</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <!-- Top Bar -->
    <!-- 3-dot menu icon inside header (already added) -->
    <header class="top-bar">
        <div class="menu-icon" onclick="toggleSidebar()">⋯</div>
        <h1>Crisis Connect</h1>
        <div class="icons">
            <span class="mode">Mode</span>
            <span class="bell">🔔</span>
            <span class="user" onclick="window.location.href='pages/signin.php'">👤</span>
        </div>
    </header>


    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">

        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
    </div>



    <!-- Main Content -->
    <main class="container">
        <!-- Left Column -->
        <section class="left-column">
            <div class="post-box">
                <textarea placeholder="Share an update or request help ..."></textarea>
                <div class="file-upload">
                    <input type="file" id="fileInput">
                </div>
                <button class="post-btn">Post</button>

            </div>

            <div class="scrollable-box">
                <h3>View post</h3>
                <div class="scrollable-content">
                    <!-- Posts go here -->
                </div>
            </div>
        </section>

        <!-- Right Column -->
        <section class="right-column">
            <div class="weather">
                <h3>Today's weather</h3>
                <p>Rainy, 33 °C</p>
            </div>

            <div class="current-disasters">
                <h3>Current Disasters</h3>
                <ul>
                    <li>⚠ Flood in Northern Region</li>
                    <li>⚠ Cyclone on East Coast</li>
                </ul>
            </div>

            <div class="help-posts">
                <h3>Help Posts</h3>
                <div class="scrollable-content">
                    View scrollable post
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
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
                <li><a href="index.php">Home</a></li>
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
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("active");
        }
    </script>

</body>

</html>