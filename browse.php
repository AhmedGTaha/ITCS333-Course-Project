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
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
      <!-- Brand Logo -->
      <a class="navbar-brand" href="index.php">
        <img
          src="https://incubator.uob.edu.bh/wp-content/uploads/2022/11/LOGO_Final_S-1-e1669184877957.png"
          height="30"
          alt="UOB Logo"
          loading="lazy"
        />
        IT Room Booking
      </a>
      <!-- Navbar Toggle Button -->
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
      <!-- Navbar Links and Dropdown -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="browse.php">Browse Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
        </ul>
        <!-- Profile Dropdown -->
        <div class="dropdown ms-3">
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
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="profileDropdown"
          >
            <li>
              <a class="dropdown-item" href="profile.php">My Profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="userRooms.php">My Rooms</a>
            </li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="text-center">
    <div class="container">
      <h1>Browse Rooms</h1>
      <p class="lead">Explore and book your preferred rooms</p>
    </div>
  </header>

  <!-- Search Bar -->
  <div class="container my-4">
    <div class="input-group">
      <input
        type="text"
        class="form-control"
        placeholder="Enter room number (e.g., 101)"
      />
      <button class="btn btn-primary">Search</button>
    </div>
    <p class="text-center text-danger mt-3">No rooms found matching your search.</p>
  </div>

  <!-- Search Result Section -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Room 101</h5>
            <p>Capacity: 25 | Equipment: Smartboard</p>
            <p>Available Time: 10:00 - 10:50 | Status: Booked</p>
            <a href="details.php" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- All Rooms Section -->
  <section id="rooms" class="mt-5">
    <div class="container">
      <h3 class="text-center mb-4">All Available Rooms</h3>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Room 1 -->
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Room 101</h5>
              <p>Capacity: 25 | Equipment: Smartboard</p>
              <p>Available Time: 10:00 - 10:50 | Status: booked</p>
              <a href="details.php" class="btn btn-primary">View Details</a>
            </div>
          </div>
        </div>
        <!-- Room 2 -->
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Room 102</h5>
              <p>Capacity: 25 | Equipment: Smartboard</p>
              <p>Available Time: 10:00 - 10:50 | Status: Available</p>
              <a href="details.php" class="btn btn-primary">View Details</a>
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