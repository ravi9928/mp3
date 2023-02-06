<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["code"])&&isset($_REQUEST["album_name"])&&isset($_REQUEST["dec"] )){
			$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
			$album_name=mysqli_real_escape_string($conn,$_REQUEST["album_name"]);
			$dec=mysqli_real_escape_string($conn,$_REQUEST["dec"]);
			if(mysqli_query($conn,"update category_album set album='$album_name',description='$dec' where code='$code'")>0){
				echo "<h4 class='alert alert-success' style='color:green'>Album updated...</h4>";
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