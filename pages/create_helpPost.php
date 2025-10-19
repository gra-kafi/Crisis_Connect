<?php
session_start();
include '../dbConnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create help post</title>
    <link rel="stylesheet" href="../style/addDisaster.css">
</head>

<body>
    <!-- Top Navbar -->
    <header class="top-bar">
        <div>
            <img src="../image/logos/previous.png" width="35px" onclick="window.location.href='../index.php'">
            <h1>Crisis Connect</h1>
        </div>
    </header>


    <!-- White Card Form -->
    <div class="container">
        <div class="card">
            <h1>Help post</h1>
            <form method="post" action="add_helpPost.php">
      
            <label for="post_title">Post Title</label>
            <input type="text" id="post_title" name="post_title" required>
           
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Write something..."></textarea>

            <label for="help_type">Help Type</label>
            <select id="help_type" name="help_type" required>
                <option value="">Select Type</option>
                <?php
                $sql_query = "SELECT * FROM help_types";
                $result = mysqli_query($connect,$sql_query);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value=".$row['help_type_id'].">".$row['help_type']."</option>";
                    }
                } else {
                    echo "No districts found.";
                }
                ?>
            </select>
            
            <label for="contact_name">Contact Name</label>
            <input type="text" id="contact_name" name="contact_name" required>

            <label for="contact_phone_email">Contact Phone/Email</label>
            <input type="text" id="contact_phone_email" name="contact_phone_email" required>

            <label for="union_id">Select Location(union)</label>
            <select id="union_id" name="union_id" required>
                <option value="">Select Union</option>
                <?php
                $sql_query = "SELECT unions.union_id, unions.union_name, disaster_id FROM disaster_areas,unions where active_status = TRUE AND disaster_areas.union_id = unions.union_id";
                $result = mysqli_query($connect,$sql_query);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value=".$row['union_id']."@".$row['disaster_id'].">".$row['union_name']."</option>";
                    }
                } else {
                    echo "No unions found.";
                }
                ?>
            </select>
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