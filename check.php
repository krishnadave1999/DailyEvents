<?php

$server="localhost";
$user="root";
$password="";
$dbname="dailyevents";
$conn=mysqli_connect($server,$user,$password,$dbname);
error_reporting(0);

        

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
$sql = "SELECT * FROM orgdata WHERE orgEmail = '".$username." AND orgPass = '".$password."'";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result)

        /* $orgEmail=$_POST['orgEmail'];
         $orgPass= $_POST['orgPass'];
         $orgEmail = stripslashes($orgEmail);
         $orgPass = stripslashes($orgPass);
         $orgEmail = mysql_real_escape_string($orgEmail);
         $orgPass = mysql_real_escape_string($orgPass);

         $sql="SELECT * FROM $orgdata WHERE orgEmail='$orgEmail' and orgPass='$orgPass'";
         $result=mysql_query($sql);

         $count=mysql_num_rows($result);
         if ($count==1) {
            echo "Success! $count";
        } else {
            echo "Unsuccessful! $count";
        }*/
        
         ?>