<?php
   $id=1;
   if(isset($_GET["id"])){
   $id=$_GET["id"];

   }
    echo "<h2> $id </h2>";
	   for($i=1; $i<6; $i++){
		   echo " <button>
		   <a style='color:red' href='set.php?id=$i'> $i </a> &nbsp
		   </button>";
	   }
   ?>