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
    <title>About Us - IT College Room Booking</title>
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
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        footer {
            background-color: #333;
            color: #f9f9f9;
            padding: 20px 0;
        }

        .btn-primary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-primary:hover {
            background-color: #5a6268;
        }

        .section-title {
            font-size: 1.75rem;
            color: #333;
            margin-bottom: 30px;
        }

        .section-content p {
            font-size: 1rem;
            color: #666;
            line-height: 1.6;
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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="browse.php">Browse Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.php">About</a>
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
            <h1>About IT College Room Booking System</h1>
            <p class="lead">Learn more about our system and its features</p>
        </div>
    </header>

    <!-- About Content -->
    <div class="container my-5">
        <!-- Introduction -->
        <section class="section-content mb-5">
            <h2 class="section-title">Our Mission</h2>
            <p>
                The IT College Room Booking System is designed to streamline the
                process of reserving rooms for various academic and administrative
                needs. Our goal is to make room booking quick, hassle-free, and
                accessible to all students, faculty, and staff.
            </p>
        </section>

        <!-- Features -->
        <section class="section-content mb-5">
            <h2 class="section-title">Features</h2>
            <ul>
                <li>Easy-to-use interface for browsing and booking rooms</li>
                <li>Advanced conflict-checking for booking slots</li>
                <li>Room details including capacity and available equipment</li>
                <li>Profile management for users</li>
                <li>Comprehensive admin panel for room and booking management</li>
            </ul>
        </section>

        <!-- Contact Information -->
        <section class="section-content">
            <h2 class="section-title">Contact Us</h2>
            <p>If you have any questions or need assistance, feel free to reach out:</p>
            <p><strong>Email:</strong> support@itroomsystem.edu</p>
            <p><strong>Phone:</strong> +973 1234 5678</p>
            <p><strong>Office:</strong> IT College, University of Bahrain</p>
        </section>
    </div>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>&copy; 2024 IT College Room Booking System | All Rights Reserved</p>
    </footer>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>