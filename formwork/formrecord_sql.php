<?php 
   if(empty($_POST["user"]) || empty($_POST["roll"])){
	   header("location:form_sql.php?error=1");
   }
   else{
	   $roll=$_POST["roll"];
	   $name=$_POST["user"];
	   
	$conn=mysqli_connect("localhost","root","","friend");
      if(mysqli_query($conn,"insert into anil values($roll,'$name')")>0){
	    header("location:form_sql.php?success=1");
      }
      else{
	    header("location:form_sql.php?again=1");
	  }
   }
   ?>