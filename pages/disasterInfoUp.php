<?php
    session_start();
    include '../dbConnect.php';
    $disaster_id = $_POST['disaster_id'];
    $a_people = $_POST['a_people'];
    $a_house = $_POST['a_house'];
    $user_id = $_SESSION['user_id'];

    $sql_update = "UPDATE disasters
                    SET affected_people = $a_people,
                    affected_house = $a_house,
                    updated_by = '$user_id'
                    WHERE disaster_id = '$disaster_id'";

    
    mysqli_query($connect,$sql_update);
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