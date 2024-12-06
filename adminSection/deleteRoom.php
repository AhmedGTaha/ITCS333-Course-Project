<?php

include "../db.php";
session_start();


if(isset($_POST['Delete']) && $_SERVER['REQUEST_METHOD'] == 'POST')
{
 try
 {
  
   $RoomID = $_POST['RoomID'];
   $sql = "Delete from room where RoomID  ='$RoomID'";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   echo "<script>alert('deleted succesfuly')</script>";
   $_SESSION['deleteRoom'] = true;
 } catch(PDOException $e) 
 {
   echo "<script>alert('error in deletion')</script>";
   echo  $e->getMessage(); 
   $_SESSION['deleteRoom'] = false;
 }


 header("Location: allRooms.php");

}

?>