<?php 

session_start();
include ('../db.php');

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
    <?php include ("sidebar.php") ?>

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
                <form action="addRoom.php" method="POST">
                    <div class="mb-3">
                        <label for="capacity" class="form-label">Capacity</label>
                        <input name="capacity" type="number" class="form-control" id="capacity" placeholder="Enter room capacity" required />
                    </div>
                    <div class="mb-3">
                        <label for="equipment" class="form-label">Equipment</label>
                        <input name="equipment" type="text" class="form-control" id="equipment" placeholder="Enter equipment (e.g., Smartboard, Projector)" required />
                    </div>
                    <div class="text-center">
                        <button name="AddRoom" type="submit" class="btn btn-primary">Add Room</button>
                    </div>
                </form>
            </div>

        </section>

        <!-- Time Slots -->
        <section id="add-room">
            <div class="container add-room-form">
                <h2 class="text-center">Add New Time Slot</h2>
                <form action="addTime.php" method="post">
                    <!-- Rooms -->
                    <div class="mb-3">
                        <label for="RoomID" class="form-label">select room</label>
                        <select id="RoomID" name="RoomID" class="form-select" required>
                            <option value="" disabled selected>select room</option>
                            <?php
                            try
                            {
                              $sql = "Select * from room";
                              $stmt = $conn->prepare($sql);
                              $stmt->execute();
                              $results = $stmt->fetchAll();
                  
                            } catch(PDOException $e) 
                            {
                              echo "Connection failed: " . $e->getMessage();
                            }
                  
                         foreach($results as $room)
                         {
                        ?>
                            <option value="<?php echo $room['RoomID'] ?>"><?php echo $room['RoomID'] ?></option>
                        <?php
                         }
                         ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="start" class="form-label">Start Time</label>
                        <input name="start" type="time" class="form-control" id="start" placeholder="Enter Start Time" required />
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">End Time</label>
                        <input name="end" type="time" class="form-control" id="end" placeholder="End Time" required />
                    </div>
                    <div class="text-center">
                        <button name="AddTime" type="submit" class="btn btn-primary">Add Time Slot</button>
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
                    <?php
                            try
                            {
                              $sql = "Select * from room";
                              $stmt = $conn->prepare($sql);
                              $stmt->execute();
                              $results = $stmt->fetchAll();
                  
                            } catch(PDOException $e) 
                            {
                              echo "Connection failed: " . $e->getMessage();
                            }
                  
                         foreach($results as $room){
                              
                    ?>
                    <!-- Room 1 -->
                    <div class="col">
                        <div class="card room-card">
                            <div class="card-body">
                                <h5 class="card-title">Room <?php echo $room['RoomID'] ?></h5>
                                <p class="card-text">Capacity: <?php echo $room['capacity'] ?> | Equipment: <?php echo $room['equipment'] ?></p>
                                <div class="room-actions">
                        
                                   <a href="edit.php"><button name="edit" class="btn btn-primary">Edit</button></a>
                                    <form action="deleteRoom.php" method="post">
                                        <input type="hidden" name="RoomID" id="RoomID" value="<?php echo $room['RoomID'] ?>">
                                        <button name="Delete" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                         }
                    ?>
                
                </div>
            </div>
        </section>
    </div>


    <!-- time slots section-->
    <section id="rooms">
            <div class="container">
                <div class="admin-panel-header">
                    <h2>View time slots</h2>
                    <p>Admin can view the list of time slots in the system</p>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                            try
                            {
                              $sql = "Select * from availabletimeslots as av join room on av.RoomID = room.RoomID";
                              $stmt = $conn->prepare($sql);
                              $stmt->execute();
                              $results = $stmt->fetchAll();
                  
                            } catch(PDOException $e) 
                            {
                              echo "Connection failed: " . $e->getMessage();
                            }
                  
                         foreach($results as $room){
                              
                    ?>
                    <!-- Rooms time slots -->
                    <div class="col">
                        <div class="card room-card">
                            <div class="card-body">
                                <h5 class="card-title">Room <?php echo $room['RoomID'] ?></h5>
                                <p class="card-text">ATID: <?php echo $room['ATID']?></p>
                                <p class="card-text">Capacity: <?php echo $room['capacity'] ?> | Equipment: <?php echo $room['equipment'] ?></p>
                                <p class="card-text">Time: <?php echo $room['start'] . '-' . $room['end']?></p>
                                <div class="room-actions">
                        
                                <form action="editTimeslot.php" method="post">
                                  <input type="hidden" name="ATID" id="ATID" value="<?php echo $room['ATID'] ?>">
                                  <button name="edit" class="btn btn-primary">Edit</button>
                                </form>
                                    <form action="deleteTime.php" method="post">
                                        <input type="hidden" name="ATID" id="ATID" value="<?php echo $room['ATID'] ?>">
                                        <button name="DeleteTime" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                         }
                    ?>
              
                </div>
            </div>
        </section>
    </div>

    <br>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>



        <?php


            // Cheak if Room added sucsessfully
            if(isset($_SESSION['AddRoom']))
            {
                if($_SESSION['AddRoom'] == true)
                {
                  echo "<script>alert('Room added succesfuly')</script>";
                }else
                {
                  echo "<script>alert('Error in add Room')</script>";

                }

                unset($_SESSION['AddRoom']);
            }

            // Cheak if time added sucsessfully
            if(isset($_SESSION['addTime']))
            {
                if($_SESSION['addTime'] == true)
                {
                  echo "<script>alert('Time added succesfuly')</script>";
                }else
                {
                  echo "<script>alert('Error in add Time')</script>";
                }

                unset($_SESSION['addTime']);
            }

             // Cheak if Room is added sucsessfully
             if(isset($_SESSION['deleteRoom']))
             {
                 if($_SESSION['deleteRoom'] == true)
                 {
                   echo "<script>alert('Room delete succesfuly')</script>";
                 }else
                 {
                   echo "<script>alert('Error in Delete Room')</script>";
                 }
 
                 unset($_SESSION['deleteRoom']);
             }


             if(isset($_SESSION['deleteTime']))
             {
                 if($_SESSION['deleteTime'] == true)
                 {
                   echo "<script>alert('Time delete succesfuly')</script>";
                 }else
                 {
                   echo "<script>alert('Error in Delete Time')</script>";
                 }
 
                 unset($_SESSION['deleteTime']);
             }
        



           if(isset($_POST['DeleteTime']) && $_SERVER['REQUEST_METHOD'] == 'POST')
           {
            try
            {
             
              $ATID = $_POST['ATID'];
              $sql = "Delete from availabletimeslots where ATID  = '$ATID'";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              echo "<script>alert('deleted succesfuly')</script>";

            } catch(PDOException $e) 
            {
              echo "<script>alert('error in deletion')</script>";
              echo  $e->getMessage(); 
            }

           }

    
        ?>
</body>

</html>