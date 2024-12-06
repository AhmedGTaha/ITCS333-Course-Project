<?php

session_start();
include "../db.php";


if(isset($_POST['AddTime']) && $_SERVER['REQUEST_METHOD'] == 'POST')
{
 try
 {
  
   $roomID = $_POST['RoomID'];
   $start = $_POST['start'];
   $end = $_POST['end'];
   $sql = "insert into availabletimeslots (RoomID,start,end) values('$roomID','$start','$end')";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   echo "<script>alert('Time added succesfuly')</script>";
   $_SESSION['addTime'] = true;
 } catch(PDOException $e) 
 {
   echo "<script>alert('Error in add Time')</script>";
   $_SESSION['addTime'] = true;
 }


 header('Location: allRooms.php');
}


?>


