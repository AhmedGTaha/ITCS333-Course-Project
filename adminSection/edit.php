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
        <section id="edit-room">
            <div class="container">
                <div class="admin-panel-header mb-4">
                    <h2>Edit Room Details</h2>
                    <p>Modify the room's information below</p>
                </div>

                <form action="edit.php" method="POST">
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
                        <label for="capacity" class="form-label">Capacity</label>
                        <input name="capacity" type="number" class="form-control" id="capacity"  />
                    </div>

                    <div class="mb-3">
                        <label for="equipment" class="form-label">Equipment</label>
                        <input name="equipment" type="text" class="form-control" id="equipment"  />
                    </div>
                    
                    <div class="text-center">
                        <button name="save_changes" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
  


    <?php
     

     if(isset($_POST['save_changes']) && $_SERVER['REQUEST_METHOD'] == 'POST')
     {
        $roomID = $_POST['RoomID'];

        if(!empty($_POST['capacity']))
        {
            $capacity = $_POST['capacity'];
            try
            {
                $sql = "UPDATE room set capacity = '$capacity' where RoomID = '$roomID'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                echo "<script>alert('capacity changed sucssefully')</script>";
    
            }catch(PDOException $e)
            {
                echo "<script>alert('Error capacity changing')</script>";
            }
        }

        if(!empty($_POST['equipment']))
        {
            $equipment = $_POST['equipment'];
            try
            {
                $sql = "UPDATE room set equipment = '$equipment' where RoomID = '$roomID'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                echo "<script>alert('equipment changed sucssefully')</script>";
    
            }catch(PDOException $e)
            {
                echo "<script>alert('Error equipment changing')</script>";
            }
        }
     



       
     }


    ?>


    
</body>

</html>