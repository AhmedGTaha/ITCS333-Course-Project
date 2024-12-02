<?php

session_start();

include ("db.php");



  // Check if form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if email exists in the database
   
    if ($stmt = $conn->prepare("SELECT * FROM Users WHERE Email = :email"))
     {
        $stmt->bindParam(":email", $email);
        $stmt->execute();
       // Fetch user details
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
   
        if ($user == true) 
        {
        
            // Verify the password
            if (password_verify($password, $user['pass'])) 
            {
                // Set session variables
                $_SESSION['email'] = $user['Email'];
                $_SESSION['name'] = $user['Name'];
                
                // Redirect to student or admin dashboard based on role
                if($user['role'] == 'student')
                {
                    header("Location: Home.php");
                }else
                {
                  header("Location: admin.php");
                }

            } else 
            {
                $_SESSION['login_error'] = "Invalid password. Please try again.";
                header("Location: login.php");
            }
        } else 
        {
            $_SESSION['login_error'] = "No account found with this email.";
            header("Location: login.php");
        }

    } else
    {
        $_SESSION['login_error'] = "Database query error. Please try again later.";
        header("Location: login.php");
    }
        
}else
{
  header("Location: login.php");
  exit();
}






?>