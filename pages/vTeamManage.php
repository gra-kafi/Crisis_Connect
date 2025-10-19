<?php
    session_start();
    include "../dbConnect.php";
    $user_id = $_SESSION['user_id'];
    $sql_query = "SELECT distinct volunteer_team_members.team_id, volunteer_teams.team_name, disaster_name From volunteer_team_members,volunteer_teams,disasters WHERE volunteer_team_members.volunteer_id = '$user_id' and volunteer_teams.active_status = TRUE and  volunteer_teams.disaster_id = disasters.disaster_id ";
    $result = mysqli_query($connect,$sql_query);
    $team_info = mysqli_fetch_assoc($result);
    $team_name = $team_info['team_name'];
    $team_id = $team_info['team_id'];
    $disaster_name = $team_info['disaster_name'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Management</title>
    <link rel="stylesheet" href="../style/vTeamManage.css">
</head>

<body>

    <header class="top-bar">
        <div>
            <img src="../image/logos/previous.png" width="35px" onclick="window.location.href='../index.php'">
            <h1>Crisis Connect</h1>
        </div>
    </header>

     <h1>Team Management</h1>
    <div class="container">
        <!-- Column 1: Tasks -->
        <div class="column">

         <div class="section tasks">
                <h2>Team info</h2>
                <div class="task-item">

                  Team name: <?php echo "$team_name"; ?><br>
                  Disaster: <?php echo "$disaster_name"; ?><br>
                  <?php
                  $sql_query = "SELECT count(volunteer_id) as memnum FROM volunteer_team_members WHERE team_id = '$team_id'  ";
                  $result = mysqli_query($connect,$sql_query);
                  $result = mysqli_fetch_assoc($result);
                  $memNum = $result['memnum'];
                  ?>
                  Current Member: <?php echo "$memNum";?><br>
                </div>
            </div>

            <div class="section tasks">
                <h2>Tasks</h2>
                <?php
                $sql_query = "SELECT task_id, task_title, task_description, due_date FROM volunteer_team_tasks WHERE team_id = '$team_id' and is_panding = TRUE ORDER BY due_date";
                $result = mysqli_query($connect,$sql_query);
                ?>
                <div class="scrollable tasks-scroll">
                <?php
                if( mysqli_num_rows($result)>0):?>
                    <table style="width: 100%">
                    <tr>
                        <th style="width: 30%;">Title</th>
                        <th style="width: 35%;">Description</th>
                        <th style="width: 20%;">Due_date</th>
                        <th style="width: 15;"></th>
                    </tr>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="task-item"><?= htmlspecialchars($row['task_title'])?></td>
                            <td class="task-item"><?= htmlspecialchars($row['task_description'])?></td>
                            <td class="task-item"><?= htmlspecialchars($row['due_date'])?></td>
                            <td>
                                <form action="taskCompleteProcess.php" method="post">
                                    <input type="hidden" name="task_id" value="<?= htmlspecialchars($row['task_id'])?>"">
                                    <button type="submit" class="addMem" name="submit" style="padding: 0px; width:100%; height:50px; margin: 0px">Pending</button></td>
                                </form>
                            </tr>
                            <?php endwhile; ?>
                    </table>
                    <?php else:?>
                    <div class="task_item">No Task Avaiable</div>
                    <?php endif;?>
                </div>

            </div>

            <div class="new-task">
                <h2>Create New Task</h2>
                <form action="addTask.php" method="POST">
                    <label><h6>Task Title</h6></label>
                    <input type="text" name="task_title" style="width: 100%;" required><br>
                    <label><h6>Task Details</h6></label>
                    <textarea name="info" 
                    style="
                    height: 100px;
                    width: 100%;
                    border-radius: 10px;
                    padding: 10px;
                    " required placeholder="Write about task..."></textarea><br>
                    <label><h6>Due Date</h6></label>
                    <input type="date" name="due_date" required><br>
                    <input type="hidden" name="team_id" value="<?= $team_id ?>">
                    <button>Add Task</button>
                </form>
            </div>
        </div>

        <!-- Column 2: Team Members -->
        <div class="column">
            <div class="section members">
                <?php
                $sql_query = "SELECT name,role_name FROM volunteer_team_members, users, volunteer_roles WHERE volunteer_id = id and team_id = '$team_id' and volunteer_roles.role_id = volunteer_team_members.role_id  ";
                $result = mysqli_query($connect,$sql_query);
                ?>
                <h2>Current Team Members</h2>
                <div class="scrollable members-scroll">
                    <table style="width: 100%">
                    <tr>
                        <th style="width: 70%;">Name</th>
                        <th style="width: 30%;">Role</th>
                    </tr>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr">
                            <td class="member-item"><?= htmlspecialchars($row['name'])?></td>
                            <td class="member-item"><?= htmlspecialchars($row['role_name'])?></td>
                            </tr>
                            <?php endwhile; ?>
                    </table>
                </div>
            </div>

            <div class="section available">
                <h2>Available Members</h2>
                <?php
                    $sql_query = "SELECT name,volunteer_id, volunteer_info FROM volunteers, users WHERE volunteer_id = id and is_available = TRUE";
                    $result = mysqli_query($connect,$sql_query);
                ?>
                <div class="scrollable available-scroll">
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="available-item"><?= htmlspecialchars($row['name'])?><br><b>Info:</b><br><?= htmlspecialchars($row['volunteer_info'])?></div>
                        <form action="addVme.php" method="POST">
                            <input type="hidden" name="team_id" value="<?= $team_id ?>">
                            <input type="hidden" name ="v_id" value="<?= htmlspecialchars($row['volunteer_id'])?>">
                            <button type="submit" class="addMem">Add as member</button>
                        </form>

                    <?php endwhile; ?>
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