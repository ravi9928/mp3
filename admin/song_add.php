<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(empty($_POST["description"])|| empty($_POST["title"])){
			header("location:song_form.php?empty_albm=1");
		}
		else{
			
			$albm_code=mysqli_real_escape_string($conn,$_GET["id"]);
			//$photo=mysqli_real_escape_string($conn,$_POST["photo"]);
			$dec=mysqli_real_escape_string($conn,$_POST["description"]);
			$title=mysqli_real_escape_string($conn,$_POST["title"]);
			
			
			$status=0;
			
			
			$sn=0;
			$rs=mysqli_query($conn,"select MAX(sn) from song where album_code='$albm_code'");
			if($r=mysqli_fetch_array($rs)){
				
				 $sn=$r[0];
			}
			$sn++;
			
			  //for image upload
			//$code=$code."_".$sn; // use code which generated
			// $target_dir="../album/".$code;
			$target = "../album/" . $albm_code . "/" . $sn .".mp3";  // ecb/sdfksdf73655jh.jpg
			
			//$pic=($_FILES['photo']['name']);
			//$size=(($_FILES['photo']['size'])/1024)/1024;
			if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){
			 
				if(mysqli_query($conn,"insert into song values($sn,'$title','$dec','$albm_code',$status)")>0){
					
					header("location:song_form.php?id=$albm_code&success=1");
				}
				else{
					header("location:song_form.php?id=$albm_code&fail=1");
				}
			}	
			else{
				header("location:song_form.php?id=$albm_code&song_fail=1");
				
			} 
		}
	}
?>	