<?php

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['rid']))
{

  try
  {
  
    $requestID = $_POST['rid'];
    $sql = "Delete from book where book.requestID ='$requestID'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "<script>alert('Book deleted succesfuly')</script>";
    $_SESSION['deleteBook'] = true;
    
  } catch(PDOException $e) 
  {
    echo "<script>alert('Error in Deletion')</script>";
    $_SESSION['deleteBook'] = false;
  }

  header('Location: userBookings.php');

}
?>