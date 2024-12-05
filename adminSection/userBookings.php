<?php 
session_start();
include ("../db.php");
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
          <h1>All Users' Rooms</h1>
          <p class="lead">Browse rooms booked by all users</p>
        </div>
      </header>

      <!-- Rooms Section -->
      <section id="rooms">
        <div class="container">
          <div class="admin-panel-header mb-4">
            <h2>View All Booked Rooms</h2>
            <p>Admin can view the list of rooms booked by all users</p>
          </div>
          <div class="row row-cols-1 row-cols-md-3 g-4">

          <?php
            try
            {
  
              $sql = "SELECT * FROM book JOIN users ON book.Email = users.Email JOIN availabletimeslots ON availabletimeslots.ATID = book.ATID join room on room.RoomID = availabletimeslots.RoomID;";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $results = $stmt->fetchAll();
  
            } catch(PDOException $e) 
            {
              echo "Connection failed: " . $e->getMessage();
            }

          foreach($results as $book){
          ?>
            <!-- Room 1 -->
            <div class="col">
              <div class="card room-card">
                <div class="card-body">
                  <h5 class="card-title">Room <?php echo $book['RoomID'] ?></h5>
                  <p class="card-text">Booked by:<?php echo $book['Name'] ?></p>
                  <p class="card-text"><?php echo $book['BookDate'] ?></p>
                  <p class="card-text">Time: <?php echo $book['start']. " - " . $book['end']?></p>
                  <p class="card-text">Capacity: <?php echo $book['capacity'] ?> | Equipment: <?php echo $book['equipment'] ?></p>
                  <button class="btn btn-danger">Cancel Booking</button>
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
  </body>
</html>