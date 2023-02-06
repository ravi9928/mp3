<?php   
	include("db.php");
	if(!isset($_COOKIE["login"])){
		echo "not_login";
	}
	else if(isset($_REQUEST["code"])){
		
		$email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
		$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
		$rs=mysqli_query($conn,"select * from favorites where album_code='$code' AND email='$email'");
			if($r=mysqli_fetch_array($rs)){
				mysqli_query($conn,"DELETE FROM favorites WHERE album_code='$code' AND email='$email'");
				echo "delete";
				
			}
			else if(mysqli_query($conn,"insert into favorites values('$email','$code')")>0){
				echo "success";
			}
	}
	?>