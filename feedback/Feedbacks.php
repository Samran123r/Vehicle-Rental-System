<!doctype html>
	<html>
		<head>
  		  <title>
		    Home</title>
		
		</head>
	<style>
	body{
		background-image:url("../images/mainbg.png");
		background-repeat:no-repeat;
		background-attachment:fixed;
}


</style>	
<body>
<?php
require_once('../connection.php');
session_start();
$email = $_SESSION['email'];

if(isset($_POST['submit'])){
	$comment=mysqli_real_escape_string($con,$_POST['comment']);
	$sql="insert into  feedback (EMAIL,COMMENT) values('$email','$comment')";
	$result = mysqli_query($con,$sql);
	echo '<script>alert("Feedback Sent Successfully!!THANK YOU!!")</script>';
	header("Location: ../cardetails.php");

	
}





?>

<button class="btn" style="
                        width: 150px;
                        background: #03918c;
                        color: #fff;
                        border: none;
                        cursor: pointer;
                        padding: 10px;
                        font-size: 18px;
                        margin-left:100px;
						margin-top:25px;
                    "><a href="../cardetails.php" style="
                    text-decoration: none;
                    color: #fff;">Go To Home</a></button>	

<br><br><br>
	<div id="form">	
		
		<div class="col-md-12" id ="mainform">
			<div class="col-sm-6">
			   <h2  class="contact-us" style="font-size:72px; color:#000;"><strong style="font-size:5cm; color:#555;">F</strong>eedback.</h2>
			</div>
			<div class="col-sm-6" >
				<form method="POST">
				<label><h4>Name:</h4> </label><input type="text" name="name" size="20"  class=" form-control" placeholder="User name" required />
				<label><h4>Email:</h4></label> <input type="email" name="email" size="20"  class=" form-control" placeholder="User Email" required/>
				<h4>Comments:</h4><textarea class="form-control"   name="comment" rows="6"  placeholder="Message"  required></textarea>
				<br>
				<input type="submit" class="btn btn-info" id="btn" style="text-shadow:0 0 3px  #03918c; font-size:24px;" value="SUBMIT" name="submit">
				<form>
			</div>
		</div>
	</div>


</div>
	</body>
</html>
