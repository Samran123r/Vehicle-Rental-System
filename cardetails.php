<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Details</title>
<style>
    *{
        margin: 0;
        padding: 0;

    }

    body{
        background: url("./images/cars.jpg");
        background-position: center;
        background-size: cover;
    
    }

    .navbar{
        width: 1200px;
        height: 75px;
        margin: auto;
    }

    .icon{
        width:200px;
        float: left;
        height : 70px;
    }

    .menu{
        width: 400px;
        float: left;
        height: 70px;
    }

    ul{
        float: left;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    ul li{
        list-style: none;
        margin-left: 55px;
        margin-top: 27px;
        font-size: 14px;

    }

    ul li a{
        text-decoration: none;
        color:black;
        font-family: Arial;
        font-weight: bold;
        transition: 0.4s ease-in-out;

    }

    ul li a:hover{
        color:#03918c;

    }
    .box{
        position:center;
        top: 50%;
        left: 50%;
        padding: 20px;
        box-sizing: border-box;
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 5px 15px rgba(0,0,0,.5);
        background: linear-gradient(to top, rgba(255, 251, 251, 0.8)50%,rgba(250, 246, 246, 0.8)50%);
        display: flex;
        align-content: center;
        width: 680px;
        height: 200px;
        margin-top: 100px;
        margin-left: 350px;
    }
    .box .imgBx{
        width: 150px;
        flex:0 0 150px;
    }

    .box .imgBx img{
        max-width: 150%;
    }

    .box .content{
        padding-left: 100px;
    }

    .utton{
        width: 240px;
        height: 40px;
    
        background: #03918c;
        border:none;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color:#fff;
        transition: 0.4s ease;
    }

    .de{
        float: left;
        clear: left;
        display: block;

    }

    .de li a:hover{
        color:black;

    }
    .de .lis:hover{
        color: white;
    }


    .nn{
        width:100px;
        border:none;
        height: 40px;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color:white;
        transition: 0.4s ease;

    }


    .nn a{
        text-decoration: none;
        color: black;
        font-weight: bold;
        
    }

    .overview{
        text-align: center;

        margin-top: 40px;
    }

    .circle{
        border-radius:48%;
        width:65px;
    }

    .phello{
        width: 200px;
        margin-left: -50px;
        padding: 0px;
    }

    #stat{
        margin-left: -8px;
    }

    .search-bar {
        margin-top: 20px; 
        text-align: center;
    }

    .search-bar input[type="text"] {
        width: 300px; 
        padding: 10px;
        border: 2px solid #ccc; 
        border-radius: 5px; 
        outline: none; 
        font-size: 16px; 
    }

    .search-bar input[type="text"]:focus {
        border-color: #ff7200; 
    }

    .search-bar input[type="text"]::placeholder {
        color: #999; 
    }

</style>
</head>

<body class="body">



<?php 
    require_once('connection.php');
        session_start();

    $value = $_SESSION['email'];
    $_SESSION['email'] = $value;
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $sql2="select *from cars where AVAILABLE='Y'";
    $cars= mysqli_query($con,$sql2);
    
    ?>


  <div class="cd">
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 ></h2>
            </div>
            <div class="menu">
               
                <ul>
                    <li><a href="cardetails.php">HOME</a></li>
                    <li><a href="aboutus2.html">ABOUT</a></li> 
                    <li><a href="contactuss.html">CONTACT</a></li>
                    <li><a href="./feedback/Feedbacks.php">FEEDBACK</a></li>
                    <li><button class="nn"><a href="index.php">LOGOUT</a></button></li>
                    <li><img src="images/profile.png" class="circle" alt="Alps"></li>
                    <li><p class="phello">HELLO! &nbsp;<a href="edit_profile.php" id="pname"><?php echo $rows['FNAME']." ".$rows['LNAME']?></a></p></li> </a>
                    <li><a id="stat" href="bookinstatus.php">BOOKING STATUS</a></li>
                </ul>
            </div>
                
        </div>
      <div><h1 class="overview"> VEHICLE FLEET</h1><br/><br/>

              <div class="search-bar"><br/>
            <input type="text" id="searchInput" placeholder="Search by vehicle name"><br/>
        </div>


    <ul class="de">
    <?php
        while($result= mysqli_fetch_array($cars))
        {
            
    ?>    
    
    <li>
    <form method="POST">
    <div class="box">
       <div class="imgBx">
            <img src="images/<?php echo $result['CAR_IMG']?>">
        </div>
        <div class="content">
            <?php $res=$result['CAR_ID'];?>
            <h1><?php echo $result['CAR_NAME']?></h1>
            <h2>Fuel Type : <a><?php echo $result['FUEL_TYPE']?></a> </h2>
            <h2> SEATING CAPACITY : <a><?php echo $result['CAPACITY']?></a> </h2>
            <h2>Rent Per Day : <a>Rs.<?php echo $result['PRICE']?>/-</a></h2>
            <button type="submit"  name="booknow" class="utton" style="margin-top: 5px;"><a href="booking.php?id=<?php echo $res;?>">book</a></button>
        </div>
    </div></form></li>
    <?php
        }
    
    ?>
    <?php 
    require_once('connection.php');
        
    $value = $_SESSION['email'];
    
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    
    ?>       
    </ul>
    </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".box").filter(function() {
                    $(this).toggle($(this).find("h1").text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script> 

</body>
</html>