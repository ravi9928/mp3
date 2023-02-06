<?php
 //for error massage 
 if(isset($_GET["err"])){
	 echo "<h3 style='color:red' > <i>enter name</i> </h3>";
	 
 }
 ?>
 <form method="post" action="ret.php">
    Name<input type="text"  name="user"><br>  
	<input type="submit" value="submit">	
  </form>
 