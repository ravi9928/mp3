<?php
	include("db.php");
	if(isset($_REQUEST["albm_code"])){
		$albm_code=mysqli_real_escape_string($conn,$_REQUEST["albm_code"]);
		
?>
<div style="height:800px">
<div class="row">
	<div class="col-sm-12">
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search songs..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />&nbsp;
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fa fa-search"></i></button>
                </div>
            </form>
		</nav>
	</div>
	<div class="col-sm-12">
	<?php
		 $rm=mysqli_query($conn,"select * from category_album where status=0 AND code='$albm_code'");
			if($m=mysqli_fetch_array($rm)){
			?>
		<div class="row">
			<div class="col-sm-5">
				<div class="card mb-2" >
					<image class="card-img-top" src="album/<?php echo $albm_code; ?>.jpg" class="img-fluid">
				 <div class="card-body" style="color:black">
					<h3><b><?php echo $m["2"]; ?><b></h3>
					
				 </div>
				</div>
				
			</div>
			<div class="col-sm-7" style="margin-top:80px;margin-left:20px">
				<b style="font-size:50px"><?php echo $m[2];?></b>
				<h4><?php echo $m["description"];?></h4>
			</div>	
		</div>
		<!--song play div-->		
		<div class="col-sm-12">
				<audio controls autoplay id="play_song"><source src="" type="audio.mpeg"></audio>
		</div>
		<?php
		}
			?>
	<?php
		include("db.php");
		$sn=1;
		$rs=mysqli_query($conn,"select * from song where status=0 AND album_code='$albm_code'");
		echo"<br><br>";
		while($r=mysqli_fetch_array($rs)){
	?>
	<table class="table table-borderless"  style="color:white">
		<tr>
		    <td style="width:1px"><?php echo $sn; ?></td>
			<td style="width:100px"><?php echo $r["title"]?></td>
			<td style="width:150px"><?php echo $r["description"]?></td>
			<td style="width:100px;cursor:pointer"><i id="album/<?php echo $r["album_code"].'/'.$r["sn"]?>" class="fas fa-play"></i></td>
			<?php
			$code=$r['album_code']."-".$r['sn'];
		//	$song_sn=$r['sn'];
			include("db.php");
			if(isset($_COOKIE["login"])){
				$email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
			
				$rv=mysqli_query($conn,"select * from favorites where album_code='$code'");
				if($rt=mysqli_fetch_array($rv)){
					?>
				<td style="width:100px;cursor:pointer"><i class="fas fa-heart" id="<?php echo $r['album_code']."-".$r['sn']?>" style="color:red"></i></td>
				<?php
				}
				else{
					?>
				<td style="width:100px;cursor:pointer"><i class="fas fa-heart" id="<?php echo $r['album_code']."-".$r['sn']?>" style="color:white"></i></td>
				<?php
				}
			}
			else{
					?>
				<td style="width:100px;cursor:pointer"><i class="fas fa-heart" id="<?php echo $r['album_code']."-".$r['sn']?>" style="color:white"></i></td>
				<?php
			}
				?>
		</tr>
	</table>
	<?php
	$sn++;
		}
	?>
	</div>
</div>		
</div>
<?php
		}
	?>