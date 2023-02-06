<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["code"]) && isset($_REQUEST["sn"])){
			$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
			$sn=mysqli_real_escape_string($conn,$_REQUEST["sn"]);
			$rs=mysqli_query($conn,"select * from song where album_code='$code' AND sn=$sn");
			if($r=mysqli_fetch_array($rs)){
				
			?>	
			<div class="row">
				
					<h4 style="color:blue">	Edit song: </h4>
					<div class="col-xl-12" id="song_alert"></div>
					<div class="col-xl-12">
						<table class="table table-borderless" style="margin-top:-70px">
								<tr><td><label>Song title</label></td></tr>
								<tr><td><input type="text" id="song_title" value="<?php echo $r['title']; ?>" class="form-control" required></td></tr><br>
								<tr><td><label>Description :</label></td></tr>
								<tr><td><textarea id="description" class="form-control" rows=3 required><?php echo $r['description']; ?></textarea></td></tr><br><br>
								<tr><td><button class="btn btn-info 4" id="<?php echo $r['album_code']; ?>" rel="<?php echo $r['sn']; ?>">Submit</button></td></tr>				
						</table>
					</div>	
				
			</div>
			
				
<?php				
			}
			
		}
	}
?>	