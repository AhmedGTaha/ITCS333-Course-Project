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
        crossorigin="anonymous" />
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

        .room-actions {
            display: flex;
            gap: 10px;
        }

        .add-room-form {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="admin.php">
            <h3 class="text-white">Admin Dashboard</h3>
        </a>
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
            <div class="container">
                <h1>All Rooms</h1>
                <p class="lead">Browse rooms in the system</p>
            </div>
        </header>

        <!-- Add Room Section -->
        <section id="add-room">
            <div class="container add-room-form">
                <h2 class="text-center">Add New Room</h2>
                <form>
                    <div class="mb-3">
                        <label for="room-name" class="form-label">Room Name</label>
                        <input type="text" class="form-control" id="room-name" placeholder="Enter room name" required />
                    </div>
                    <div class="mb-3">
                        <label for="capacity" class="form-label">Capacity</label>
                        <input type="number" class="form-control" id="capacity" placeholder="Enter room capacity" required />
                    </div>
                    <div class="mb-3">
                        <label for="equipment" class="form-label">Equipment</label>
                        <input type="text" class="form-control" id="equipment" placeholder="Enter equipment (e.g., Smartboard, Projector)" required />
                    </div>
                    <div class="mb-3">
                        <label for="available-time" class="form-label">Available Time</label>
                        <input type="text" class="form-control" id="available-time" placeholder="Enter available time" required />
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Add Room</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Rooms Section -->
        <section id="rooms">
            <div class="container">
                <div class="admin-panel-header">
                    <h2>View Rooms</h2>
                    <p>Admin can view the list of available rooms in the system</p>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Room 1 -->
                    <div class="col">
                        <div class="card room-card">
                            <div class="card-body">
                                <h5 class="card-title">Room 101</h5>
                                <p class="card-text">Capacity: 25 | Equipment: Smartboard</p>
                                <p class="card-text">Available Time: 10:00 - 10:50 | Status: Available</p>
                                <div class="room-actions">
                                    <a href="edit.php"><button class="btn btn-primary">Edit</button></a>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Room 2 -->
                    <div class="col">
                        <div class="card room-card">
                            <div class="card-body">
                                <h5 class="card-title">Room 102</h5>
                                <p class="card-text">Capacity: 30 | Equipment: Projector, Whiteboard</p>
                                <p class="card-text">Available Time: 11:00 - 12:00 | Status: Available</p>
                                <div class="room-actions">
                                    <a href="edit.php"><button class="btn btn-primary">Edit</button></a>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Room 3 -->
                    <div class="col">
                        <div class="card room-card">
                            <div class="card-body">
                                <h5 class="card-title">Room 103</h5>
                                <p class="card-text">Capacity: 20 | Equipment: Smartboard</p>
                                <p class="card-text">Available Time: 2:00 - 3:00 | Status: Booked</p>
                                <div class="room-actions">
                                    <a href="edit.php"><button class="btn btn-primary">Edit</button></a>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Room 4 -->
                    <div class="col">
                        <div class="card room-card">
                            <div class="card-body">
                                <h5 class="card-title">Room 104</h5>
                                <p class="card-text">Capacity: 40 | Equipment: Projector, Whiteboard</p>
                                <p class="card-text">Available Time: 1:00 - 3:00 | Status: Available</p>
                                <div class="room-actions">
                                    <a href="edit.php"><button class="btn btn-primary">Edit</button></a>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Room 5 -->
                    <div class="col">
                        <div class="card room-card">
                            <div class="card-body">
                                <h5 class="card-title">Room 105</h5>
                                <p class="card-text">Capacity: 15 | Equipment: Whiteboard</p>
                                <p class="card-text">Available Time: 9:00 - 10:00 | Status: Available</p>
                                <div class="room-actions">
                                    <a href="edit.php"><button class="btn btn-primary">Edit</button></a>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>