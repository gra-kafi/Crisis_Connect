<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crisis Connect</title>
  <link rel="stylesheet" href="../style/admin.css">
</head>
<body>
<!-- Top Bar -->
    <!-- 3-dot menu icon inside header (already added) -->
    <header class="top-bar">
        <div class="menu-icon" onclick="toggleSidebar()">⋯</div>
        <h1>Crisis Connect</h1>
        <div class="icons">
            <?php if (isset($_SESSION['user_id'])): ?>
            <span> Signed in as</span>
            <span class="mode">USER</span>
            <?php endif; ?>
            <span class="bell">🔔</span>
            <?php if (!isset($_SESSION['user_id'])): ?>
            <span class="user" onclick="window.location.href='pages/signin.php'">👤</span>
            <?php else: ?>
            <span class="user" onclick="window.location.href='pages/profile.php'">👤</span>
            <?php endif; ?>
        </div>
    </header>


    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <?php if (isset($_SESSION['user_id'])): ?>
        <a href="pages/profile.php">Profile</a>
        <a href="pages/myPosts.php">My posts</a>
        <a href="pages/signoutProcess.php">Sign Out</a>
        <?php else: ?>
        <a href="pages/signin.php">Sign In</a>
        <a href="Pages/signup.php">Sign Up</a>
        <?php endif; ?>
    </div>


  <!-- Main Layout -->
  <main class="container">

    <!-- Left Side -->
    <section class="left">

      <!-- Status -->
      <div class="card">
        <h2>Status</h2>
        <div class="row">
          <div>
            <p>Active User: 12</p>
            <p>Active Disaster: 2</p>

            <p>Help Signal: 80</p>
            <p>Volunteer: Available</p>
            <p>Funds: 1000000</p>
          </div>
        </div>
      </div>

      <!-- Help Post -->
      <div class="card">
        <h2>Help post</h2>
        <div class="row">
          <div>
            <p>Rescue: 40</p>
            <p>Donation: 10000</p>

            <p>Shelter: 25</p>
            <p>Medical: 3</p>
          </div>
        </div>
      </div>

      <!-- Recent Activity -->
      <div class="card">
        <h2>Recent activity</h2>
        <div class="row">
          <div>
            <p>Disaster Alerts: 2</p>
            <p>Blood Request: 17</p>

            <p>New Help Post: 5</p>
            <p>New User Register: 11</p>
          </div>
        </div>
      </div>

    </section>

    <!-- Right Sidebar -->
    <aside class="sidebar">

      <!-- Weather -->
      <div class="sidebar-section">
        <h2>Today's weather</h2>
        <p>Rainy, 33 ℃</p>
      </div>

      <!-- Current Disasters -->
      <div class="sidebar-section">
        <h2>Current Disasters</h2>
        <div class="alert">⚠ Flood in Northern Region</div>
        <div class="alert">⚠ Cyclone on East Coast</div>
      </div>

      <!-- Help Signals -->
      <div class="sidebar-section">
        <h2>Help Signals</h2>
        <div class="alert">⚠ Flood in Northern Region</div>
        <div class="alert">⚠ Cyclone on East Coast</div>
      </div>

      <!-- Charts -->
      <div class="sidebar-section">
        <h2>Charts</h2>
        <button class="option-btn">Option</button>
        <div class="chart-box"></div>
      </div>

    </aside>

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
