<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["code"])){
			$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
			
			$rs=mysqli_query($conn,"select * from category where code='$code'");
			if($r=mysqli_fetch_array($rs)){
				$cat_code=$r["code"];
				
			?>	
			<div class="row">
				<div class="col-xl-12">
					<h4 style="color:blue">Add album in <strong style="color:red"><?php echo $r[2];?></strong> category...</h4>
					<div class="col-xl-12" id="albm_alert"></div>
						<form enctype="multipart/form-data" method="post" action="album_add.php?id=<?php echo $r["code"];?>">
					<table class="table table-borderless" style="margin-top:-140px">
							<tr><td><label>Album Name :</label></td>
							<td><input type="text" name="album_name" class="form-control" required></td></tr><br><br>
							<tr><td><label>Upload Album Image :</label></td>
							<td><input type="file" name="photo" class="form-control" ></td></tr><br><br>
							<tr><td><label>Description :</label></td>
							<td><textarea rows=3 name="description" class="form-control" required></textarea></td></tr><br><br>
							<!--<tr><td><button type="button" class="btn btn-info 2" id="<?php //echo $r["code"];?>">Submit</button></td></tr>-->
							<tr><td></td><td><button class="btn btn-warning">Submit</button></td></tr>
						
					</table>
					</form>
				</div>
			</div>
<?php			
			}
		}
	}

		$rv=mysqli_query($conn,"select * from category_album where album LIKE 'A%' AND category_code='$code'");
		  ?> <h4 style="color:blue">Added <strong style="color:red"><?php echo $r[2];?></strong> albums...</h4>
<div class="row" style="margin-top:10px">
	<div class="col-sm-12">
	<?php
		for($i='A' ; $i<='Z' ; $i++){
			 echo "<button class='btn btn-danger 1'>$i</button> ";
				if($i=='Z')
					break;
		}
	?>
	</div>
</div>	
<div class="row">
	<div class="col-xl-12" id="albm_name_record"style="margin-top:20px">	
		 <?php
			while($v=mysqli_fetch_array($rv)){
				if($v["status"]==0){
				?>
				<table class="table table-borderless" style="margin-top:20px">
					<tr id="a<?php echo $r['code']; ?>">
						<td style="width:200px"><image src="../album/<?php echo $v['code']; ?>.jpg" style="width:100px;height:70px"class="img-fluid"><br><strong><?php echo $v[2]; ?></strong></td>
						<td><?php //echo $v[2]; ?></td>
						<td><button class="btn btn-success 2" id="<?php echo $v["code"]; ?>"><a href="song_form.php?id=<?php echo $v["code"]; ?>" style="color:white">Add Song</a></button></td>
						<td><i class="fas fa-edit" style="color:blue;cursor:pointer" id="eddit_album" rel="<?php echo $v['code']; ?>"></i></td>
						<td><i class="fas fa-trash" style="color:red;cursor:pointer" id="delete_album" rel="<?php echo $v['code']; ?>"></i></td>
						</tr>
				</table>
				<?php	
			}
		 }
		 ?>
	</div>
</div>	