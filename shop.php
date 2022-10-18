<?php
	$con = mysqli_connect("localhost","root","","shop_details");
	if(isset($_POST['txtsnm']))
	{
			$snm = $_POST['txtsnm'];
			$sro = $_POST['txtsro'];
			$sno = $_POST['txtsno'];
			$sql ="INSERT INTO `shop_table`(`shop_name`, `shop_route`, `shop_no`) VALUES ('$snm','$sro','$sno')";
			$res=mysqli_query($con,$sql);
	}
?>
	
<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>
	</head>

		<div class="container mt-2">
			<form action="shop.php" method="POST">
				<input type="text" name="txtsnm" class="form-control" placeholder="shop name" required></br>
				<input type="text" name="txtsro" class="form-control" placeholder="shop route   " required></br>
				<input type="text" name="txtsno" class="form-control" placeholder="shop number  "></br>
				<input type="submit" class="btn btn-primary w-100" value="Save">
				
			</form>
		    <table class="table table-bordered txet-center">
			<tr>
			     <th>sr.
				 <th>shop_name
				 <th>shop_route
                 <th>shop_number
                  <th>action
		<?php
       
	           $sql="SELECT * FROM `shop_table`";
				$res=mysqli_query($con,$sql);
				$i=1;
				while($row=mysqli_fetch_assoc($res))
				{
				    	
	    ?>			  
                 <tr>     
                    <td><?php echo $i;?>
					<td><?php echo $row['shop_name'];?>
					<td><?php echo $row['shop_route'];?>
					<td><?php echo $row ['shop_no'];?>
					<td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
					<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-roll="<?php echo $row['shop_name']; ?>" data-bs-nm="<?php echo $row['shop_rotue']; ?>" data-bs-id="<?php echo $row['id']; ?>">Update</button>     
                   
					
          <?php					
					 $i++;
		       } 
		 ?>	  
  </table>
      </div>
	         <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">Update Record</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<form action="shop.php" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">shop_name</label>
            <input type="text" name="txtsnm" class="form-control" id="shop_name">
            <input type="text" name="txtid" class="form-control" id="id" hidden>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">shop_route</label>
            <input type="text" name="txtsro" class="form-control" id="shop_rotueo">
		<div class="mb-3">
            <label for="message-text"class="col-form-label">shop_no</lable>
            <input type="text" name="txtsno" class="form-control" id="shop_no">
           </div>			
          </div>
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-primary w-100">Update</button>
		  </div>
		  </form>
		</div>
	 </div>
		</div>	
	</body>
</html>	

  
<?php 

   if(isset($_POST['txtid']))
	{
		$id = $_POST['txtid'];
		$snm = $_POST['txtsnm'];
		$sro = $_POST['txtsro'];
		$sno = $_POST['txtsno'];
		$sql="UPDATE `shop_table` SET `shop_name`='$snm',`shop_route`='$sro',`shop_no`='$sno' WHERE `id`='id'";
		$res=mysqli_query ($con,$sql);
		 
	}	  
 
?>	  
		  

		  

		  
		  
		  
	  