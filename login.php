<?php
session_start();
if (isset($_SESSION['Email'])) {
    header("Location: Home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
        <?php
            //New:  Add success massege 
            if(isset($_SESSION['registration_success']))
            {
                echo "<div class='alert alert-success' role='alert'>" ;
                    echo "your register is completed successfully";
                echo "</div>";
            }
             //New:  Add error massege 
            if(isset($_SESSION['login_error']))
            {
                echo "<div class='alert alert-danger' role='alert'>" ;
                    echo $_SESSION['login_error'];
                echo "</div>";
                unset($_SESSION['login_error']);
            }

        ?>
            <h2 class="text-center mb-4">Login</h2>
            <form action="login_process.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-secondary w-100">Login</button>
            </form>
            <div class="text-center mt-3">
                <a href="register.php" class="text-decoration-none">Don't have an account? Register</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>