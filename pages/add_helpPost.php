v<?php

    include '../dbConnect.php';

    $post_title = $_POST['post_title'];
    $description = $_POST['description'];
    $help_type_id = $_POST['help_type'];
    $contact_name = $_POST['contact_name'];
    $contact_phone_email = $_POST['contact_phone_email'];
    $unionNdisaster  = $_POST['union_id'];
    $arr = explode("@",$unionNdisaster);
    $union_id = $arr[0];
    $disaster_id = $arr[1];

    echo "Title: $post_title<br>";
    echo "Description: $description<br>";
    echo "Help type: $help_type_id<br>";
    echo "Contact name: $contact_name<br>";
    echo "Contact(phone/eamil): $contact_phone_email<br>";
    echo "Union id: $union_id<br>";
    echo "Disaster_id: $disaster_id<br>";

    $sql_insert = "INSERT INTO help_posts
    (help_post_id, disaster_id, titel, description, help_type_id, contact_name, contact_phoneORemail, union_id)
    VALUES
    (UUID(), '$disaster_id', '$post_title', '$description', $help_type_id, '$contact_name', '$contact_phone_email',$union_id)";
    mysqli_query($connect, $sql_insert);

    header("Location: ../index.php");
    exit();

    ?>