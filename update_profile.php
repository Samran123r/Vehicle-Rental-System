<?php
// Include the database connection file
require_once('connection.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve user's email from session
$email = $_SESSION['email'];

// Process form submission
if (isset($_POST['submit'])) {
    // Retrieve form data and sanitize inputs
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    // Update user's profile in the database
    $sql = "UPDATE users SET FNAME = '$fname', LNAME = '$lname' WHERE EMAIL = '$email'";
    
    if (mysqli_query($con, $sql)) {
        // Profile updated successfully
        echo '<script>alert("Profile updated successfully")</script>';
        echo '<script>window.location.href = "edit_profile.php";</script>';
    } else {
        // Error updating profile
        echo "Error updating profile: " . mysqli_error($con);
    }
}
?>


