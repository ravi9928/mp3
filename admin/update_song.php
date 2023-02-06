<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["code"])&&isset($_REQUEST["title"])&&isset($_REQUEST["dec"]) &&isset($_REQUEST["sn"] )){
			$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
			$title=mysqli_real_escape_string($conn,$_REQUEST["title"]);
			$dec=mysqli_real_escape_string($conn,$_REQUEST["dec"]);
			$sn=mysqli_real_escape_string($conn,$_REQUEST["sn"]);
			if(mysqli_query($conn,"update song set title='$title',description='$dec' where album_code='$code' AND sn=$sn")>0){
				echo "<h4 class='alert alert-success' style='color:green'>song updated...</h4>";
			}
			else{
				echo "something wrong";
			}
		}
		else{
			echo "not found data";
		}
	}	
	?>