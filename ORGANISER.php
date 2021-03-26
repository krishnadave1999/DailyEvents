<?php
session_start();
$server="localhost";
$user="root";
$password="";
$dbname="dailyevents";
$conn=mysqli_connect($server,$user,$password,$dbname);
$Email=$_SESSION['Email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORGANISER portal</title>
    <link rel="shortcut icon" type="image" href="logo.jpg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="new5.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Kaushan+Script|Monoton|Trade+Winds&display=swap" rel="stylesheet">
</head>
<body background="back1.jpg">
    
    <h5>CREATE YOUR EVENT</h5>

   <div class="ragis">
   <form method="POST"  enctype="multipart/form-data">
        
        <input type="text"  name="eveName" placeholder="EVENT NAME...." />
        <input type="email" name="eveEmail" placeholder="Please enter your Email" value="<?php echo $Email;?>"/>
          <input type="file" name="image" id="poster" placeholder="POSTER">
        <textarea name="eveDetails" rows="7" cols="100" id="evcontent" placeholder="Enter some information about your event......"></textarea>
        <input name="orgName" type="text" placeholder="ORGANISER Name..." id="evorg" />
        <input name="eveAdd" type="text" placeholder="Enter your event address" id="evaddress" />
        <input type="text" name="eveDate" placeholder="Enter Event date" id="evdate"/>
        
        
        <input type="submit" name="upload" id="org" value=""/>
    </form>
<?php

if (isset($_POST['upload'])) {
  // Get image name
  $image = $_FILES['image']['name'];
  $imgtmp=$_FILES['image']['tmp_name'];

  // image file directory
  $folder="EVENTS/".$image;
  move_uploaded_file($imgtmp,$folder);

  $eveName=$_POST['eveName'];
  $eveEmail=$_POST['eveEmail'];
  
  $eveDetails=$_POST['eveDetails'];
  $orgName=$_POST['orgName'];  
  $eveAdd=$_POST['eveAdd'];
  $eveDate=$_POST['eveDate']; 

if($eveName!="" && $eveEmail!="" && $image!="" && $eveDetails!="" && $orgName!="" && $eveAdd!="" && $eveDate!=""){
  move_uploaded_file($imgtmp,$folder);

  $query="INSERT INTO events VALUES('$eveName','$eveEmail','$folder','$eveDetails','$orgName','$eveAdd','$eveDate')";
  $data=mysqli_query($conn,$query);
 if($data){
  echo '<h4  style="color: rgb(235, 235, 235);
  position: absolute;
  font-family: Audiowide;
  top:-120px;
  left:50%;
  transform: translate(-50%,-50%);
  width:50%;
  border-radius: 0px 0px 20px 20px;
  border:3px solid #00ff00;
  box-shadow: 0 0px 10px #00ff00;
  height:5%;
  line-height:30px;
  text-align: center;
  font-size: 15px;
  text-shadow: 0 0 20px #00ff00;">Registration Complete</h4>';
 }
}else{
  echo '<h4  style="color: rgb(235, 235, 235);
    position: absolute;
    font-family: Audiowide;
    top:-120px;
    left:50%;
    transform: translate(-50%,-50%);
    width:50%;
    border-radius: 0px 0px 20px 20px;
    border:3px solid red;
    box-shadow: 0 0px 10px red;
    height:5%;
    line-height:30px;
    text-align: center;
    font-size: 15px;
    text-shadow: 0 0 20px red;">Uploading Error</h4>';
}
}

?>

   </div>
   <div class="nav">
        <ul>
            <li><a href="orgInfo.php"><i class="fa fa-user"></i>USER</a></li>|
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