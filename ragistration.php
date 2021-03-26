<?php
$server="localhost";
$user="root";
$password="";
$dbname="dailyevents";
$conn=mysqli_connect($server,$user,$password,$dbname);
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
    <div class="back">
        <a href="new.php">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    <h5>CREATE YOUR EVENT</h5>

   <div class="ragis">
   <form method="POST"  enctype="multipart/form-data">
            <input type="text" name="orgName" id="orgName" placeholder="enter your name"/>
            <input type="text" name="orgCom" id="orgCom" placeholder="enter your Company name"/>
            <input type="email" name="orgEmail" id="orgEmail" placeholder="enter your E-mail"/>
            <input type="file" name="image" id="poster">
            <input type="text" name="orgNum" id="" placeholder="Enter your Number"/>
            <input type="text" name="orgAdd1" id="orgAdd1" placeholder="enter your Address1"/>
            <input type="text" name="orgAdd2" id="orgAdd2" placeholder="enter your Address2"/>
            <input type="text" name="orgDOB" id="orgDOB" placeholder="Enter Your DOB(MM/DD/YYYY)"/>
            <select name="orgGender" id="orgGender">
              <option value="m">Male</option>
              <option value="f">Female</option>
            </select>
            <input type="password" name="orgPass" id="pass" placeholder="enter your password"/>
            <input type="password" name="orgPass1" id="cpass" placeholder="confirme password"/>
            <input type="text" name="orgInsta" id="" placeholder="Insta id: abcd12">
            <input type="submit" id="submit" name="submit" value=""/>
    </form>
<?php

if (isset($_POST['submit'])) {
  // Get image name
  $image = $_FILES['image']['name'];
  $imgtmp=$_FILES['image']['tmp_name'];

  // image file directory
  $folder="orgDP/".$image;

  $orgName=$_POST['orgName'];
  $orgCom=$_POST['orgCom'];
  
  $orgEmail=$_POST['orgEmail'];
  $orgNum=$_POST['orgNum'];
  $orgAdd1=$_POST['orgAdd1'];  
  $orgAdd2=$_POST['orgAdd2'];
  $orgDOB=$_POST['orgDOB']; 
  $orgGender=$_POST['orgGender'];  
  $orgPass=$_POST['orgPass'];
  $orgPass1=$_POST['orgPass1']; 
  $orgInsta=$_POST['orgInsta'];
if($orgName!="" && $orgCom!="" && $orgEmail!="" && $image!="" && $orgNum!="" && $orgAdd1!="" && $orgAdd2!="" && $orgDOB!="" && $orgGender!="" && $orgPass!="" && $orgPass==$orgPass1 && $orgInsta!=""){
  move_uploaded_file($imgtmp,$folder);

  $query="INSERT INTO orgdata VALUES('$orgName','$orgCom','$orgEmail','$folder','$orgNum','$orgAdd1','$orgAdd2','$orgDOB','$orgGender','$orgPass','$orgInsta')";
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
    
   
</body>
    

</html>
