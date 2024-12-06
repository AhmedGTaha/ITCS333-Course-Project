<?php

include "../db.php";
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deletUser']))
{

    try
    {
      $email = $_POST['Email'];
      $sql = "DELETE FROM users WHERE Email = '$email'";
      $stmt = $conn->prepare($sql);
      $stmt->execute(); 
      $_SESSION['deleteUser'] = true;

    }catch(PDOException $e)
    {
        $_SESSION['deleteUser'] = false;
    }

    header("Location: allUsers.php");
}


?>