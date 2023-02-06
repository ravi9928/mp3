<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["cat"])){
			$category=mysqli_real_escape_string($conn,$_REQUEST["cat"]);
			$status=0;
			$code='';
			
			$sn=0;
			$rs=mysqli_query($conn,"select MAX(sn) from category");
			if($r=mysqli_fetch_array($rs)){
				
				 $sn=$r[0];
			}
			$sn++;
			 $a=array();
			for($i='A'; $i<='Z'; $i++ ){
				array_push($a,$i);
				if($i='Z')
					break;
			}
			for($i='a'; $i<='z'; $i++ ){
				array_push($a,$i);
				if($i='z')
					break;
			}	
			for($i=0; $i<=9; $i++ ){
				array_push($a,$i);	
			}
			
			$b=array_rand($a,6);
			for($i=0; $i<sizeof($b); $i++ ){
				$code=$code.$a[$b[$i]];
			}
			$rm=mysqli_query($conn,"select * from category where category='$category'");
			if($m=mysqli_fetch_array($rm)){
			    if($category==$m["category"]){
					echo "<h5 style='color:black'>&nbsp;&nbsp;&nbsp;Category name already exist</h5>";	
				}
				else{
					if(mysqli_query($conn,"insert into category values($sn,'$code','$category',$status)")>0){
						echo "<h5 style='color:white'>&nbsp;&nbsp;&nbsp;Added successfuly</h5>";	
					}
					else{
						echo "<h5 style='color:white'>&nbsp;&nbsp;&nbsp;something wrong</h5>";
					}
				}
			}
		}
		else{
			 echo "<h5 style='color:white'>Enter category name</h5>";
		}
	}
	
?>	