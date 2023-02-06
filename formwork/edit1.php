<?php 
    if(empty($_GET["roll"])){
		header("location:record_update1.php?empty=1");
	}	
	else{
		$roll=$_GET["roll"];
		$conn=mysqli_connect("localhost","root","","doitnow");
		$rs=mysqli_query($conn,"select * from avgr where sn=$roll");
	     
		if($r=mysqli_fetch_array($rs)){
	       ?>		
			<form method="post" action="update1.php?id=<?php echo $r[0]; ?>">
		  Name:-	<input type="text" name="name"  value="<?php echo $r[1]; ?> "><br><br>
		  avg:-	<input type="text" name="avg"  value="<?php echo $r[2]; ?> "><br><br>
		  
			<input type="submit" value="update">
			</form>
	      <?php
		  
		}
		else{
			echo "<h2 style='color:red'> Invalid Roll No.</h2>";
		}
	}
	?>