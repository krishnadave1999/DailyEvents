<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "dailyevents");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload']) && isset($_POST['names'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
	  $eveNames = mysqli_real_escape_string($db, $_POST['names']);
	  $eveEmail = mysqli_real_escape_string($db, $_POST['eveEmail']);
	  $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

	  $orgName = mysqli_real_escape_string($db, $_POST['orgName']);

	  $eveAdd = mysqli_real_escape_string($db, $_POST['eveAdd']);

	  $eveDate = mysqli_real_escape_string($db, $_POST['eveDate']);

	  


  	// image file directory
  	$target = "EVENTS/".basename($image);

  	$sql = "INSERT INTO events VALUES ('$eveNames','$eveEmail',$image', '$image_text','$orgName','$eveAdd','$eveDate)";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="new5.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Audiowide|Black+Ops+One|Kaushan+Script|Monoton|Trade+Winds&display=swap" rel="stylesheet">
</head>
<body background="back1.jpg">
    
    <h5>CREATE YOUR EVENT</h5>
	 <div class="ragis">
  <form method="POST" action="index.php" enctype="multipart/form-data">
        <input type="text" name="Names"  placeholder="Please enter your name"/>
        <input type="email" name="eveEmail" placeholder="Please enter your Email" />
  	  <input type="file" name="image" id="poster">
      <textarea id="text" cols="40" rows="4" name="image_text" placeholder="Say something about this image..."></textarea>
		  <input name="orgName" type="text" placeholder="ORGANISER Name..." id="evorg" />
        <input name="eveAdd" type="text" placeholder="Enter your address" id="evaddress" />
		<input type="text" name="eveDate" placeholder="Enter your BirthDate" id="evdate"/>
		

  		<input type="submit" name="upload" value=""/>
  	
  </form>
</div>
</body>
</html>