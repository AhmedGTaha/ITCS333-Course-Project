

<?php

session_start();
include("db.php");
$roomID = $_GET['RoomID'];

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
    <title>View Details</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <!-- Page Header -->
        <div class="text-center mb-4">
            <h1 class="display-6">Room Details</h1>
            <p class="text-muted">Check available time slots and reserve your booking.</p>
        </div>

        <!-- Time Slots Section -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Available Time Slots for Room <?php echo $roomID ?></h5>
                <div class="list-group">
                     
                <?php
                
                   $sql = "Select * from availabletimeslots where RoomID = '$roomID' ";
                   
                   $stmt = $conn->prepare($sql);
                   $stmt->execute();
                   $slots = $stmt->fetchAll();
                    
                   function getPeriod($time)
                   {
                     $hour =(int)$time[0];
                     if($hour >= 12)
                     {
                        return 'PM';
                     }
                       return 'AM';
                   }


                   foreach($slots as $slot)
                   {

                    $start = explode(':',$slot['start']) ;
                    $end = explode(':', $slot['end']);
                    $startPeriod = getPeriod($start);
                    $endPeriod = getPeriod($end);
                ?>

                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo $slot['start'] . " $startPeriod"?> - <?php echo $slot['end'] . " $endPeriod" ?> 
                        <form action="booking.php" method="get">
                            <input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>">
                            <input type="hidden" name="ATID" value="<?php echo $slot['ATID'] ?>">
                            <input type="hidden" name="start" value="<?php echo $slot['start'] ?>">
                            <input type="hidden" name="end" value="<?php echo $slot['end'] ?>">
                            <input type="hidden" name="RoomID" value="<?php echo $roomID ?>">
                            <div class="mb-2">
                            <label for="date" class="form-label">Select Date:</label>
                            <input type="date" name="date" class="form-control form-control-sm" required>
                           </div>
                            <button class="btn btn-primary btn-sm" type="submit">Reserve</button>
                        </form> 
                    </div>
                 <?php
                  }
                 ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wBEBZcKfUC6L5OsFb6q3FqEnBh+8NUvSt6n6hq3xeW06JDut1qG2A1GzIW4Iro7g" crossorigin="anonymous"></script>
</body>
</html>


