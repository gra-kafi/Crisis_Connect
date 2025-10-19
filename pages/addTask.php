<?php

    include '../dbConnect.php';

    $team_id = $_POST['team_id'];
    $task_title = $_POST['task_title'];
    $task_details = $_POST['info'];
    $due_date = $_POST['due_date'];

    $sql_insert = "INSERT INTO volunteer_team_tasks (task_id, team_id, task_title, task_description, due_date)
                                            VALUES
                                                    (UUID(), '$team_id', '$task_title', '$task_details','$due_date')";
    
    mysqli_query($connect,$sql_insert);

    header("Location: vTeamManage.php");
    exit();


?>