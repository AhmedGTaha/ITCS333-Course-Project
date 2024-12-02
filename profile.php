<?php

session_start();
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <title>User Profile Management</title>
    <style>
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
      }
      header {
        background-color: #ffffff;
        padding: 20px 0;
        border-bottom: 1px solid #ddd;
      }
      .profile-container {
        max-width: 800px;
        margin: 40px auto;
        background-color: #ffffff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }
      .profile-picture {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ddd;
      }
      .form-control {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
      }
      .form-control:focus {
        background-color: #ffffff;
        border-color: #6c757d;
        box-shadow: none;
      }
      .btn-primary {
        background-color: #6c757d;
        border-color: #6c757d;
      }
      .btn-primary:hover {
        background-color: #5a6268;
      }
      footer {
        background-color: #333;
        color: white;
        padding: 20px 0;
        margin-top: 40px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
          <!-- Logo -->
          <a class="navbar-brand" href="Home.php">
            <img
              src="https://incubator.uob.edu.bh/wp-content/uploads/2022/11/LOGO_Final_S-1-e1669184877957.png"
              height="30"
              alt="UOB Logo"
              loading="lazy"
            />
            IT Room Booking
          </a>
          <!-- Navbar toggle button -->
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Navbar links -->
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="browse.php">Browse Rooms</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
            </ul>
            <!-- Profile dropdown -->
            <div class="dropdown">
              <a
                class="dropdown-toggle d-flex align-items-center"
                href="#"
                id="profileDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  src="<?php echo $_SESSION['profile_picture'] ?? 'https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg'; ?>"
                  class="rounded-circle"
                  height="25"
                  alt="Profile Avatar"
                  loading="lazy"
                />
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="profileDropdown"
              >
                <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                <li><a class="dropdown-item" href="home.php">My Rooms</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
  
    <!-- Header -->
    <header class="text-center">
      <div class="container">
        <h1>User Profile Management</h1>
        <p class="lead">View and edit your profile details</p>
      </div>
    </header>

    <!-- Profile Container -->
    <div class="profile-container">
      <div class="text-center mb-4">
      <img
        src="<?php echo $_SESSION['profile_picture'] ?? 'https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg'; ?>"
        alt="User Profile Picture"
        class="profile-picture"
      />
  <form method="POST" enctype="multipart/form-data" class="mt-3" action="profile.php">
    <input type="file" class="form-control" name="profile_picture" accept="image/*" />
    <button type="submit" name="upload_picture" class="btn btn-primary mt-2">Upload Picture</button>
  </form>
      </div>
      <form action="profile.php" method="POST">
        <!-- Name -->
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input
            type="text"
            id="name"
            class="form-control"
            placeholder="Enter your full name"
            name="name"
          />
        </div>
        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input
            type="email"
            id="email"
            class="form-control"
            placeholder="Enter your email"
            name="email"
          />
        </div>
         <!-- password -->
         <div class="mb-3">
          <label for="email" class="form-label">password</label>
          <input
            type="password"
            id="password"
            class="form-control"
            placeholder="Enter your new password"
            name="password"
          />
        </div>
        <!-- Phone -->
        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input
            type="tel"
            id="phone"
            class="form-control"
            placeholder="Enter your phone number"
             name="phone"
          />
        </div>
        <!-- Update Profile Button -->
        <div class="text-center">
          <button type="submit" class="btn btn-primary" name="updateProfile">Update Profile</button>
        </div>
      </form>
    </div>

    <!-- Footer -->
    <footer>
      <p>&copy; 2024 IT College Room Booking System | All Rights Reserved</p>
    </footer>

      <script></script>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateProfile'])) 
{
  
  include("db.php");

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $current_email = $_SESSION['email'];

  if(!empty($name))
  {
    try
    {
        $sql = "Update Users set Name = '$name' where Email = '$current_email'";
        $statment = $conn->prepare($sql);
        $statment->execute();
        echo "<script>alert('Your name Update sucssesfully')</script>";
        $_SESSION['name'] = $name;
      
    } catch(PDOException $e) 
    {
        echo $sql . "<br>" . $e->getMessage();
    }

  }


  if(!empty($email))
  {
    if (preg_match("/^[0-9]{9}@stu\.uob\.edu\.bh$/", $email)) 
    {
        // Update database
     try
    {
        $sql = "Update Users set Email = '$email' where Email = '$current_email'";
        $statment = $conn->prepare($sql);
        $statment->execute();
        echo "<script>alert('Your name Update sucssesfully')</script>";
        $_SESSION['email'] = $email;
        $current_email = $_SESSION['email'];
    } catch(PDOException $e) 
    {
        echo $sql . "<br>" . $e->getMessage();
    }
       
    } 
    else 
    {
        // if Email is not mach then print this error
        echo '<br><div class="alert alert-danger" role="alert">Invalid UOB email format. Example: 12345678@stu.uob.edu.bh</div>';
    }

  }


  if(!empty($phone))
  {
   
    try
    {
        $sql = "Update Users set Phone = '$phone' where Email = '$current_email'";
        $statment = $conn->prepare($sql);
        $statment->execute();
        echo "<script>alert('Your Phone Update sucssesfully')</script>";
       
    } catch(PDOException $e) 
    {
        echo $sql . "<br>" . $e->getMessage();
    }

  }


  if(!empty($password))
  {
   
    try
    {
       $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "Update Users set pass = '$password' where Email = '$current_email'";
        $statment = $conn->prepare($sql);
        $statment->execute();
        echo "<script>alert('Your password Update sucssesfully')</script>";
       
    } catch(PDOException $e) 
    {
        echo "<script>". $sql . "<br>" . $e->getMessage() . "</script>";
    }
  }
  
}


if(isset($_POST['upload_picture']) && $_SERVER["REQUEST_METHOD"] == "POST")
{
  if (!isset($_SESSION['email']))
  {
    echo "<script>alert('Please log in to upload a profile picture.');</script>";
    exit;
  }
  $current_email = $_SESSION['email'];
  $target_dir = "uploads/"; // Directory to store uploaded images
  $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if the file is an image
  $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
  if ($check === false)
  {
      echo "<script>alert('File is not an image.');</script>";
      $uploadOk = 0;
  }

  // Check file size (5MB limit)
  if ($_FILES["profile_picture"]["size"] > 5000000) 
  {
      echo "<script>alert('File is too large. Max size is 5MB.');</script>";
      $uploadOk = 0;
  }

  // Allow only certain file formats
  if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) 
  {
      echo "<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed.');</script>";
      $uploadOk = 0;
  }

  // Check if upload is allowed
  if ($uploadOk == 0)
  {
      echo "<script>alert('Your file was not uploaded.');</script>";
  } else 
  {
      // Save the file
      if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file))
      {
          echo "<script>alert('Profile picture uploaded successfully.');</script>";

          // Update the database
          try 
          {
              $sql = "UPDATE Users SET profile_picture = '$target_file' WHERE Email = '$current_email'";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              // Update session variable
              $_SESSION['profile_picture'] = $target_file;
              header("Location: profile.php");
          } catch (PDOException $e) 
          {
              echo "<script>alert('Database update failed: " . $e->getMessage() . "');</script>";
          }
      } else 
      {
          echo "<script>alert('There was an error uploading your file.');</script>";
      }
  }
  


}



?>
    

</body>


</html>


