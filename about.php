<?php

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
    <title>About Us</title>
    <style>
      body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        color: #333;
      }

      header {
        background-color: #ffffff;
        color: #333;
        padding: 60px 0;
        border-bottom: 2px solid #ddd;
        text-align: center;
      }

      header h1 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 15px;
      }

      header p {
        font-size: 1.2rem;
        margin-bottom: 0;
      }

      .about-container {
        margin-top: 30px;
        padding: 40px 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .features-list {
        list-style: none;
        padding: 0;
      }

      .features-list li {
        padding: 10px 0;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #ddd;
      }

      .features-list li:last-child {
        border-bottom: none;
      }

      .features-list li i {
        color: #6c757d;
        margin-right: 10px;
      }

      .contact-card {
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        text-align: center;
      }

      .contact-card:hover {
        transform: translateY(-5px);
      }

      footer {
        background-color: #333;
        color: #f9f9f9;
        padding: 20px 0;
        text-align: center;
      }

      footer p {
        margin: 0;
      }

      .navbar-brand img {
        max-height: 30px;
      }

      .navbar-light .navbar-nav .nav-link.active {
        font-weight: bold;
        color: #6c757d;
      }

      .btn-primary {
        background-color: #6c757d;
        border-color: #6c757d;
      }

      .btn-primary:hover {
        background-color: #5a6268;
      }

      .section-title {
        text-align: center;
        color: #6c757d;
        margin-bottom: 30px;
      }
    </style>
  </head>
  <body>
    <?php include ("nav.php");?>

    <!-- Header -->
    <header>
      <div class="container">
        <h1>About IT College Room Booking System</h1>
        <p>Making room booking easy and accessible for everyone</p>
      </div>
    </header>

    <!-- About Content -->
    <div class="container mt-5">
      <div class="about-container">
        <section class="mb-5">
          <h2 class="section-title">Our Mission</h2>
          <p class="text-center">
            The IT College Room Booking System is designed to simplify the
            process of reserving rooms for academic and administrative purposes.
            Our goal is to create an efficient, user-friendly platform accessible to students, faculty, and staff.
          </p>
        </section>

        <section class="mb-5">
          <h2 class="section-title">Features</h2>
          <ul class="features-list">
            <li><i class="bi bi-check-circle"></i> Simple room browsing and booking process</li>
            <li><i class="bi bi-check-circle"></i> Advanced conflict-checking for bookings</li>
            <li><i class="bi bi-check-circle"></i> Room details including capacity and equipment</li>
            <li><i class="bi bi-check-circle"></i> User profile management</li>
            <li><i class="bi bi-check-circle"></i> Comprehensive admin dashboard</li>
          </ul>
        </section>

        <section>
          <h2 class="section-title">Contact Us</h2>
          <div class="row text-center">
            <div class="col-md-4">
              <div class="contact-card">
                <h5>Email</h5>
                <p>support@mail.edu</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="contact-card">
                <h5>Phone</h5>
                <p>+973 1234 5678</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="contact-card">
                <h5>Office</h5>
                <p>IT College, University of Bahrain</p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <?php include ("footer.php"); ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>