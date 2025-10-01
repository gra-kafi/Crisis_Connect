<?php
session_start();
include '../dbConnect.php';
$caption = $_POST['caption'];
$u= $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle optional image
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $tmpName = $_FILES['image']['tmp_name'];
        $originalName = $_FILES['image']['name'];

        $uploadDir = "image/posts/";
        // Create unique filename
        $uniqueName = time() . '_' . basename($originalName);
        $imagePath = $uploadDir . $uniqueName;

        // Move uploaded file
        if (move_uploaded_file($tmpName, "../".$imagePath)) {
            echo "Image uploaded successfully! <br>";
            echo "Saved at: " . $imagePath;
        } else {
            echo "Failed to upload image.";
        }
        $sql_insert = "INSERT INTO posts (post_id, created_by, content, img_url) VALUES (UUID(),'$u','$caption','$imagePath')";
    }
    else{
        $sql_insert = "INSERT INTO posts (post_id, created_by, content, img_url) VALUES (UUID(),'$u','$caption','noImage')";
    }
}   
if (mysqli_query($connect, $sql_insert)) {
        echo "post created successfully!";
}
else {
        echo "Error: " . mysqli_error($connect);
}

header("Location: ../index.php");
    exit();


?>