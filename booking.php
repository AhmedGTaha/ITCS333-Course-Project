
<?php
session_start();

include("db.php");

if ($_SERVER['REQUEST_METHOD'] && isset($_GET['email']))
{
  $Email  = $_GET['email'];
  $ATID = $_GET['ATID'];
  $startTime = $_GET['start'];
  $endTime = $_GET['end'];
  $room =  $_GET['RoomID'];
  $date = $_GET['date'];



  $checkConflict = false;
  try
  {
    $sql = "select ATID,BookDate from book where ATID = '$ATID' and BookDate = '$date'";
    $statment = $conn->prepare($sql);
    $statment->execute();
    $book = $statment->fetch(PDO::FETCH_ASSOC);
  }catch(PDOException $e) 
  {
      echo $sql . "<br>" . $e->getMessage();
  }

  $current_date = new DateTime();
  $date_obj = new DateTime($date);

  $current_time = new DateTime();
  $startTime_obj = new DateTime($startTime);
  $endTime_obj = new DateTime($endTime);
  

  if(!$book && ($date_obj >= $current_date))
  {
    try
   {
       $sql = "insert into book (Email, ATID,BookDate) values (?,?,?)";
       $statment = $conn->prepare($sql);
       $statment->execute([$Email,$ATID,$date]);
       $_SESSION['ReservedRoom'] = $room;
       $_SESSION['Date'] = $date;
       $_SESSION['Time'] = $startTime .  " - " . $endTime;
       $_SESSION['status'] = 'Conformed';
       echo "<h1 style='color:green'>reservation completed</h1>";
       header("Location: Home.php");
    } 
    catch(PDOException $e) 
    {
      echo $sql . "<br>" . $e->getMessage();
      $_SESSION['status'] = 'Database problem';
      echo "<h1 style='color:red'>reservation not completed</h1>";
      header("Location: Home.php");
    }
  }else
  {
       $_SESSION['ReservedRoom'] = "";
       $_SESSION['Date'] = "";
       $_SESSION['Time'] = "";
       $_SESSION['status'] = 'there is a Conflict or the Date/time is already passed';
       header("Location: Home.php");
  }
  
}

?>
