<?php
    session_start();
    include '../dbConnect.php';

    $disaster_name = $_POST['disaster_name'];
    $disaster_type = $_POST['type_id'];
    $severity_level = $_POST['level_id'];
    $started_date = $_POST['started_date'];
    $user_id = $_SESSION['user_id'];

    $sql_insert = "INSERT INTO disasters 
    (disaster_id, disaster_name, type_id, severity_level,started_at,created_by,updated_by) 
    VALUES 
    (UUID(),'$disaster_name','$disaster_type','$severity_level','$started_date','$user_id','$user_id')";

    $feedback = mysqli_query($connect,$sql_insert);

    if(! $feedback){
        echo "Insertion failed";
    }
     mysqli_close($connect);

    header("Location: admin.php");
    exit();

?>