<?php
	$con = mysqli_connect("localhost","root","","bhumi");
	$id=$_REQUEST['id'];
	$sql=" DELETE FROM  `stud_info` WHERE `id`='$id'";
	$res=mysqli_query($con ,$sql);
	header("location:data.php");
	
?>