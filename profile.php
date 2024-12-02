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
    <title>User Profile Management</title>
    <style>
        /* Ensuring full height layout */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Ensure the footer stays at the bottom */
        }

        header {
            background-color: #ffffff;
            padding: 30px 0;
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
            margin-top: auto;
            text-align: center;
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
                    loading="lazy" />
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
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="browse_rooms.php">Browse Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
                <!-- Profile dropdown -->
                <div class="dropdown ms-3">
                    <a
                        class="dropdown-toggle d-flex align-items-center"
                        href="#"
                        id="profileDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img
                            src="https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg"
                            class="rounded-circle"
                            height="25"
                            alt="Profile Avatar"
                            loading="lazy" />
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="profileDropdown">
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
            <h1>User Profile Management</h1>
            <p class="lead">View and edit your profile details</p>
        </div>
    </header>

    <!-- Profile Container -->
    <div class="profile-container">
        <div class="text-center mb-4">
            <img
                src="https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg"
                alt="User Profile Picture"
                class="profile-picture" />
            <form class="mt-3">
                <input type="file" class="form-control" accept="image/*" />
                <button type="submit" class="btn btn-primary mt-2">Upload Picture</button>
            </form>
        </div>
        <form>
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input
                    type="text"
                    id="name"
                    class="form-control"
                    placeholder="Enter your full name" />
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input
                    type="email"
                    id="email"
                    class="form-control"
                    placeholder="Enter your email" />
            </div>
            <!-- Phone -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input
                    type="tel"
                    id="phone"
                    class="form-control"
                    placeholder="Enter your phone number" />
            </div>
            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    id="password"
                    class="form-control"
                    placeholder="Enter your password" />
            </div>
            <!-- Update Profile Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 IT College Room Booking System | All Rights Reserved</p>
    </footer>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>