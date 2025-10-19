<?php
    session_start();
    include '../dbConnect.php';

    $disaster_id = $_POST['disaster_id'];
    $user_id = $_SESSION['user_id'];
    $team_name = $_POST['team_name'];
    
    $sql_inser = "INSERT INTO (team_id, team_name, leader_id, disaster_id, created_by, dupdated_by) VALUES
                                (UUID(),'$team_name','$user_id','$disaster_id','$user_id','$user_id')";

    mysqli_query($connect,$sql_inser);
     $_SESSION['volMem'] = TRUE;
    

    ?>