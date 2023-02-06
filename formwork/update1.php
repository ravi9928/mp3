<?php
      if(!isset($_GET["id"])){
	    header("location:record_update1.php?rrr=1");
    }
	else{
		$roll=$_GET["id"];
		if(empty($_POST["name"]) || empty($_POST["avg"])){ ;
			 echo "<h3 style='color:red'> <i> Fill required field...</i> </h3>";
			 
		}
		else{
			$avg=$_POST["avg"];
	        $name=$_POST["name"];
			
	   
	        $conn=mysqli_connect("localhost","root","","doitnow");
            if(mysqli_query($conn,"update avgr set sname='$name' , avgr=$avg where sn=$roll")>0){
	              header("location:record_update1.php?success=1");
            }
	        else{
				  header("location:record_update1.php?again=1");
		    }
		}
	}
	
?>	