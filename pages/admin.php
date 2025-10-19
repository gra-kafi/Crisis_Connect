<?php
session_start();
include '../dbConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin page</title>
  <link rel="stylesheet" href="../style/admin.css">
</head>
<body>
<!-- Top Bar -->
    <!-- 3-dot menu icon inside header (already added) -->
    <header class="top-bar">
      
        <h1>Crisis Connect</h1>
        <div class="icons">
            <?php if (isset($_SESSION['user_id'])): ?>
            <span class="mode">Admin</span>
            <img src="../image/logos/swap.png" onclick="window.location.href='../index.php'">
            <?php endif; ?>
            <img src="../image/logos/bell.png">
            <img src="../image/logos/swap_admin.png" width="35px" onclick="window.location.href='profile.php'">
        </div>
    </header>

  <!-- Main Layout -->
  <main class="container">

    <!-- Left Side -->
    <section class="left">

      <!-- Status -->
      <div class="card">
        <h2>Status</h2>
        <div class="row">
          <div>
            <?php
            $sql_query = "SELECT count(id) as user_num FROM users WHERE soft_delete = FALSE ";
            $result = mysqli_query($connect, $sql_query);
            $row = $result->fetch_assoc();
            ?>
            <p>Active User: <?= htmlspecialchars($row['user_num'])?></p>
            
            <?php
            $sql_query = "SELECT count(disaster_id) as disaster_num FROM disasters WHERE ended = FALSE ";
            $result = mysqli_query($connect, $sql_query);
            $row = $result->fetch_assoc();
            ?>
            <p>Active Disaster: <?= htmlspecialchars($row['disaster_num'])?></p>
            
            <?php
            $sql_query = "SELECT count(help_post_id) as help_post_num FROM help_posts,disasters WHERE disasters.disaster_id =help_posts.disaster_id AND ended = FALSE ";
            $result = mysqli_query($connect, $sql_query);
            $row = $result->fetch_assoc();
            ?>
            <p>Help Signal: <?= htmlspecialchars($row['help_post_num'])?></p>
            
            <?php
            $sql_query = "SELECT sum(amount) as donation FROM donations WHERE is_varified = TRUE ";
            $result = mysqli_query($connect, $sql_query);
            $row = $result->fetch_assoc();
            ?>
            <p>Funds:<?= htmlspecialchars($row['donation'])?></p>
          </div>
        </div>
      </div>

      <!-- Help Post -->
      <div class="card">
        <h2>Help post</h2>
        <?php
            $sql_query = "SELECT help_type,description,union_name,contact_name,contact_phoneORemail FROM help_posts,help_types,unions,disasters WHERE disasters.disaster_id =help_posts.disaster_id AND ended = FALSE AND help_posts.union_id = unions.union_id AND help_posts.help_type_id = help_types.help_type_id";
            $result = mysqli_query($connect, $sql_query);
        ?>
        <div class="scrollable tasks-scroll">
        <?php
        if( mysqli_num_rows($result)>0):?>
        <table style="width: 100%">
        <tr>
          <th style="width: 10%;">Help type</th>
          <th style="width: 50%;">Description</th>
          <th style="width: 10%;">Union</th>
          <th style="width: 20%;">Contact Name</th>
          <th style="width: 10%;">Contact</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td class="task-item"><?= htmlspecialchars($row['help_type'])?></td>
          <td class="task-item"><?= htmlspecialchars($row['description'])?></td>
          <td class="task-item"><?= htmlspecialchars($row['union_name'])?></td>
          <td class="task-item"><?= htmlspecialchars($row['contact_name'])?></td>
          <td class="task-item"><?= htmlspecialchars($row['contact_phoneORemail'])?></td>
        </tr>
        <?php endwhile; ?>
        </table>
        <?php else:?>
            <div class="task_item">No Task Avaiable</div>
        <?php endif;?>
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
      
      <div class="help-post" onclick="window.location.href = 'addDisaster.php'">
        <h3>Add new Disaster</h3>
      </div>

      <!-- Current Disasters -->
      <div class="sidebar-section">
        <h2>Current Disasters</h2>
        <div class ="scrollable">
          <?php
           
            $queery = "SELECT disaster_id,disaster_name,type,level_name,started_at from disasters,disaster_type, severity_levels WHERE ended = FALSE AND disasters.type_id = disaster_type.type_id AND severity_level = level_id ORDER BY started_at DESC;";
            $result = mysqli_query($connect, $queery);
          ?>
          <?php while($row = $result->fetch_assoc()): ?>
          <div class="alert">
              ⚠ <?= htmlspecialchars($row['level_name'])?> <?= htmlspecialchars($row['type'])?>: <?= htmlspecialchars($row['disaster_name'])?> Started on: <?= htmlspecialchars($row['started_at']) ?>
              
              <form action="disaster_detail.php" method="POST" style="text-align: right;">
                <input type="hidden" name="disaster_id" value="<?php echo $row['disaster_id']; ?>">
                <button type="submit" class="cool-btn">View Details</button>
              </form>
          </div>
          <?php endwhile; ?>
        </div>

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
</body>
</html>
