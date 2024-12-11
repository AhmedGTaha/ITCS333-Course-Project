<?php

session_start();
include("db.php");

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
    <title>IT College Room Booking System</title>
    <style>
      body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
      }
      header {
        background-color: #ffffff;
        padding: 30px 0;
        border-bottom: 1px solid #ddd;
      }
      .card {
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
      }
      .card:hover {
        transform: translateY(-5px);
      }
      footer {
        background-color: #333;
        color: #f9f9f9;
      }
      .btn-primary {
        background-color: #6c757d;
        border-color: #6c757d;
      }
      .btn-primary:hover {
        background-color: #5a6268;
      }
      .user-card {
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
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
      #rooms {
    padding: 40px 0;
    background-color: #f8f9fa;
    margin-bottom: 50px; /* Adds spacing */
  }
    </style>
  </head>
  <body>
    <?php include ("nav.php");?>
      <!-- Header -->
       <header class="text-center">
        <div class="container">
          <h1>Welcome to IT College Room Booking System</h1>
          <p class="lead">Easily book and manage your rooms</p>
        </div>
    
    </header>

    <!-- User Card -->
    <div class="container my-5">
      <div class="user-card">
        <img
          src="<?php echo $_SESSION['profile_picture'] ?? 'pic/user.png'; ?>"
          alt="User Avatar"
        />
        <h5>Hello, <?php echo $_SESSION['name']?></h5>
        <p>Email: <?php echo $_SESSION['email']?></p>
        <hr />
       
        <div class="d-flex gap-2 justify-content-center mt-3">
          <a href="profile.php" class="btn btn-outline-primary btn-sm">Edit Profile</a>
          <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
      </div>
    </div>
    
    <section id="rooms">
      <div class="container">
        <h3 class="text-center mb-4">Currently Booked Rooms</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php 
         
         $email = $_SESSION['email'];
         $currentDate = date('Y-m-d');
         $time = date("h:i:s");
         try
         {
           $sql = "SELECT * FROM book,users,room,availabletimeslots WHERE users.Email = book.Email AND room.RoomID = availabletimeslots.RoomID AND availabletimeslots.ATID = book.ATID AND users.Email = '$email'";
           $statment = $conn->prepare($sql);
           $statment->execute();
           $books = $statment->fetchAll();
          
           foreach($books as $book)
          {
        ?>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Room <?php echo $book['RoomID'] ?></h5>
                <p>Capacity:<?php echo $book['capacity'] ?> | Equipment: <?php echo $book['equipment'] ?></p>
                <p>Date: <?php echo $book['BookDate'] ?></p>
                <p>Available Time: <?php echo $book['start'] ?> - <?php echo $book['end'] ?></p>
                <form action="cancelBooking.php" method="post">
                    <input type="hidden" name="rid" value="<?php echo $book['requestID']?>"> <!-- Replace with dynamic booking ID -->
                    <button type="submit" class="btn btn-primary">Cancel Now</button>
                </form>
              </div>
            </div>
          </div>

          <?php
          }

        }catch(PDOException $e) 
        {
            echo $sql . "<br>" . $e->getMessage();
        }
          ?>
          <!-- Repeat similar room cards -->
        
          
        </div>
      </div>
    </section>
    <br>
    <br>
    <br>
    <?php include ("footer.php"); ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    >
     
    </script>

<?php 
     
     if(isset($_SESSION['deleted']))
     {
       if($_SESSION['deleted'] == true)
       {
         echo "<script>alert('you deletion completed')</script>";
       }else
       {
         echo "<script>alert('you deletion is not completed')</script>";
       }
     } 

     unset($_SESSION['deleted']);
    

     if(isset($_SESSION['status']))
     {
         $msg = $_SESSION['status'];
         echo "<script>alert('$msg')</script>";

     } 

     unset($_SESSION['status']);
    

?>


  </body>
</html>
