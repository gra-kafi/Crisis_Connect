<?php
session_start();
include '../dbConnect.php';
if(isset($_SESSION['user_id']))
$user_id = $_SESSION['user_id'];
$disaster_id =$_POST['disaster_id'];
$query = "SELECT disaster_name, level_name, affected_people, affected_house, type, started_at FROM disasters, severity_levels, disaster_type WHERE disaster_id = '$disaster_id' AND severity_level = level_id AND disasters.type_id = disaster_type.type_id";
$result = mysqli_query($connect, $query);
$disaster = mysqli_fetch_assoc($result);
$affected_people = $disaster['affected_people'];
$affected_house = $disaster['affected_house'];
$date = new DateTime($disaster['started_at']);
$formatted_date = $date->format('d M Y');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add-disaster</title>
    <link rel="stylesheet" href="../style/disaster_detail.css">
</head>

<body>
    <!-- Top Navbar -->
    <header class="top-bar">
        <div>
            <?php if(isset($_SESSION['admin'])): ?>
            <img src="../image/logos/previous.png" width="35px" onclick="window.location.href='admin.php'">
            <?php else:?>
            <img src="../image/logos/previous.png" width="35px" onclick="window.location.href='../index.php'">
            <?php endif; ?>
            <h1>Crisis Connect</h1>
        </div>
    </header>

    <div class="container">
        
        <h1>⚠ Disaster Details</h1>

        <div class="grid-layout">
        <!-- LEFT COLUMN -->
        <div class="column">
            <div class="card">
            <h2><?php echo $disaster['disaster_name']; ?></h2>
            <p><strong>Type:</strong> <?php echo $disaster['type']; ?></p>
            <p><strong>Severity:</strong> <?php echo $disaster['level_name']; ?></p>
            <p><strong>Status:</strong> Ongoing</p>
            <p><strong>Started On:</strong> <?php echo $formatted_date; ?></p>
            <p><strong>Ended On:</strong> N/A</p>
            </div>

            <div class="card">
            <h3>Affected Areas</h3>
                <?php
                $sql = "SELECT union_name FROM disaster_areas, unions WHERE disaster_id = '$disaster_id' AND  disaster_areas.union_id = unions.union_id";
                $result = mysqli_query($connect, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo  '<p class ="unions" >'.$row['union_name']."</p>";
                    }        
                }
                else {
                    echo "<p class = 'unions'>No districts found.</p>";
                }
                ?>
                <?php if(isset($_SESSION['admin'])): ?>
                <div class="button-row">
                    <form action="add_division.php" method="POST">
                        <input type="hidden" name="disaster_id" value="<?php echo $disaster_id; ?>">
                        <button type="submit" class="addArea">Add Areas</button>
                    </form>

                    <form action="another_action.php" method="POST">
                        <input type="hidden" name="disaster_id" value="<?php echo $disaster_id; ?>">
                        <button type="submit" class="removeArea">Remove Areas</button>
                    </form>
                </div>
                <?php endif; ?>
            </div>
            <?php if(isset($_SESSION['admin'])): ?>
            <div style="border-radius: 10px; padding:15px; text-align:center; width:95%;height:50px; margin:auto;">
                <form action="endDisaster.php" method="POST">
                    <input type="hidden" name="disaster_id" value="<?php echo $disaster_id; ?>">
                    <button class="addArea" type="submit" class="removeArea">End disaster</button>
                </form>
            </div>
            <?php endif; ?>
            
        </div>

        

        <!-- RIGHT COLUMN -->
        <div class="column">
            <div class="card">
            <h3>Impact</h3>
            <ul>
                <li><strong>People Affected:</strong> <?php echo "$affected_people" ?></li>
                <li><strong>Homes Destroyed:</strong> <?php echo "$affected_house" ?></li>
            </ul>
            <?php if(isset($_SESSION['admin'])): ?>
            <div>
                <form action="disasterInfoUp.php" method="POST">
                    <label>Updated no. of Affected People</label><br>
                    <input type="number" name="a_people"><br>

                    <label>Updated no. of Affected Houses</label><br>
                    <input type="number" name="a_house"><br>

                    <input type="hidden" name="disaster_id" value="<?php echo $disaster_id; ?>">
                    <button type="submit">Update Info</button>
                </form>

            </div>
            <?php endif; ?>
            </div>

            <div class="card">
            <h3>Volunteer Teams</h3>
                <?php
                $sql = "SELECT team_name FROM volunteer_teams WHERE disaster_id = '$disaster_id' AND  active_status = TRUE";
                $result = mysqli_query($connect, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo  '<p class ="unions" >'.$row['team_name']."</p>";
                    }        
                }
                else {
                    echo "<p class = 'unions'>No Teams found.</p>";
                }
                ?>

                <?php if(isset($_SESSION['logged_in']) AND !isset($_SESSION['vol']) AND !isset($_SESSION['volMem'])): ?>
                <div class="button-row">
                     <form action="volunteerApplyForm.php" method="POST">
                        <input type="hidden" name="disaster_id" value="<?php echo $disaster_id; ?>">
                        <button type="submit" class="addArea">Join as volunteer</button><br>
                    
                   </form>
                </div>
                <div class="button-row">
                
                   <form action="addVteam.php" method="POST">
                        <label>Team name:</label>
                        <input type="text" name="teamName" placeholder="xyz" required><br>

                        <input type="hidden" name="disaster_id" value="<?php echo $disaster_id; ?>">
                        <button type="submit" class="addArea">Create Team</button>
                
                   </form>
                </div>
                 <?php endif; ?>
            </div>
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