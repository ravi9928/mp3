<?php
 if(empty($_POST["user"])){
	 echo  "<font color=red> enter name </font>";
	//header("location:form.php?error=1");
    }	 
	else{
		$s=$_POST["user"];
		echo "name inserted";
	}
 ?>
  
	