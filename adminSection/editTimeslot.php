<?php

include("../db.php");
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
        crossorigin="anonymous" />
    <title>Edit Room - IT College Room Booking System</title>
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

        .form-control:focus {
            border-color: #6c757d;
            box-shadow: none;
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
                <h1>Edit Room</h1>
                <p class="lead">Modify the details of the room</p>
            </div>
        </header>

        <!-- Edit Room Form Section -->
        <section id="add-room">
            <div class="container add-room-form">
                <h2 class="text-center">Add New Time Slot</h2>
                <form action="editTimeslot.php" method="POST">
                    <!-- Rooms -->
                    <div class="mb-3">
                        <label for="ATID" class="form-label">select room</label>
                        <select id="ATID" name="ATID" class="form-select" required>
                            <option value="" disabled selected>select ATID</option>
                            <?php
                            try
                            {
                              $sql = "Select * from availabletimeslots";
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
                            <option value="<?php echo $room['ATID'] ?>"><?php echo $room['ATID'] ?></option>
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
                        <button name="UpdateTime" type="submit" class="btn btn-primary">Update Time Slot</button>
                    </div>
                </form>
            </div>
        </section>




    <?php
     

     if(isset($_POST['UpdateTime']) && $_SERVER['REQUEST_METHOD'] == 'POST')
     {

        try
        {
  
           $ATID = $_POST['ATID']; 
           $start = $_POST['start'];
           $end = $_POST['end'];
           $sql = "Update availabletimeslots set start = '$start',end = '$end' where ATID ='$ATID'";
           $stmt = $conn->prepare($sql);
           $stmt->execute();
            echo "<script>alert('updated sucssesfully')</script>";
        }catch(PDOException $e)
        {
            echo "<script>alert('error')</script>";
        }
       
     }


    ?>


    
</body>

</html>