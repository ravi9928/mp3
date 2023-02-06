<?php
	include("db.php");
	if(isset($_REQUEST["song"])){
		$song=mysqli_real_escape_string($conn,$_REQUEST["song"]);
		?>

<audio controls><source src="<?php echo $song;?>.mp3" type="audio.mpeg"></audio>

<?php
	}
	?>
