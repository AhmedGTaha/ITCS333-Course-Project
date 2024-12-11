<?php
session_start();
include "../db.php"; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['rid'])) {
    try {
        // Retrieve the request ID from the POST data
        $requestID = $_POST['rid'];

        // Check if $conn is defined and is a PDO object
        if (!isset($conn) || !($conn instanceof PDO)) {
            throw new Exception("Database connection is not established.");
        }

        // Prepare the DELETE query
        $sql = "DELETE FROM book WHERE requestID = :requestID";
        $stmt = $conn->prepare($sql);

        // Bind the parameter
        $stmt->bindParam(':requestID', $requestID, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            $_SESSION['deleteBook'] = "success"; // Use meaningful values
        } else {
            $_SESSION['deleteBook'] = "failure";
        }
    } catch (Exception $e) {
        $_SESSION['deleteBook'] = "failure";
    }

    // Redirect back to userBookings.php
    header('Location: userBookings.php');
    exit;
}

// Display the alert if deleteBook session exists
if (isset($_SESSION['deleteBook'])) {
    if ($_SESSION['deleteBook'] == "success") {
        echo "<script>alert('Booking canceled successfully');</script>";
    } elseif ($_SESSION['deleteBook'] == "failure") {
        echo "<script>alert('Error in cancellation');</script>";
    }

    // Unset the session variable to prevent the alert from reappearing
    unset($_SESSION['deleteBook']);
}
?>
