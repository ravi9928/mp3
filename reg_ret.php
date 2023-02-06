<?php 
include("db.php");
	if(empty($_POST["email"]) || empty($_POST["pass"])){
		header("location:index.php?empty=1");
	}
	else{
		$sn=0;
		$name=mysqli_real_escape_string($conn,$_POST["name"]);
		$age=mysqli_real_escape_string($conn,$_POST["age"]);
		$phone=mysqli_real_escape_string($conn,$_POST["phone"]);
		$email=mysqli_real_escape_string($conn,$_POST["email"]);
		$pass=mysqli_real_escape_string($conn,$_POST["pass"]);
		$city=mysqli_real_escape_string($conn,$_POST["city"]);
		
		$sn=mysqli_query($conn,"select MAX(sn) from user");
		if($s=mysqli_fetch_array($sn)){
			
			 $sn=$s[0];
		}
		$sn++;
		
		if(mysqli_query($conn,"insert into user values($sn,'$name','$age',$phone,'$email','$pass','$city')")>0){
			 header("location:index.php?success=1");
		}
        else{
			 header("location:index.php?not=1");
		
		}
	}
?>