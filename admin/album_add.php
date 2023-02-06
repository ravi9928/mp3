<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(empty($_POST["description"])|| empty($_POST["album_name"])){
			header("location:dashboard.php?empty_albm=1");
		}
		else{
			
			$cat_code=mysqli_real_escape_string($conn,$_GET["id"]);
			//$photo=mysqli_real_escape_string($conn,$_POST["photo"]);
			$dec=mysqli_real_escape_string($conn,$_POST["description"]);
			$album_name=mysqli_real_escape_string($conn,$_POST["album_name"]);
			
			
			$status=0;
			$code="";
			
			$sn=0;
			$rs=mysqli_query($conn,"select MAX(sn) from category_album");
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
			  //for image upload
			$code=$code."_".$sn; // use code which generated
			 $target_dir="../album/";
			$target = $target_dir . $code.".jpg";  // ecb/sdfksdf73655jh.jpg
			
			//$pic=($_FILES['photo']['name']);
			//$size=(($_FILES['photo']['size'])/1024)/1024;
			if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)){ 
			 
				
				
				if(mysqli_query($conn,"insert into category_album values($sn,'$code','$album_name','$dec',$status,'$cat_code')")>0){
					mkdir("../album/".$code);
					header("location:song_form.php?id=$code");
					//echo "<h4 style='color:green' class='alert alert-success'>Added successfuly</h4>";	
				}
				else{
					//echo "<h3 style='color:red' class='alert alert-warning'>something wrong</h3>";
					header("location:dashboard.php?fail=1");
				}
			}	
			else{
				header("location:dashboard.php?img_fail=1");
			}
			
		}
	}
?>	