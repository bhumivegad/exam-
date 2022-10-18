//w.a.p to upload,rename and display pic. in table.

<?php
   $con=mysqli_connect("localhost","root","","bhumi");
   if(isset($_FILES['picture']))
	{   
        
	    $filename=$_FILES['picture'];
		$target_dir="image/";
		$target_file=$target_dir.basename($_FILES["picture"]["name"]);
		$temp=explode(".",$_FILES['picture']['name']);
		$newfilename=rand(35000,350000).'.'.end($temp);
		move_uploaded_file($_FILES["picture"]["tmp_name"],$target_dir.$newfilename);
		$sql="INSERT INTO `image`(`picture`) VALUES ('$newfilename')";
		$res=mysqli_query($con,$sql);
   }
?>

 
 <head>
	   
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/css/bootstrap.min.css"/>
</head>
<div class="container-fluid mt-2">
 <form action="pic.php" method="POST" enctype="multipart/form-data">
<input type="file"  class="from-control" name="picture"  accept=".jpg,.png,.jpeg"></br></br>
<input type ="submit" value="save" class="btn btn-primary">
</div>
</form>
<table class="table table-bordered text-center ">
<div class="container mt-2">
<tr>
	<th>picture
  <?php
		$sql="SELECT * FROM `image`";
		$res=mysqli_query($con,$sql);
		while($row=mysqli_fetch_assoc($res))
		{
 ?>
  <tr>
     <td><img src="<?php echo "image/".$row['picture'];?>" height="100" width="100">
	<?php
	      }
		?>
</div>
</table>		 
