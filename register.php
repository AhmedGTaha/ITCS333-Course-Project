<?php
session_start();
include('db.php'); // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Register</h2>
            <?php
            // Display error messages
            if (isset($_SESSION['error_register'])) {
                echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error_register'] . "</div>";
                unset($_SESSION['error_register']);
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">UOB Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="12345678@stu.uob.edu.bh" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="e.g. 0123456789" required>
                </div>
                <button type="submit" class="btn btn-secondary w-100">Register</button>
            </form>
            <div class="text-center mt-3">
                <small>Already have an account? <a href="login.php" class="text-primary">Login</a></small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form inputs
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $role = 'student'; // Default role

    // Validate UOB email format
    if (preg_match("/^[0-9]{9}@stu\\.uob\\.edu\\.bh$/", $email)) {
        try {
            // Insert user data into the database
            $sql = "INSERT INTO Users (Email, pass, Name, Phone, role) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$email, $password, $name, $phone, $role]);

            // Set success message and redirect to login
            $_SESSION['registration_success'] = "Registration successful! You can now log in.";
            header("Location: login.php");
            exit();
        } catch (PDOException $e) {
            // Handle database insertion error
            $_SESSION['error_register'] = "Error: Unable to register. Please try again later.";
            header("Location: " . $_SERVER['PHP_SELF']); // Reload registration page
            exit();
        }
    } else {
        // Invalid email format
        $_SESSION['error_register'] = "Invalid UOB email format. Use: 12345678@stu.uob.edu.bh";
        header("Location: " . $_SERVER['PHP_SELF']); // Reload registration page
        exit();
    }
}
?>