<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donotion</title>
    <link rel="stylesheet" href="../style/signinNsignup.css">
</head>

<body>
    <!-- Top Navbar -->
    <!-- <header class="top-bar">
        <div>
            <span>Crisis Connect</span>
        </div>
    </header> -->

    <header class="top-bar">
        <div>
            <img src="../image/logos/previous.png" width="35px" onclick="window.location.href='../index.php'">
            <h1>Crisis Connect</h1>
        </div>
    </header>


    <!-- White Card Form -->
    <div class="container">
        <div class="card">
            <h2>Donotion</h2>
            <p class="subtitle">Scan the QR code to Donate</p>
            <img src="../Image/logos/QR.jpeg" style="width:100%; border-radius:10px">

            <form action="donotionProcess.php" method="post">
                
                <label>Amount</label>
                <input type="number" name="amount"required>

                <label>Transaction ID(TrxID)</label>
                <input type="text" name="TrxID" required>

                <label>Select Disaster</label>
                <select name="disaster" required>
                <option value="NULL">Select Disaster</option>
                <?php
                include '../dbConnect.php';
                $sql_query = "SELECT disaster_name,disaster_id FROM disasters WHERE ended = FALSE";
                $result = mysqli_query($connect,$sql_query);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value=".$row['disaster_id'].">".$row['disaster_name']."</option>";
                    }
                } else {
                    echo "<option value= NULL > others </option>";
                }
                ?>
            </select>


                <button type="submit" class="btn">Donate</button>
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