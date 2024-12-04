<?php ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
      <!-- Brand Logo -->
      <a class="navbar-brand" href="Home.php">
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
            <a class="nav-link" href="Home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="browse.php">Browse Rooms</a>
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
              src="<?php echo $_SESSION['profile_picture'] ?? 'https://img.freepik.com/premium-vector/user-profile-icon-flat-style-member-avatar-vector-illustration-isolated-background-human-permission-sign-business-concept_157943-15752.jpg'; ?>"
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
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>