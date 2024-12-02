<?php

session_start();

include("db.php");

if ($_SERVER['REQUEST_METHOD'] && isset($_POST['rid']))
{
    $requestID = $_POST['rid'];

try
{
  $sql = "DELETE FROM book WHERE requestID = '$requestID'";
  $statment = $conn->prepare($sql);
  $statment->execute();
  $_SESSION['deleted'] = true;  
  header("Location: Home.php");
}catch(PDOException $e) 
{
    echo $sql . "<br>" . $e->getMessage();
    $_SESSION['deleted'] = false;  
    header("Location: Home.php");
}
}




?>