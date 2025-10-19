<?php
    session_start(); 
    include "../dbConnect.php";

    $phone = $_POST['phone'];
    $pass = $_POST['password'];

    $sql = "SELECT id, password, name, email, soft_delete FROM users WHERE phone = ? LIMIT 1";
    $stmt = mysqli_prepare($connect, $sql);
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($connect));
    }

    // bind and execute
    mysqli_stmt_bind_param($stmt, "s", $phone);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // if no row, invalid credentials
    if (mysqli_stmt_num_rows($stmt) === 0) {
        mysqli_stmt_close($stmt);
        mysqli_close($connect);
        die("Invalid phone or password.");
    }

    mysqli_stmt_bind_result($stmt, $id, $hashedPass, $name, $email, $soft_delete_flag);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if (!password_verify($pass, $hashedPass)) {
        mysqli_close($connect);
        die("Invalid phone or password.");
    }


    $_SESSION['user_id'] = $id; 
    $_SESSION['user_name'] = $name; 

    $sql_query = "SELECT role FROM users WHERE id = '$id'";
    $result = mysqli_query($connect,$sql_query);
    $result = mysqli_fetch_assoc($result);
    $_SESSION['logged_in'] = true;

    if($result['role'] == 'Admin')
    $_SESSION['admin'] = TRUE;

    $sql_query = "SELECT volunteer_id FROM volunteers WHERE volunteer_id = '$id' ";
    $result = mysqli_query($connect,$sql_query);
    if(mysqli_num_rows($result)>0)
    $_SESSION['vol'] = TRUE;

    $sql_query = "SELECT volunteer_id FROM volunteer_team_members WHERE volunteer_id = '$id' ";
    $result = mysqli_query($connect,$sql_query);
    if(mysqli_num_rows($result)>0)
    $_SESSION['volMem'] = TRUE;
    
    mysqli_close($connect);

    header("Location: ../index.php");
    exit();
?>