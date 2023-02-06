<?php
include("db.php");
	if(empty($_POST["email"]) || empty($_POST["password"])){
		header("location:index.php?empty=1");
	}
	else{
		$email=mysqli_real_escape_string($conn,$_POST["email"]);
		$password=mysqli_real_escape_string($conn,$_POST["password"]);
		
		$rs=mysqli_query($conn,"select * from admin where email='$email'" );
		if($r=mysqli_fetch_array($rs)){
			if($r["password"]==$password){
				setcookie("login",$email,time()+3600);
				header("location:dashboard.php");
			}
			else{
				header("location:index.php?password=1");
			}
		}
		else{
			header("location:index.php?email=1");
		}
	}

?>


