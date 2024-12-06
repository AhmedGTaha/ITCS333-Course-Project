<?php

include "../db.php";
session_start();




if(isset($_POST['DeleteTime']) && $_SERVER['REQUEST_METHOD'] == 'POST')
{
    try
    {
     
      $ATID = $_POST['ATID'];
      $sql = "Delete from availabletimeslots where ATID  = '$ATID'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      echo "<script>alert('deleted succesfuly')</script>";
      $_SESSION['deleteTime'] = true;

    } catch(PDOException $e) 
    {
      echo "<script>alert('error in deletion')</script>";
      echo  $e->getMessage(); 
      $_SESSION['deleteTime'] = true;
    }

 header('Location: allRooms.php');

}




?>