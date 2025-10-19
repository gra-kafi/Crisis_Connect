<?php
    session_start();
    include '../dbConnect.php';
    
    $user_id = $_SESSION['user_id'];
    $info = $_POST['info'];
    $disaster_id = $_POST['disaster_id'];

    $sql_insert = "INSERT INTO volunteers (volunteer_id, volunteer_info, disaster_id,created_by, updated_by) VALUES ('$user_id','$info','$disaster_id','$user_id', '$user_id')";
    mysqli_query($connect,$sql_insert);
    
    echo '
        <form id="redirectForm" action="disaster_detail.php" method="post">
            <input type="hidden" name="disaster_id" value="' . htmlspecialchars($disaster_id) . '">
        </form>
        <script>
            document.getElementById("redirectForm").submit();
        </script>
        ';
    exit();
    ?>