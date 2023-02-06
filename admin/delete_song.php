<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["code"]) && isset($_REQUEST["sn"])){
			$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
			$sn=mysqli_real_escape_string($conn,$_REQUEST["sn"]);
			$status=1;
			$rs=mysqli_query($conn,"select * from song where album_code='$code'");
			if($r=mysqli_fetch_array($rs)){
				if(mysqli_query($conn,"update song set status='$status' where album_code='$code' AND sn=$sn")>0){
				echo "success";
				}
			}	
		}
	}	
	?>