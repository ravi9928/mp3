<?php 
    if(empty($_GET["roll"])){
		header("location:record_update1.php?empty=1");
	}	
	else{
		$roll=$_GET["roll"];
		$conn=mysqli_connect("localhost","root","","doitnow");
		if(mysqli_query($conn,"delete from avgr where sn=$roll")>0){
	           header("location:record_update1.php?deleted=1");
				  
		}
		else{
			echo "<h2 style='color:red'> Invalid Roll No.</h2>";
		}
	}
	?>