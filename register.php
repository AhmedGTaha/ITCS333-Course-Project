<?php
// New: Add sesstion start
session_start();
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
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
            <div class="card-header text-center bg-danger text-white">
                <h4>Register</h4>
            </div>
            <div class="card-body">
            <?php
            //New:  Add Error for Rigester massege 
            if(isset($_SESSION['error_register']))
            {
                echo "<div class='alert alert-danger' role='alert'>" ;
                    echo $_SESSION['error_register'];
                echo "</div>";
                unset($_SESSION['error_register']);
            }

           ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <!-- UOB Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">UOB Email</label>
                        <input type="email" class="form-control" id="email" placeholder="ID@stu.uob.edu.bh" name="email" required>
                    </div>
                    <!-- Password Field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
                    </div>
                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
                    </div>
                    <!-- Phone Field -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" placeholder="e.g. 0123456789" name="phone" required>
                    </div>
                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-secondary">Register</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <small>Already have an account? <a href="login.php" class="text-primary">Login</a></small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    session_start();
    include ('db.php');

    // Get the email, password, name, phone from the form
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $role = 'student';

    // Validate the email format
    if (preg_match("/^[0-9]{9}@stu\\.uob\\.edu\\.bh$/", $email)) 
    {
        // Insert into database
        try
        {
            $sql = "INSERT INTO Users (Email, pass, Name, Phone, role) VALUES (?, ?, ?, ?, ?)";
            $statement = $conn->prepare($sql);
            $statement->execute([$email, $password, $name, $phone, $role]);
            $_SESSION['registration_success'] = "Registration successful. You can now log in.";
            header("Location: login.php");
            exit();
        } catch (PDOException $e) 
        {
            echo '<br><div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . '</div>';
        }
    } 
    else 
    {
        // Invalid email format error
        echo '<br><div class="alert alert-danger" role="alert">Invalid UOB email format. Example: 12345678@stu.uob.edu.bh</div>';
    }
}
?>
