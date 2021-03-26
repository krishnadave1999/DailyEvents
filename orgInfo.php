<?php
session_start();
$server="localhost";
$user="root";
$password="";
$dbname="dailyevents";
$conn=mysqli_connect($server,$user,$password,$dbname);
$Email=$_SESSION['Email'];
$sql="select * from orgdata where orgEmail='$Email'";
$result=mysqli_query($conn,$sql);
$num=mysqli_fetch_assoc($result);
?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORGANISER INFORMATION</title>
    <link rel="shortcut icon" type="image" href="logo.jpg" />
    <link rel="stylesheet" type="text/css" media="screen" href="new5.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Kaushan+Script|Monoton|Trade+Winds&display=swap" rel="stylesheet">
    </head>
    <body  background="back1.jpg">
        <h5>ORGANISER CARD</h5>
        <div class="cants">
	       <div class="block">
           <div class="img"></div>
               <img src='<?php echo $num['orgDP'];?>'>
               <h6><?php echo $num['orgName'];?></h6>
               <p>-<?php echo $num['orgCom']?>-</p>
               <div class="GMAIL"><?php echo $num['orgEmail']?></div>
               
               <div class="line"></div>
                <div class="insta"><a href="https://www.instagram.com/<?php echo $num['orgInsta']?>/" target="_blank"><i class="fa fa-instagram"></i></a></div>
  </div>
  
               


	      
</div>

  <div class="nav">
        <ul>
            <li><a href="orgInfo"><i class="fa fa-user"></i>USER</a></li>|
            <li><a href="ORGANISER.php"><i class="fa fa-upload"></i>Create event</a></li>|
            <li><a href="apply.php"><i class="fa fa-bars"></i >Feeds</a></li>|
            <li><a href="new.php"><i class="fa fa-sign-out"></i>logout</a></li>
      </ul>
    
    </div>
    <script>
    $(document).ready(function(){
    $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
});
});
</script>
      
    </body>
</html>