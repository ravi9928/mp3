<?php
    if(isset($_GET["error"])){
	
    echo "<h3 style='color:red'> All Field Required </h3>";
	}
	
	else if(isset($_GET["success"])){
	 echo "<h3 style='color:blue'> Record Inserted </h3>";
	}
	
	else if(isset($_GET["again"])){
	   echo "<h3 style='color:red'> Try Again </h3>";
	}

?>
<form method="post" action="formrecord_sql.php">
   Roll No.<input type="text" name="roll"><br>
   Name    <input type="text" name="user"><br><br>
    <input type="submit" value="submit"> 
   </form>