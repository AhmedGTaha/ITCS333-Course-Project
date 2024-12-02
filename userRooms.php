<?php ?>
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
    <title>My Bookings</title>
    <style>
      body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
          Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
          sans-serif;
        background-color: #f9f9f9;
      }
      header {
        background-color: #ffffff;
        padding: 30px 0;
        border-bottom: 1px solid #ddd;
      }
      #bookings {
        padding: 40px 0;
        background-color: #ffffff;
      }
      .card {
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
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
      footer {
        background-color: #333;
        color: #f9f9f9;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
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
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
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
                src="https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg"
                class="rounded-circle"
                height="25"
                alt="Profile Avatar"
                loading="lazy"
              />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
              <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
              <li><a class="dropdown-item" href="userRooms.php">My Rooms</a></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="text-center">
      <div class="container">
        <h1>My Bookings</h1>
        <p class="lead">Here are the rooms you have booked</p>
      </div>
    </header>

    <!-- Bookings Section -->
    <section id="bookings">
      <div class="container">
        <h3 class="text-center mb-4">Booked Rooms</h3>
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <!-- Booking 1 -->
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Room 101</h5>
                <p class="card-text">
                  <h6>Booked on:</h6>
                  <p>Date: December 10, 2024</p>
                  <p>Time: 10:00 - 12:00</p>
                  <h6>Room Details:</h6>
                  <p>Capacity: 25 | Equipment: Smartboard</p>
                  <p>Available Time: 10:00 - 10:50 | Status: Booked</p>
                  <a href="details.php" class="btn btn-primary">View Details</a>
                </p>
              </div>
            </div>
          </div>
          <!-- Booking 2 -->
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Room 102</h5>
                <p class="card-text">
                  <h6>Booked on:</h6>
                  <p>Date: December 12, 2024</p>
                  <p>Time: 1:00 - 3:00</p>
                  <h6>Room Details:</h6>
                  <p>Capacity: 30 | Equipment: Projector</p>
                  <p>Available Time: 1:00 - 1:50 | Status: Available</p>
                  <a href="details.php" class="btn btn-primary">View Details</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-3">
      <p>&copy; 2024 IT College Room Booking System | All Rights Reserved</p>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>