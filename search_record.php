<?php
include("db.php");
$sn=1;
	$search=mysqli_real_escape_string($conn,$_REQUEST["search"]);
     $rm=mysqli_query($conn,"select * from song where title LIKE '$search%' OR title LIKE '%$search%' OR  title LIKE '%$search'");
	 while($r=mysqli_fetch_array($rm)){
		 ?>
		<table class="table table-borderless"  style="color:white">
		<tr>
		    <td style="width:70px"><?php echo $sn; ?></td>
			<td style="width:120px"><?php echo $r["title"]?></td>
			<td style="width:150px"><?php echo $r["description"]?></td>
			<td style="width:30px;cursor:pointer"><i id="album/<?php echo $r["album_code"].'/'.$r["sn"]?>" class="fas fa-play"></i></td>
			<?php
			$code=$r['album_code']."-".$r['sn'];
			if(isset($_COOKIE["login"])){
				$email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
			
				$rv=mysqli_query($conn,"select * from favorites where album_code='$code' AND email='$email'");
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	