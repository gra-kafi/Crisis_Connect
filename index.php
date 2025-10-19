<?php
session_start()
?>
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
            <?php if(isset($_SESSION['user_id'])): ?>
            <img src="image/logos/donation.png" onclick="window.location.href='pages/donate.php'">
            <?php endif; ?>
            <?php if (isset($_SESSION['user_id']) and isset($_SESSION['admin'])): ?>
            <span class="mode">USER </span>
            <img src="image/logos/swap.png" onclick="window.location.href='pages/admin.php'">
            <?php endif; ?>
            <img src="image/logos/bell.png">
            <?php if (!isset($_SESSION['user_id'])): ?>
            <img src="image/logos/swap_user.png" onclick="window.location.href='pages/signin.php'">
            <?php else: ?>
            <img src="image/logos/swap_user.png" onclick="window.location.href='pages/profile.php'">
            <?php endif; ?>
        </div>
    </header>


    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <?php if (isset($_SESSION['user_id'])): ?>
        <a href="pages/profile.php">Profile</a>
        <a href="pages/signoutProcess.php">Sign Out</a>
        <?php if(isset($_SESSION['volMem'])): ?>
        <a href="pages/vTeamManage.php">Volunteer Team</a>
        <?php endif;?>
        <?php else: ?>
        <a href="pages/signin.php">Sign In</a>
        <a href="pages/signup.php">Sign Up</a>
        <?php endif; ?>
    </div>



    <!-- Main Content -->
    <main class="container">
        <!-- Left Column -->
        <section class="left-column">
            
            <div class="scrollable-box">
                <h3>View post</h3>
                <div class="scrollable-content">
                    <?php
                    include 'dbConnect.php';
                    $queery = "SELECT name,posts.created_at,content,img_url from posts,users WHERE posts.soft_delete = FALSE AND posts.created_by = users.id ORDER BY created_at DESC;";
                    $result = mysqli_query($connect, $queery);
                    ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <div class="post">
                        <div class="post-header">
                            <img class="profile-pic" src="image/logos/profile-user.png" alt="Profile">
                            <div class="post-info">
                                <span class="author"><?= htmlspecialchars($row['name']) ?></span>
                                <span class="date"><?= htmlspecialchars($row['created_at']) ?></span>
                            </div>
                        </div>
                        <div class="post-content">
                            <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
                             <?php if (!($row['img_url']=="noImage")): ?>
                            <img class="post-image" src="<?= htmlspecialchars($row['img_url']) ?>" alt="Post Image">
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
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
                <?php
                $queery = "SELECT disaster_name,disaster_id,type,level_name,started_at from disasters,disaster_type, severity_levels WHERE ended = FALSE AND disasters.type_id = disaster_type.type_id AND severity_level = level_id ORDER BY started_at DESC;";
                $result = mysqli_query($connect, $queery);
                ?>
                <?php while($row = $result->fetch_assoc()): ?>
                <div class="alert">⚠ <?= htmlspecialchars($row['level_name'])?> <?= htmlspecialchars($row['type'])?>: <?= htmlspecialchars($row['disaster_name'])?><br>Started on: <?= htmlspecialchars($row['started_at']) ?>
                <form action="pages/disaster_detail.php" method="POST" style="text-align: right;">
                <input type="hidden" name="disaster_id" value="<?php echo $row['disaster_id']; ?>">
                <button type="submit" class="cool-btn">View Details</button>
                </div>
                </form>
                <?php endwhile; ?>

            </div>

            <div class="help-post">
                <h3 onclick="window.location.href='pages/create_helpPost.php'">Click for Help Post</h3>
            </div>
            <?php if (isset($_SESSION['user_id'])): ?>
            <div class="post-box">
                <h2>Create Post</h2>
                <form action="pages/upload_post.php" method="POST" enctype="multipart/form-data">

                <textarea id="caption" name="caption" required placeholder="Write something..."></textarea>

                <label for="image">Choose an image (optional)</label>
                <input type="file" id="image" name="image" accept="image/*">

                <button type="submit">Post</button>
                </form>
            </div>
            <?php else: ?>
            <p class="warning">You must be Sign in to create general a post.</p>
            <?php endif; ?>

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