<?php

    include '../dbConnect.php';

    $team_id = $_POST['team_id'];
    $v_id = $_POST['v_id'];

    $sql_query = "INSERT INTO volunteer_team_members (team_id, volunteer_id, role_id) Values ('$team_id', '$v_id',2)";
    mysqli_query($connect,$sql_query);
    $sql_update = "UPDATE volunteers SET is_available = FALSE WHERE volunteer_id = '$v_id'";
    mysqli_query($connect,$sql_update);
    
    header("Location: vTeamManage.php");
    exit();

?>