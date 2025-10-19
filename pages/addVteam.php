<?php

    session_start();
    include '../dbConnect.php';

    $user_id = $_SESSION['user_id'];
    $disaster_id = $_POST['disaster_id'];
    $teamName = $_POST['teamName'];
    
    $sql_insert = "INSERT INTO volunteer_teams (team_id, team_name, leader_id, disaster_id, created_by, updated_by)
                                        VALUES (UUID(), '$teamName', '$user_id', '$disaster_id', '$user_id', '$user_id')";

    mysqli_query($connect, $sql_insert);

    $sql_query = "SELECT team_id FROM volunteer_teams Where leader_id = '$user_id'";
    $result = mysqli_query($connect, $sql_query);

    $row = mysqli_fetch_assoc($result);
    $team_id = $row['team_id'];
    $sql_insert = "INSERT INTO volunteer_team_members (role_id, team_id, volunteer_id) VALUES (1,'$team_id','$user_id')";
    mysqli_query($connect, $sql_insert);

   
    echo '
        <form id="redirectForm" action="disaster_detail.php" method="post">
            <input type="hidden" name="disaster_id" value="' . htmlspecialchars($disaster_id) . '">
        </form>
        <script>
            document.getElementById("redirectForm").submit();
        </script>
        ';
    exit();

?>