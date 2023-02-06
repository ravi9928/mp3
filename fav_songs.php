<div class="col-sm-12">
				 <div class="text-muted"><center style="font-size:100px"><b>My Favorites</b></center></div>
					<center><audio controls autoplay id="play_song"><source src="" type="audio.mpeg"></audio></center>
				</div>
<?php   
	include("db.php");
	if(isset($_COOKIE["login"])){
		$email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
			$rs=mysqli_query($conn,"select * from favorites where email='$email'");
			$sn=1;
			echo "<br><br>";
			while($r=mysqli_fetch_array($rs)){
			$code=mysqli_real_escape_string($conn,$r["album_code"]);
				$rv=explode("-",$code);
				$r1=$rv[0];
				$r2=$rv[1];
				$rm=mysqli_query($conn,"select * from song where album_code='$r1' AND sn='$r2'");
				while($rv=mysqli_fetch_array($rm)){
?>				
					<table class="table table-borderless"  style="color:white">
						<tr>
							<td style="width:1px"><?php echo $sn; ?></td>
							<td style="width:100px"><?php echo $rv["title"]?></td>
							<td style="width:150px"><?php echo $rv["description"]?></td>
							<td style="width:100px;cursor:pointer"><i id="album/<?php echo $rv["album_code"].'/'.$rv["sn"]?>" class="fas fa-play"></i></td>
							<?php
							$rv=mysqli_query($conn,"select * from favorites where album_code='$code' AND email='$email'");
							if($rt=mysqli_fetch_array($rv)){
								?>
							<td style="width:100px;cursor:pointer"><i class="fas fa-heart" id="<?php echo $r1."-".$r2;?>" rel="<?php echo $r1."-".$r2;?>" style="color:red"></i></td>
							<?php
							}
							?>
						</tr>
					</table>			
<?php
					$sn++;
				}
			}
		}
	else{
		echo "<br><br><br><br><center class='text-muted'>Please login first and select your favorites songs...</center>";
	}
?>
<div style="height:800px">
			</div>
					