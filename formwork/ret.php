<?php
 if(empty($_POST["user"])){
	header("location:demo.php?err=1");
    }	 
	else{
		$s=$_POST["user"];
		echo $s;
	}
 ?>
  
	