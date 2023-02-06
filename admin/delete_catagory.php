<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["code"])){
			$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
			$status=1;
			$rs=mysqli_query($conn,"select * from category where code='$code'");
			if($r=mysqli_fetch_array($rs)){
				if(mysqli_query($conn,"update category set status='$status' where code='$code'")>0){
				echo "success";
				}
			}	
		}
	}	
	?>