<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["code"])&&isset($_REQUEST["cat_name"] )){
			$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
			$cat_name=mysqli_real_escape_string($conn,$_REQUEST["cat_name"]);
			if(mysqli_query($conn,"update category set category='$cat_name' where code='$code'")>0){
				echo "<h4 class='alert alert-success' style='color:green'>Category name updated...</h4>";
			}
			else{
				echo "something wrong";
			}
		}
	}	
	?>