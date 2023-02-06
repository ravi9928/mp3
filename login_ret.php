<?php 
include("db.php");
	if(empty($_POST["email"]) || empty($_POST["pass"])){
		header("location:index.php?empty=1");
	}
	else{
		$email=mysqli_real_escape_string($conn,$_POST["email"]);
		$pass=mysqli_real_escape_string($conn,$_POST["pass"]);
		
		$rs=mysqli_query($conn,"select * from user where email='$email'" );
		if($r=mysqli_fetch_array($rs)){
        	if($r["password"]==$pass){
				setcookie("login",$email,time()+3600);
				  header("location:main_site.php");
		    }
			else{
				echo " Wrong Password";
			}
    	}
        else{
			echo "Enter a valid email";
		}
		
	}

?>