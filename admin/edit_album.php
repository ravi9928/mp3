<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["code"])){
			$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
			
			$rs=mysqli_query($conn,"select * from category_album where code='$code'");
			if($r=mysqli_fetch_array($rs)){
				
			?>	
			<div class="row">
				
					<h4 style="color:blue">	Edit album: </h4>
					<div class="col-xl-12" id="album_alert"></div>
					<div class="col-xl-5">
						<image src="../album/<?php echo $r['code']; ?>.jpg" style="width:350px;height:200px" class="img-fluid">
					</div>
					<div class="col-xl-7">
						<table class="table table-borderless" style="margin-top:-100px">
								<tr><td><label>Album name:</label></td></tr>
								<tr><td><input type="text" id="album_name" value="<?php echo $r['album']; ?>" class="form-control" required></td></tr><br>
								<tr><td><label>Description :</label></td></tr>
								<tr><td><input type="text" value="<?php echo $r['description']; ?>" id="description" class="form-control" rows=3 required></textarea></td></tr><br><br>
								<tr><td><button class="btn btn-info 3" id="<?php echo $r['code']; ?>">Submit</button></td></tr>
						</table>
					</div>	
				
			</div>
			
				
<?php				
			}
			
		}
	}
?>	