<?php
include '../dbConnect.php';
$disaster_id =$_POST['disaster_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['upazilas'])) {
    $selectedUpazilas = $_POST['upazilas'];

    // Convert array to a comma-separated string for SQL IN clause
    $upazilas_ids = implode(",", array_map('intval', $selectedUpazilas));

    // Query to get districts under those divisions
    $sql = "SELECT * FROM unions WHERE upazila_id IN ($upazilas_ids)";
    $result = mysqli_query($connect, $sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select-divitions</title>
    <link rel="stylesheet" href="../style/add_area.css">
</head>

<body>
    <!-- Top Navbar -->
    <header class="top-bar">
        <div>
            <img src="../image/logos/previous.png" width="35px" onclick="window.location.href='admin.php'">
            <h1>Crisis Connect</h1>
        </div>
    </header>


    <!-- White Card Form -->
    <div class="container">
            <div class="card">
            <h1>Select Unions</h1>
            <form action="add_area.php" method="post">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<label = "chekbox-inline">';
                        echo '<input type="checkbox" name="unions[]" value="' . $row['union_id'] . '"> ' . $row['union_name'];
                        echo '</label>';
                    }
                } else {
                    echo "No districts found.";
                }

                // Close the database connection
                mysqli_close($connect);
                ?>
                
                <br>
                <input type="hidden" name="disaster_id" value="<?php echo $disaster_id; ?>">
                <input type="submit" name="submit" value="Submit">
            </form>
            </div>
            
    </div>
    <footer class="footer">
        <div class="footer-left">
            <h2>Crisis Connect</h2>
            <p>
                Real-time disaster response coordination platform connecting
                victims, volunteers, and emergency responders.
            </p>
        </div>
        <div class="footer-middle">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">Report Emergency</a></li>
                <li><a href="#">Volunteer</a></li>
                <li><a href="#">Live Map</a></li>
            </ul>
        </div>
        <div class="footer-right">
            <h3>Contact</h3>
            <p>Email: crisisconnect999@gmail.com</p>
            <p>© 2025 Crisis Connect</p>
        </div>
    </footer>
</body>

</html>
