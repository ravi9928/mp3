<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["ch"])){
			$text=mysqli_real_escape_string($conn,$_REQUEST["ch"]);
			$rs=mysqli_query($conn,"select * from category where category LIKE '$text%'")or die(mysqli_error($conn));
			echo "<table class='table table-borderless'>";
			$flag=0;
			 while($r=mysqli_fetch_array($rs)){
				  $flag=1;
				 ?>
				 <tr id="r<?php echo $r['code']; ?>">
					<td style="width:200px"><?php echo $r[2]; ?></td>
					<td><button class="btn btn-success 1" id="<?php echo $r[1]; ?>">Add Album</button></td>
					<td><i class="fas fa-edit" style="color:blue;cursor:pointer" id="eddit_cat" rel="<?php echo $r['code']; ?>"></i></td>
					<td><i class="fas fa-trash" style="color:red;cursor:pointer" id="delete_cat" rel="<?php echo $r['code']; ?>"></i></td>
				</tr>
				 <?php
				 
			 }
			 if($flag==0){
				 echo "<tr><td><h4 style='color:red'>Record Not Found</h4></td></tr>";
			 }
			 echo "</table>";
		}	 
	}