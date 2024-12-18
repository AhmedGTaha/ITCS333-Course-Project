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
        crossorigin="anonymous" />
    <title>Admin Dashboard - IT College Room Booking System</title>
    <style>
        body 
        {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
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

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
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
    </style>
</head>

<body>
    <!-- Sidebar -->
     <?php include ("sidebar.php") ?>

    <!-- Content Area -->
    <div class="content-area">
        <!-- Welcome Section -->
        <header class="text-center mb-5">
            <h1>Welcome, Admin!</h1>
            <p class="lead">Easily manage rooms, users, and bookings.</p>
        </header>

        <!-- User Card -->
        <div class="container my-5">
            <div class="user-card">
                <img
                    src="<?php echo $_SESSION['profile_picture'] ?? 'pic\user.png'; ?>"
                    alt="User Avatar" />
                <h5>Good Morning, <?php echo $_SESSION['name'] ?></h5>
                <p>ID: <?php echo $_SESSION['email'] ?></p>
                <hr />
                <div class="d-flex gap-2 justify-content-center mt-3">
                    <a href="adminProfile.php" class="btn btn-outline-primary btn-sm">Edit Profile</a>
                    <a href="userBookings.php" class="btn btn-outline-secondary btn-sm">Bookings</a>
                    <a href="allRooms.php" class="btn btn-outline-secondary btn-sm">Rooms</a>
                    <a href="allUsers.php" class="btn btn-outline-secondary btn-sm">Users</a>
                    <a href="../logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
                </div>
            </div>
        </div>


        <?php

          try
          {
            $sql = "SELECT count(*) from book";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $totalBooking = $stmt->fetchColumn();

            $sql = "SELECT count(*) from users";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $totalUsers = $stmt->fetchColumn();

            $sql = "SELECT count(*) from Room";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $totalRooms = $stmt->fetchColumn();

          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }


        ?>


        <!-- Stats Section -->
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Bookings</h5>
                        <p class="card-text fs-4"><?php echo $totalBooking ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text fs-4"><?php echo $totalUsers ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Rooms</h5>
                        <p class="card-text fs-4"><?php echo $totalRooms ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>