<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account – Crisis Connect</title>
    <link rel="stylesheet" href="../style/create-account.css">
</head>

<body>
    <!-- Top Navbar -->
    <header class="header">
        <div class="logo-title">
            <span class="brand">Crisis Connect</span>
        </div>
    </header>




    <!-- White Card Form -->
    <div class="container">
        <div class="card">
            <h2>Sign-in</h2>
            <p class="subtitle">Sign-in to continue</p>

            <form action="signinProcess.php" method="post">
                
                <label>Phone Number</label>
                <input type="tel" name="phone" placeholder="+880 1712345678" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Create a secure password" required>


                <button type="submit" class="btn">Login</button>
            </form>


            <p class="link">
                Don't have an account? <a href="create-account.php">Sign up</a>
            </p>
        </div>
    </div>
</body>

</html>