<?php

    session_start();
    include '../dbConnect.php';

    $user_id = $_SESSION['user_id'];
    $amount = $_POST['amount'];
    $TrxID = $_POST['TrxID'];
    $disaster_id = $_POST['disaster'];
    $sql_insert = "INSERT INTO donations (donation_id, donor_id, disaster_id, amount, TrxID) VALUES
                                         ( UUID(), '$user_id', '$disaster_id', $amount, $TrxID)";
    mysqli_query($connect,$sql_insert);
    header("Location: ../index.php");
    exit();
    ?>