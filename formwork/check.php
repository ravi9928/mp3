<?php 
    if(empty($_POST["email"]) || empty($_POST["pass"])){
		header("location:index.php?error=1");
	}
	else{
		$email=$_POST["email"];
		$pass=$_POST["pass"];
		$conn=mysqli_connect("localhost","root","","doitnow");
		$rs=mysqli_query($conn,"select * from details where email='$email'" );
		if($r=mysqli_fetch_array($rs)){
        	if($r["password"]==$pass){
				setcookie("login",$email,time()+3600);
            	header("location:profile.php");
		    }
			else{
				header("location:index.php?check_password=1");
			}
    	}
        else{
			header("location:index.php?invalid=1");
		}
				
	}
	?>