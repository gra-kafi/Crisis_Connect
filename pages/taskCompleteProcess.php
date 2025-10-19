<?php

    include '../dbConnect.php';

    $task_id = $_POST['task_id'];
    $sq_update = "UPDATE volunteer_team_tasks 
                    SET is_panding = FALSE
                    WHERE task_id = '$task_id'";

    mysqli_query($connect,$sq_update);

    header("Location: vTeamManage.php");
    exit();
?>