<?php
    include '../dbConnect.php';
    $disaster_id = $_POST['disaster_id'];
    echo "$disaster_id";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['unions'])) {
    $selectedUnions = $_POST['unions'];

    // Convert array to a comma-separated string for SQL IN clause
    $union_ids = implode(",", array_map('intval', $selectedUnions));

    // Query to get districts under those divisions
    $sql = "SELECT * FROM unions,upazilas,districts,divisions WHERE union_id IN ($union_ids) AND unions.upazila_id = upazilas.upazila_id AND upazilas.district_id = districts.district_id AND districts.division_id = divisions.division_id ";
    $result = mysqli_query($connect, $sql);
    }

    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
                $sql_insert = "INSERT INTO disaster_areas (disaster_area_id, disaster_id, division_id, district_id, upazila_id, union_id) VALUES ( UUID(), '$disaster_id',". $row['division_id'].", ". $row['district_id'].",".$row['upazila_id'].",".$row['union_id'].")";
                mysqli_query($connect, $sql_insert);
            } 
    }
    else {
        echo "No districts found.";
    }

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