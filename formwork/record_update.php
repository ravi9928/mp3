<?php 
   if(isset($_GET["empty"])){
	    echo "<h3 style='color:red'> enter roll no. </h3>";
   }
   else if(isset($_GET["success"])){
	 echo "<h3 style='color:blue'> Record updated </h3>";
	}
	
	else if(isset($_GET["again"])){
	   echo "<h3 style='color:red'> Try Again </h3>";
	}

 ?>

<form method="post" action="edit.php">
   Roll No.<input type="text" name="roll" ><br><br>
   <input type="submit" value="update">
 </form>   