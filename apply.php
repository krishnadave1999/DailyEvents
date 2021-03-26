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
    <title>Applyers</title>
    <link rel="shortcut icon" type="image" href="logo.jpg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="new6.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Kaushan+Script|Monoton|Trade+Winds&display=swap" rel="stylesheet">

</head>

<body background="back1.jpg">
<div class="nav">
        <ul>
            <li><a href="orgInfo.php"><i class="fa fa-user"></i>USER</a></li>|
            <li><a href="ORGANISER.php"><i class="fa fa-upload"></i>Create event</a></li>|
            <li><a href="apply.php"><i class="fa fa-bars"></i >Feeds</a></li>|
            <li><a href="new.php"><i class="fa fa-sign-out"></i>logout</a></li>
      </ul>
    
    </div>
    </div>
    <script>
    $(document).ready(function(){
    $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
});
});
</script>
<?php
if(isset($_POST['delete'])){
    $k1=$_POST['nameID'];
    $sql3="DELETE FROM events WHERE eveEmail='$Email' && eveName='$k1'";
    $sql4="DELETE FROM applyes WHERE eveName='$k1'";
    $sql5=$sql3.";".$sql4;
    $data=mysqli_multi_query($conn,$sql5);
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
     text-shadow: 0 0 20px #00ff00;">Recored Deleted</h4>';
    }
   }
   
?>
   
   <div class="ragis">
   <?php
if(isset($_POST['apply'])){
    $kd=$_POST['nameID'];
    
    ?>
    <div class="record">
    <button class="close fa fa-close" id="close"></button>
    <h2><?php echo $kd?></h2>
    <div class="line"></div>
    <table>
    <tr>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>NUMBER</th>
            <th>GENDER</th>
            <th>INSTA ID</th>                
        </tr>
    
<?php
    $sql2="select * from applyes where eveName='$kd'";
    $ress=mysqli_query($conn,$sql2);
   while($tot1=mysqli_fetch_assoc($ress)){
    ?>
    <tr>
             <td class='C'><?php echo $tot1['appName']?></td>
             <td class='C'><?php echo $tot1['appEmail']?></td>
             <td class='C'><?php echo $tot1['appNum']?></td>
             <td class='C'><?php echo $tot1['appGender']?></td>
             <td class='C'><?php echo $tot1['appInsta']?></td>
             </tr>
    <?php
   }
   ?>
   
   </table>
   </div>
   <?php
}
?>

   
    <?php
    $sql1="select * from events where eveEmail='$Email'";
    $res=mysqli_query($conn,$sql1);
   while($tot=mysqli_fetch_assoc($res)){
   ?>
<form method="POST">
<div class="blocks">
   <h2 style="font-family='Black Ops One', cursive;" name="evesName"><?php echo $tot['eveName']?></h2>
                       <button class="btndown" name="apply">SHOW RECORDES                    
                        <input type="hidden" name="nameID" value="<?php echo $tot['eveName']?>"/>
                        </button>  
                        <button class="delbtn" name="delete">DELETE EVENT                    
                        </button>   

        </div>
        </form>
        <?php
    
   }
   
   ?>
</div>

<script>
    $(document.getElementById('close')).on('click',function(){
                 $(document.getElementsByClassName('record')).css("display","none");           
             })
</script>

</body>
</html>