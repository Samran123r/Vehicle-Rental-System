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

// Query to retrieve user's information from the database
$sql = "SELECT * FROM users WHERE EMAIL = '$email'";
$result = mysqli_query($con, $sql);

// Check if user exists
if (mysqli_num_rows($result) > 0) {
    // Fetch user data
    $user = mysqli_fetch_assoc($result);
} else {
    // User not found, handle error or redirect
    echo "User not found";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        .body{
            width: 90%;
            background-image: url("images/mainbg.png");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 95vh;
        }
        .form{
            width: 300px;
            height: 300px;
            background: linear-gradient(to top, rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
            background-color: blur;
            top:-20px;
            left: 870px;
            border-radius: 10px;
            padding: 50px;
            font-size: 22px;
            font-family:sans-serif;
        }
        .h1{
            width:220px;
            font-family: sans-serif;
            text-align: center;
            color:White;
    
            border-radius: 10px;
            margin: 2px;
            padding: 8px;
        }
        .content{
            width:auto;
            height:auto;
            margin: auto;
            padding-top:150px;
            padding-left:600px;
            color:white;
            font-style: bold;
            position: relative;
        }
        .cn{
            width: 160px;
            height: 40px;
            background:#03918c;
            border: none;
            margin-bottom: 10px;
            margin-left: 20px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.4s ease;
        }
    </style>
        
</head>
<body class="body">
    <div class="content">
        <h1 class="h1">Edit Profile</h1>
        <form action="update_profile.php" method="POST" class="form">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="<?php echo $user['FNAME']; ?>">
            <br>
            <br>
            <br>
            
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" value="<?php echo $user['LNAME']; ?>">
            <br>
            <br>
            <br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['EMAIL']; ?>" readonly><br><br>
            
            <br>
            <br>

            <input type="submit" name="submit" value="Update Profile" class="cn">
        </form>
    </div>
</body>
</html>

