

<?php 
     if(isset($_GET["success"])){
	 echo "<h3 style='color:blue'> Record updated </h3>";
	}
	
	else if(isset($_GET["again"])){
	   echo "<h3 style='color:red'> Try Again </h3>";
	}
     else if(isset($_GET["deleted"])){
	   echo "<h3 style='color:red'> Record Deleted </h3>";
	}
     else if(isset($_GET["not"])){
	   echo "<h3 style='color:red'> insert data </h3>";
	}
	     else if(isset($_GET["inserted"])){
	   echo "<h3 style='color:red'>  data inserted </h3>";
	}

?>               
	        <b> Insert Record in table:</b><br><button style="color:green"><b>insert data</b></button><br>
	 			<form method="post" action="insert1.php">
	        	Roll no.:-	<input type="text" name="roll" > <br>
				Name:-		  <input type="text" name="name" > <br>
				Avrage:-	 <input type="text" name="avg"> <br>
				<input type="submit" value="submit">
				</form>
<?php

     $conn=mysqli_connect("localhost","root","","doitnow");
     $rs=mysqli_query($conn,"select * from avgr order by avgr desc");
       
        echo "<table width=50%>";
		
		echo "<tr><td> <b>Roll no.</b></td><td> <b>Name</b> </td><td><b> Avgr </b></td><td><b>Rank</b></td></tr>";
		$rank=0;
		$avg=101;
	 while($r=mysqli_fetch_array($rs)){
		 if($r["avgr"]<$avg){
			$avg=$r["avgr"];
			$rank++;
		}
	  echo "<tr><td>".$r[0]."</td><td>".$r[1]."</td><td>".$r[2]."</td><td>".$rank."</td><td><a href='edit1.php?roll=".$r[0]."'><button style='color:blue'>Edit</button></a></td><td><a href='delete1.php?roll=".$r[0]."'><button style='color:red'>Delete</button></a></td></tr>";
	 }
	 echo "</table>";
	 

?>	 