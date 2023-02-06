<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		if(isset($_REQUEST["code"])){
			$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
			
			$rs=mysqli_query($conn,"select * from category where code='$code'");
			if($r=mysqli_fetch_array($rs)){
				
			?>	
			<div class="row">
				<div class="col-xl-12">
					<h4 style="color:blue">	Edit category name: </h4>
					<div class="col-xl-12" id="category_alert"></div>
					<table class="table table-borderless" style="margin-top:-50px">
							<tr><td><label>Category name :</label></td></tr>
							<tr><td><input type="text" id="cat_name" value="<?php echo $r['category']; ?>" class="form-control" required></td></tr><br><br>
							<!--<tr><td><button type="button" class="btn btn-info 2" id="<?php //echo $r["code"];?>">Submit</button></td></tr>-->
							<tr><td><button class="btn btn-info 2" id="<?php echo $r['code']; ?>">Submit</button></td></tr>
					</table>
				</div>
			</div>
			
				
<?php				
			}
			
		}
	}
?>	