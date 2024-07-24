<?php 
include('dbconnection.php');
if(isset($_POST['submit'])){
   $file_name = $_FILES['image']['name'];
   $tempname=$_FILES['image']['tmp_name'];
   $folder = 'Images/'.$file_name;
   $query=mysqli_query($con,"Insert Into `images` (`file`)  Values ('$file_name')");
   if(move_uploaded_file($tempname, $folder)){
      echo "<h2><CENTER>File Uploaded Successfully</CENTER> </h2>";
      
   }
   else{
      echo "<h2>file not  uploaded </h2>";
      print_r($_FILES);
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>upload file</title>
	
</head>
<body>
      <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image"/>
         <br/> <br/>
         <button type="submit" name ="submit">Submit</button>
      </form>
      <div>
         <?php 
        
           $res=mysqli_query($con, "Select * from `images`");
           while($row=mysqli_fetch_assoc($res)){
           ?>
         <img src="Images/<?php echo $row['file']?>" />
         <?php } ?>
      </div>
</body>
</html>