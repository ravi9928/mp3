<?php
    if(empty($_POST["roll"]) || empty($_POST["name"]) || empty($_POST["avg"])){
	   header("location:record_update1.php?not=1");
    }
	else{
		$roll=$_POST["roll"];
		$name=$_POST["name"];
		$avg=$_POST["avg"];
		
		
		$conn=mysqli_connect("localhost","root","","doitnow");
		if(mysqli_query($conn,"insert into avgr values($roll,'$name',$avg )")>0){
		   header("location:record_update1.php?inserted=1");
		}
        else{
			 header("location:record_update1.php?notinser=1");
		}		
	}
?>