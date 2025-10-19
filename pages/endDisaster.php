<?php

    include '../dbConnect.php';
    $disaster_id = $_POST['disaster_id'];
    echo "$disaster_id";
    
    $sql_update = "UPDATE disasters SET ended= TRUE WHERE disaster_id = '$disaster_id'";
    mysqli_query($connect, $sql_update);

    header("Location: admin.php");
    exit();

?>
