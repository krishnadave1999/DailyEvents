<?php

   if(isset($_GET['submit'])){
        $orgName=$_GET['orgName'];
$orgCom=$_GET['orgCom'];
$orgEmail=$_GET['orgEmail'];
$orgAdd1=$_GET['orgAdd1'];
$orgAdd2=$_GET['orgAdd2'];
$orgDate=$_GET['orgDOB'];
$orgGender=$_GET['orgGender'];
$orgPass=$_GET['orgPass'];
$orgPass1=$_GET['orgPass1'];
if($orgName==""){
    echo '<h4  style="color: rgb(235, 235, 235);
               position: absolute;
               font-family: Audiowide;
               top:0px;
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
               text-shadow: 0 0 20px red;">plzz enter your Name</h4>';
}elseif($orgCom==""){
    echo '<h4  style="color: rgb(235, 235, 235);
               position: absolute;
               font-family: Audiowide;
               top:0px;
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
               text-shadow: 0 0 20px red;">plzz enter your Company Name</h4>';
}elseif($orgEmail==""){
    echo '<h4  style="color: rgb(235, 235, 235);
               position: absolute;
               font-family: Audiowide;
               top:0px;
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
               text-shadow: 0 0 20px red;">plzz enter your Email</h4>';
}elseif($orgAdd1==""){
    echo '<h4  style="color: rgb(235, 235, 235);
               position: absolute;
               font-family: Audiowide;
               top:0px;
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
               text-shadow: 0 0 20px red;">plzz enter your Address</h4>';
}elseif($orgAdd2==""){
    echo '<h4  style="color: rgb(235, 235, 235);
               position: absolute;
               font-family: Audiowide;
               top:0px;
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
               text-shadow: 0 0 20px red;">plzz enter your Address</h4>';
}elseif($orgPass==""){
    echo '<h4  style="color: rgb(235, 235, 235);
               position: absolute;
               font-family: Audiowide;
               top:0px;
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
               text-shadow: 0 0 20px red;">plzz enter your password</h4>';
}elseif($orgPass2==""){
    echo '<h4  style="color: rgb(235, 235, 235);
               position: absolute;
               font-family: Audiowide;
               top:0px;
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
               text-shadow: 0 0 20px red;">plzz enter your confirm password</h4>';
}elseif($orgPass!=$orgPass2){
    echo '<h4  style="color: rgb(235, 235, 235);
               position: absolute;
               font-family: Audiowide;
               top:0px;
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
               text-shadow: 0 0 20px red;">plzz enter the same password</h4>';
}else{
    $query="INSERT INTO orgdata VALUES('$orgName','$orgCom','$orgEmail','$orgAdd1','$orgAdd2','$orgDOB','$orgGender','$orgPass')";

    $data=mysqli_query($conn,$query,$lquery);
    if($data){
      echo '<h4 style="color: rgb(235, 235, 235);
                position: absolute;
                font-family: EDO SZ;
                top:-120px;
                left:50%;
                transform: translate(-50%,-50%);
                border:3px solid #00ff00;
                height:10%;
                line-height:60px;
                box-shadow:inset 0 0 10px #00ff00;
                text-align: center;
                font-size: 30px;
                text-shadow: 0 0 20px #00ff00;">Your from is submited</h4>';
               
}
}
?>