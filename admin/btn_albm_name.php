<?php
	include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["btn_text"])){
			$code=mysqli_real_escape_string($conn,$_REQUEST["cat_code"]);
			$btn=mysqli_real_escape_string($conn,$_REQUEST["btn_text"]);
			 $rs=mysqli_query($conn,"select * from category_album where album LIKE '$btn%' AND category_code='$code'")or die(mysqli_error($conn));
			 echo "<table class='table table-borderless'>";
			 $flag=0;
			 while($r=mysqli_fetch_array($rs)){
				 if($r["status"]==0){
				  $flag=1;
				 ?>
				 <tr id="a<?php echo $r['code']; ?>">
				 <td style="width:200px"><image src="../album/<?php echo $r['code']; ?>.jpg" style="width:100px;height:70px"class="img-fluid"><br><strong><?php echo $r[2]; ?></strong></td>
					<td><?php //echo $r[2]; ?></td>
					<td><button class="btn btn-success 2" id="<?php echo $r["code"]; ?>"><a href="song_form.php?id=<?php echo $r["code"]; ?>" style="color:white">Add Song</a></button></td>
					<td><i class="fas fa-edit" style="color:blue;cursor:pointer" id="eddit_album" rel="<?php echo $r['code']; ?>"></i></td>
					<td><i class="fas fa-trash" style="color:red;cursor:pointer" id="delete_album" rel="<?php echo $r['code']; ?>"></i></td>
				</tr>
				 <?php
				}
			 }
			 if($flag==0){
				 echo "<tr><td><h4>Record Not Found</h4></td></tr>";
			 }
			 echo "</table>";
		}
	}
?>