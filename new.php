
<?php
session_start();
$server="localhost";
$user="root";
$password="";
$dbname="dailyEvents";
$conn=mysqli_connect($server,$user,$password);

mysqli_select_db($conn,$dbname);
if(isset($_POST['submit'])){
                      $orgEmail=$_POST['orgEmail'];
                      $orgPass=$_POST['orgPass'];

                      $sql="select * from orgdata where orgEmail='$orgEmail' AND orgPass='$orgPass'";

                      $result=mysqli_query($conn,$sql);
                      $num=mysqli_num_rows($result);
                      if($num==1){
                          $_SESSION['Email']=$orgEmail;
                         header('location:orgInfo.php');
                         echo "<script type='text/javascript'>alert('you are login');</script>";
                       }
                      else{
                          header('location:new.php');
                          echo "<script type='text/javascript'>alert('id pass are wrong');</script>";
                          
                      }
                    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAILY EVENTS</title>
    <link rel="shortcut icon" type="image" href="logo.jpg" />
    <script src="new.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="new5.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Kaushan+Script|Monoton|Trade+Winds|Montserrat+Alternates&display=swap" rel="stylesheet">
</head>
<body>
    <div class="nav">
        <ul>
        <li id="HOME"><a class="active" href="#events">HOME</a></li>>
        <li id="ABOUT"><a href="#about">ABOUT</a></li>>
        <li id="CONTECTS"><a href="#contect">CONTECTS</a></li>     |
        <li id="login"><a class="logins" onclick="return action1()" href="#">LOG-IN ORGANISER</a></li>
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
        <div class="follow">
            <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        
              </ul>
        </div>
<?php
if(isset($_POST['apply'])){
    $_SESSION['evNa']=$_POST['nameID'];
    echo $_SESSION['evNa'];
    header('location:event.php');
}
?>
       
<div class="cant" id="cant">
    <h1>DAILY   EVENTS</h1>
   
    <?php
    $sql1="select * from events";
    $res=mysqli_query($conn,$sql1);
   while($tot=mysqli_fetch_assoc($res)){
   ?>
<form method="POST">
 <div class="EVENTS" id="events">
            <img src="<?php echo $tot['evePoster'];?>" alt="">
            <div class="a-event">
            <h3><?php echo $tot['eveName']?></h3>
                    <p>-<?php echo $tot['orgName']?></p>
                        <pre><?php echo  $tot['eveDetails']?></pre> 
                        <button class="button" name="apply">APPLY NOW                       
                        <input type="hidden" name="nameID" value="<?php echo $tot['eveName']?>"/>
                        </button>     
             </div>

        </div>
        </form>
        <?php
    
   }
   
   ?>

 
    
      
        <div class="end">
            <div class="about" id="about">
                <hr><span>About</span><hr>
      	<p>Fusce at risus eget mi auctor pulvinar. Suspendisse maximus venenatis pretium. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam purus purus, lacinia a scelerisque in, luctus vel felis. Donec odio diam, dignissim a efficitur at, efficitur et est. Pellentesque semper est ut pulvinar ullamcorper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla et leo accumsan, egestas velit ac, fringilla tortor. Sed varius justo sed luctus mattis.</p>
      	<div class="img">
      	<img src="user.png">
      	<hr>
      	<span class="a">Manager</span>
      	<p>Krishna Dave</p>
      	<hr>
      </div>
      <div class="img">
      	<img src="user.png">
      	<hr>
      	<span class="a">D B A</span>
      	<p>shaifali Gupta</p>
      	<hr>
      </div>
      <div class="img">
      	<img src="user.png">
      	<hr>
      	<span class="a">Incharge</span>
      	<p>Mayank </p>
      	<hr>
      </div>
</div>
            <div class="about" id="contect">
                <hr><span>Contact</span><hr>
      	<div class="contact">
      		<i class="fa fa-map-marker"></i>
      		<span class="a">Location</span>
             <p>NIET</p>
      	</div>
      	<div class="contact">
      		<i class="fa fa-phone"></i>
      		<span class="a">call us</span>
             <p>+91 7891 895 750</p>
         </div>
      	<div class="contact">
      		<i class="fa fa-clock-o"></i>
      		<span class="a">opning time</span>
             <p>09:30 AM – 11:00 PM
             Every Day</p>
         </div>
      </div>
            </div>
        </div>
    </div>
         <div class="log" id="tra">
                <button class="close fa fa-close" id="close"></button>
             <h3>Log-In your ID</h3>
             <hr>
             <form method="POST" id="loginform">
             <input type="text" name="orgEmail" id="orgEmail" placeholder="Enter your id..."/>
             <input type="password" id="orgPass" name="orgPass" placeholder="Enter you password..."/>
             <a href="ragistration.php">Create your account</a>
             <input type="submit" id="loginss" name="submit" value=""/>
            </form>
         </div>

       
        
<script>
             $(document.getElementById('close')).on('click',function(){
                 $(document.getElementsByClassName('login')).toggleClass('log'),
                 $(document.getElementsByClassName('log')).toggleClass('login');
                 $(document.getElementsByClassName('logins')).removeClass('acti');
            
             });
             $(document.getElementById('login')).on('click',function(){
                 $(document.getElementsByClassName('log')).toggleClass('login'),
                 $(document.getElementsByClassName('login')).toggleClass('log');
                 $(document.getElementsByClassName('logins')).addClass('acti');
             })
            </script>

</body>
</html>
