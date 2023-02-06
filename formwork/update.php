<?php
    if(!isset($_GET["id"])){
	    header("location:record_update.php?rrr=1");
    }
	else{
		$roll=$_GET["id"];
		if(empty($_POST["name"]) || empty($_POST["avg"])){ ;
			header("location:record_update.php?ttt=1");
		}
		else{
			$avg=$_POST["avg"];
	        $name=$_POST["name"];
	   
	        $conn=mysqli_connect("localhost","root","","doitnow");
            if(mysqli_query($conn,"update avgr set sname='$name' , avgr=$avg where sn=$roll")>0){
	              header("location:record_update.php?success=1");
            }
	        else{
				  header("location:record_update.php?again=1");
		    }
		}
	}
	?>