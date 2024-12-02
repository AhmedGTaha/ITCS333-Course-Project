

<?php
        include ("db.php");
        session_start();  
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
    <title>Browse Rooms</title>
    <style>
      body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
          Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
          sans-serif;
        background-color: #f9f9f9;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
      }
      main {
        flex: 1;
      }
      header {
        background-color: #ffffff;
        padding: 30px 0;
        border-bottom: 1px solid #ddd;
      }
      #rooms {
        padding: 40px 0;
        background-color: #ffffff;
      }
      .card {
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
      }
      .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      }
      footer {
        background-color: #333;
        color: #f9f9f9;
        text-align: center;
        padding: 10px 0;
      }
      .btn-primary {
        background-color: #6c757d;
        border-color: #6c757d;
      }
      .btn-primary:hover {
        background-color: #5a6268;
      }
      .search-bar {
        max-width: 600px;
        margin: 20px auto 60px; /* Adjusted spacing for better positioning */
      }
      .search-bar input[type="search"] {
        border-radius: 20px;
        border: 1px solid #ddd;
        padding: 10px 20px;
        font-size: 16px;
        transition: box-shadow 0.3s;
      }
      .search-bar input[type="search"]:focus {
        outline: none;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
      }
      .search-bar .btn {
        border-radius: 20px;
        padding: 8px 20px;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <div class="container-fluid">
        <a class="navbar-brand" href="Home.php">
          <img
            src="https://incubator.uob.edu.bh/wp-content/uploads/2022/11/LOGO_Final_S-1-e1669184877957.png"
            height="30"
            alt="UOB Logo"
            loading="lazy"
          />
          IT Room Booking
        </a>
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
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="Home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="browse.php">Browse Rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
          </ul>
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
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
              <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
              <li><a class="dropdown-item" href="history.php">My Rooms</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <main>
      <!-- Header -->
      <header class="text-center">
        <div class="container">
          <h1>Browse Rooms</h1>
          <p class="lead">Explore and book your preferred rooms</p>
        </div>
      </header>


      <!-- Search Bar -->
      <div class="search-bar text-center">
        <form class="d-flex justify-content-center" role="search" method="post" action="browse.php">
          <input
            class="form-control me-2"
            type="search"
            placeholder="Search for rooms"
            aria-label="Search"
            name="roomid"
          />
          <button class="btn btn-primary" type="submit">Search</button>
        </form>
      </div>

      <!-- Browse Rooms Section -->
      <section id="rooms">
        <div class="container">
          <h3 class="text-center mb-4">Available Rooms</h3>
          <div class="row row-cols-1 row-cols-md-3 g-4">

          <?php 
             
            $sql = "Select * from Room";
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
              $roomid = $_POST['roomid'];
              if(!empty($roomid))
              {
                $sql = "Select * from Room where RoomID='$roomid'";
              }
            }

    
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $rooms = $stmt->fetchAll();
            foreach($rooms as $room)
             {
          ?>
          
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Room <?php echo $room['RoomID'] ?></h5>
                  <p class="card-text">
                    Capacity: <?php echo $room['capacity'] ?> | Equipment: <?php echo $room['equipment'] ?> <br>
                  </p>
                  <form action="viewDetails.php" method="GET">
                  <input type="hidden" name="RoomID" value="<?php echo $room['RoomID']; ?>">
                  <button class="btn btn-primary" type="submit">View Details</button>
                  </form>
                </div>
              </div>
            </div>
            <?php

             }
           ?>
            <!-- Additional rooms (unchanged for brevity) -->
          </div>
        </div>

          
      </section>
    </main>

    <!-- Footer -->
    <footer>
      <p>&copy; 2024 IT College Room Booking System | All Rights Reserved</p>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>


