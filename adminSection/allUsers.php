<?php
session_start();
include('../db.php');

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
    <title>Admin Dashboard - IT College Room Booking System</title>
    <style>
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
      }

      .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #343a40;
        color: white;
        padding: 20px;
        display: flex;
        flex-direction: column;
      }

      .sidebar a {
        color: white;
        padding: 15px;
        text-decoration: none;
        font-size: 18px;
        margin: 5px 0;
        border-radius: 5px;
        transition: background-color 0.3s;
      }

      .sidebar a:hover {
        background-color: #555;
      }

      .content-area {
        margin-left: 250px;
        padding: 30px;
      }

      footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 20px;
        margin-top: 50px;
      }

      .card {
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
      }

      .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
      }

      .btn-primary {
        background-color: #6c757d;
        border-color: #6c757d;
      }

      .btn-primary:hover {
        background-color: #5a6268;
      }

      .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
      }

      .btn-danger:hover {
        background-color: #c82333;
      }

      .stat-card .card-body {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .user-card img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
      }

      .user-card h5 {
        margin-bottom: 10px;
        color: #333;
      }

      .user-card p {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 15px;
      }

      .user-card .btn {
        font-size: 0.85rem;
      }
    </style>
  </head>

  <body>
    <!-- Sidebar -->
    <?php include ("sidebar.php") ?>

    <!-- Content Area -->
    <div class="content-area">
      <!-- Header -->
      <header class="text-center">
        <div class="container">
          <h1>All Users</h1>
          <p class="lead">Browse all users in the system</p>
        </div>
      </header>

      <!-- Users Section -->
      <section id="users">
        <div class="container">
          <div class="admin-panel-header mb-4">
            <h2>View All Users</h2>
            <p>Admin can view the list of all users and their room booking status.</p>
          </div>


          <?php 
          
          try
          {

            $sql = "Select * from users where role='student'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();

          } catch(PDOException $e) 
          {
            echo "Connection failed: " . $e->getMessage();
          }



          ?>
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- User 1 -->


            <?php  
            
            foreach($results as $result)
            {
              $pic = "../" . $result['profile_picture'];
              if($result['profile_picture'] == NULL)
              {
                $pic = $result['profile_picture'];
              }

            ?>            
            <div class="col">
              <div class="card user-card">
                <div class="card-body text-center">
                  <img
                    src="<?php echo $pic ?? 'https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg'; ?>"
                    class="rounded-circle mb-3"
                    alt="User Avatar"
                  />
                  <h5 class="card-title"><?php echo $result['Name'] ?></h5>
                  <p class="card-text">Email: <?php echo $result['Email'] ?></p>
                  <p class="card-text">Phone: <?php echo $result['Phone'] ?></p>
                  <form action="deleteUser.php" method="post">
                    <input type="hidden" name="Email" value="<?php echo $result['Email'] ?>">
                    <button name="deletUser" class="btn btn-danger">Delete User</button>
                  </form>
                </div>
              </div>
            </div>

            <?php
            }
            ?>
           
          </div>
        </div>
      </section>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <?php

     if(isset($_SESSION['deleteUser']))
     {
      if($_SESSION['deleteUser'] == true)
      {
        echo "<script>alert('Deleted user succesfully')</script>";
        
      }else
      {
        echo "<script>alert('Error in add Room')</script>";
      }
         
      unset($_SESSION['deleteUser']);
     }
  


    ?>
  </body>
</html>

