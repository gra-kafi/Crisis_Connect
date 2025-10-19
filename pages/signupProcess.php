<?php
    session_start(); 
    include "../dbConnect.php";
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $bgroup = $_POST['blood_group'];
    $pass = $_POST['password'];
    $con_pass = $_POST['confirm_password'];

    $sql_email = "SELECT id FROM users WHERE email = '$email' AND soft_delete = FALSE";
    $result = mysqli_query($connect, $sql_email);
    if (mysqli_num_rows($result) > 0) {
    die("Error: Email already exists.");
    }

    $sql_phone = "SELECT id FROM users WHERE phone = '$phone' AND soft_delete = FALSE";
    $result = mysqli_query($connect, $sql_phone);
    if (mysqli_num_rows($result) > 0) {
    die("Error: Phone number already exists.");
    }

    if ($pass !== $con_pass) {
    die("Error: Password and Confirm Password do not match.");
    }

    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    $sql_insert = "INSERT INTO users (id, password, name, phone, email, dob, bloodGroup, created_by, updated_by)
                    VALUES (UUID(), '$hashed_password', '$name', '$phone', '$email', '$dob', '$bgroup', NULL, NULL)";

    if (mysqli_query($connect, $sql_insert)) {
        echo "User created successfully!";
    } else {
        echo "Error: " . mysqli_error($connect);
    }

    $sql_phone = "SELECT id FROM users WHERE phone = '$phone' AND soft_delete = FALSE";
    $result = mysqli_query($connect, $sql_phone);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];

    $sql_update = "UPDATE users 
    SET created_by = '$user_id', updated_by = '$user_id' 
    WHERE id = '$user_id'";
    mysqli_query($connect, $sql_update);

    $_SESSION['user_id'] = $user_id; 
    $_SESSION['user_name'] = $name; 
    $_SESSION['logged_in'] = true;

    mysqli_close($connect);

    header("Location: ../index.php");
    exit();


?>