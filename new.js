function action1(){
    $(document.getElementById('close')).on('click',function(){
        $(document.getElementsByClassName('login')).toggleClass('log'),
        $(document.getElementsByClassName('log')).toggleClass('login');
        $(document.getElementsByClassName('logins')).removeClass('acti');
   
    });
    $(document.getElementById('login')).on('click',function(){
        $(document.getElementsByClassName('log')).toggleClass('login'),
        $(document.getElementsByClassName('login')).toggleClass('log');
        $(document.getElementsByClassName('logins')).addClass('acti');
    });
}
$(document).ready(function(){
    $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
});
});






<div class="ragis">
   <form method="POST"  enctype="multipart/form-data">
        
        <input type="text"  name="eveName" placeholder="EVENT NAME...." />
        <input type="email" name="eveEmail" placeholder="Please enter your Email" />
      <!--  <label for="file-upload" name="evePoster" class="custom-file-upload">
            <i class="fa fa-cloud-upload" name="eveupic" style="color:#71097a"></i> Upload Image
          </label>
          <input id="file-upload" name='upload_cont_img' type="file" style="display:none;"/>-->
          <input type="file" name="image" id="poster">
        <textarea name="eveDetails" rows="7" cols="100" id="evcontent"></textarea>
        <input name="orgName" type="text" placeholder="ORGANISER Name..." id="evorg" />
        <input name="eveAdd" type="text" placeholder="Enter your address" id="evaddress" />
        <input type="text" name="eveDate" placeholder="Enter your BirthDate" id="evdate"/>
        
        
        <input type="submit" name="uplpad" id="org" value=""/>
    </form>
<?php

if (isset($_POST['upload'])) {
  // Get image name
  $image = $_FILES['image']['name'];

  // image file directory
  $target = "EVENTS/".basename($image);

  $imgupd=move_uploaded_file($_FILES['image']['tmp_name'], $target)
 

  $eveName=$_POST['eveName'];
  $eveEmail=$_POST['eveEmail'];
  
  $eveDetails=$_POST['eveDetails'];
  $orgName=$_POST['orgName'];  
  $eveAdd=$_POST['eveAdd'];
  $eveDate=$_POST['eveDate']; 



if($eveName==""){
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
 text-shadow: 0 0 20px red;">plzz enter Event Name</h4>';         
}
elseif($eveEmail==""){
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
 text-shadow: 0 0 20px red;">plzz enter your Email</h4>';
}
elseif($imgupd!=true){
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
    text-shadow: 0 0 20px red;">plzz select your poster</h4>';
   }elseif($eveDetails==""){
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
 text-shadow: 0 0 20px red;">plzz enter something about you event</h4>';
}elseif($orgName==""){
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
    text-shadow: 0 0 20px red;">plzz enter Organiser Namw</h4>';
}elseif($eveAdd==""){
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
 text-shadow: 0 0 20px red;">plzz enter Event Address</h4>';
}elseif($eveDate==""){
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
    text-shadow: 0 0 20px red;">plzz enter Event Date</h4>';
}
else{
 $query="INSERT INTO events VALUES('$eveName','$eveEmail','$image','$eveDetails','$orgName','$eveAdd','$eveDate')";

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

}
}

?>

   </div>
  <!-- <script>
       $('#file-upload').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#file-upload')[0].files[0].name;
  $(this).prev('label').text(file);
});

   </script>-->
    







   <?php
        //connect with mysql
        $con= mysqli_connect('localhost','root','');
        // select database
        mysqli_select_db($con,'hostel');
        
        //select query
        $sql ="SELECT * FROM `data`";


        // execute the query

        $records=mysqli_query($con,$sql);

        
        
        
        ?>


            <table width="400px">
                <tr>
                    <th>sno</th>
                    <th>id</th>
                    <th>name</th>
                    <th>branch</th>
                    <th>date</th>
                    <th>subject</th>
                    <th>permission</th>
                    <th>action</th>

                    
                </tr>

            <?php
            
                while($row=mysqli_fetch_array($records))

            {
                echo "<tr><form action= update.php method=post>";
               
               
                echo"<td class='C'><input type = text class = 'A' name= sno value='".$row['sno']."'></td>";
                echo"<td class='C'><input type = text class = 'D' name= id value='".$row['id']."'></td>";
                echo"<td class='C'><input type = text class = 'B' name= Name value='".$row['Name']."'></td>";
                echo"<td class='C'><input type = text class = 'B' name= Branch value='".$row['Branch']."'></td>";
                echo"<td class='C'><input type = text class = 'B' name= Date value='".$row['Date']."'></td>";
                echo"<td class='C'><input type = text class = 'B' name= Subject value='".$row['Subject']."'></td>";
                echo"<td class='C'><input type = text class ='B' name= permission value='".$row['permission']."'></td>";
              
                echo"<td><input type = submit>";
              //echo "<td><a href =delete.php?sno=".$row['sno'].">Delete</a></td>";
               echo" <td><a href = 'delete.php?sno=$row[sno]'>Delete</a></td>";

                echo"</form></tr>"; 



















                
            }
            
            
            ?>