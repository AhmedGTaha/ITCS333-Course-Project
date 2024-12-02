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
    <title>Admin Dashboard - Profile Management</title>
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
        margin-top: auto;
      }

      .card {
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

      @media (max-width: 768px) {
        .content-area {
          margin-left: 0;
          padding: 20px;
        }

        .sidebar {
          position: static;
          width: 100%;
          padding: 10px;
        }

        .sidebar a {
          font-size: 16px;
          padding: 10px;
        }
      }
    </style>
  </head>

  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <a href="admin.php"><h3 class="text-white">Admin Dashboard</h3></a>
      <a href="admin.php">Home</a>
      <a href="allRooms.php">All Rooms</a>
      <a href="allUsers.php">All Users</a>
      <a href="userBookings.php">User Bookings</a>
      <a href="adminProfile.php">Edit Profile</a>
    </div>

    <!-- Content Area -->
    <div class="content-area">
      <!-- Header -->
      <header class="text-center">
        <h1>User Profile Management</h1>
        <p class="lead">Manage and update your personal details.</p>
      </header>

      <!-- Profile Container -->
      <div class="profile-container">
        <div class="text-center mb-4">
          <img
            src="https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg"
            alt="User Profile Picture"
            class="profile-picture"
          />
          <form class="mt-3">
            <input type="file" class="form-control" accept="image/*" />
            <button type="submit" class="btn btn-primary mt-2">Upload Picture</button>
          </form>
        </div>

        <!-- Profile Form -->
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input
              type="text"
              id="name"
              class="form-control"
              placeholder="Enter your full name"
              value="John Doe"
            />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input
              type="email"
              id="email"
              class="form-control"
              placeholder="Enter your email"
              value="admin@example.com"
            />
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input
              type="tel"
              id="phone"
              class="form-control"
              placeholder="Enter your phone number"
              value="+123 456 7890"
            />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input
              type="password"
              id="password"
              class="form-control"
              placeholder="Enter your new password"
            />
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Update Profile</button>
          </div>
        </form>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>