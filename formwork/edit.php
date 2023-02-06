<?php 
    if(empty($_POST["roll"])){
		header("location:record_update.php?empty=1");
	}	
	else{
		$roll=$_POST["roll"];
		$conn=mysqli_connect("localhost","root","","doitnow");
		$rs=mysqli_query($conn,"select * from avgr where sn=$roll");
	     
		if($r=mysqli_fetch_array($rs)){
	       ?>		
			<form method="post" action="update.php?id=<?php echo $r[0]; ?>">
			<input type="text" name="name"  value="<?php echo $r[1]; ?> "><br><br>
			<input type="text" name="avg"  value="<?php echo $r[2]; ?> "><br><br>
			<input type="submit" value="update">
			</form>
	      <?php
		  
		}
		else{
			echo "<h2 style='color:red'> Invalid Roll No.</h2>";
		}
	}
	?>