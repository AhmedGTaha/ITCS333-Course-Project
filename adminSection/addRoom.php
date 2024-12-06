
<?php

session_start();
include('../db.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    



<script></script>

<?php
// FUNCTIONALITY FOR ADD ROOM
if(isset($_POST['AddRoom']) && $_SERVER['REQUEST_METHOD'] == 'POST')
{
 try
 {
  
     $cap = $_POST['capacity'];
     $equ = $_POST['equipment'];

   $sql = "insert into room (capacity,equipment) values('$cap','$equ')";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   echo "<script>alert('Room added succesfuly')</script>";
   $_SESSION['AddRoom'] = true;
   header("Location: allRooms.php");
   
 } catch(PDOException $e) 
 {
   echo "<script>alert('Error in add Room')</script>";
   $_SESSION['AddRoom'] = false;
   header("Location: allRooms.php");
 }

}


?>
</body>
</html>