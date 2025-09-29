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
    $_SESSION['logged_in'] = true;
    
    mysqli_close($connect);

    header("Location: ../index.html");
    exit();
?>