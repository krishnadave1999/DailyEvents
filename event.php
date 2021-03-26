<?php
session_start();
$server="localhost";
$user="root";
$password="";
$dbname="dailyevents";
$conn=mysqli_connect($server,$user,$password,$dbname);
$eName=$_SESSION['evNa'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $eName;?></title>
    <link rel="shortcut icon" type="image" href="logo.jpg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="new5.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Kaushan+Script|Monoton|Trade+Winds&display=swap" rel="stylesheet">
</head>
<body bgcolor="black">
    <?php
        $sql3="select * from events where eveName='$eName'";
        $res=mysqli_query($conn,$sql3);
        $tot=mysqli_fetch_assoc($res);
    ?>
    <div class="cant">
    <h5><?php echo $eName?></h5>
    
 <div class="EVENTS" id="events">
            <img src="<?php echo $tot['evePoster'];?>" alt="">
            <h2 style="position:absolute;top:1%;right:4%;	font-family: 'Orbitron',BOLD;">-Event On-</br><?php echo $tot['eveDate']?></h2>
            <div class="a-event">
            <h3><?php echo $tot['eveName']?></h3>
                    <p>-<?php echo $tot['orgName']?></p>
                        <pre><?php echo  $tot['eveDetails']?></pre> 
                           
             </div>

        </div>
        <div class="ApplyForm">
        <div class="ragis">
   <form method="POST"  enctype="multipart/form-data">
            <input type="text" name="orgName" id="orgName" placeholder="enter your name"/>
            <input type="email" name="orgEmail" id="orgEmail" placeholder="enter your E-mail"/>
            <input type="file" name="image" id="poster">
            <input type="text" name="orgNum" id="" placeholder="Enter your Number"/>
            <select name="orgGender" id="orgGender">
              <option value="m">Male</option>
              <option value="f">Female</option>
            </select>
            <input type="text" name="orgInsta" id="" placeholder="Insta id: abcd12">
            <input type="submit" id="submit" name="go" value=""/>
    
<?php

if (isset($_POST['go'])) {
  // Get image name
$image=$_FILES['image']['name'];
$imgtmp=$_FILES['image']['tmp_name'];
$folder="appDP/".$image;

  $orgName=$_POST['orgName'];
  $orgEmail=$_POST['orgEmail'];
  $orgNum=$_POST['orgNum'];
  $orgGender=$_POST['orgGender'];  
  $orgInsta=$_POST['orgInsta'];
  
if($orgName!="" && $orgEmail!="" && $image!="" && $orgNum!=""  && $orgGender!="" &&$orgInsta!=""){
    move_uploaded_file($imgtmp,$folder);
  $query="INSERT INTO applyes VALUES('$eName','$orgName','$orgEmail','$folder','$orgNum','$orgGender','$orgInsta')";
  $data=mysqli_query($conn,$query);
 if($data){
  echo '<h4  style="color: rgb(235, 235, 235);
  position: absolute;
  font-family: Audiowide;
  top:-50px;
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
    top:-50px;
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
</form>
   </div>
</div>
</div>
</body>
</html>
