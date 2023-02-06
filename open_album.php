<?php
	include("db.php");
	if(isset($_REQUEST["code"])){
		$code=mysqli_real_escape_string($conn,$_REQUEST["code"]);
		
?>
<div style="height:800px">
<div class="row">
	<div class="col-sm-12">
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search songs..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />&nbsp;
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fa fa-search"></i></button>
                </div>
            </form>
		</nav>
	</div>
	<div class="col-sm-12">
	<?php
		$rs=mysqli_query($conn,"select * from category_album where status=0 AND category_code='$code'");
		while($r=mysqli_fetch_array($rs)){

	?>
	<div class="col-md-3" style="float:left">
	<div class="card mb-2" style="cursor:pointer" id="<?php echo $r["code"]?>">
		<img class="card-img-top" src="album/<?php echo $r["code"]?>.jpg" class="img-fluid" alt="Card image cap">
		<div class="card-body" style="color:black">
			<h4 class="card-title"><?php echo $r["album"]; ?></h4>
			<p class="card-text"> <?php echo $r["description"]; ?></p> 
		</div>
	</div>
	</div>
	<?php
		}
	?>
	</div>
</div>
</div>
<?php
	}
?>