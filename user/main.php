<!doctype html>
<html lang="en">
  <head>
  	<title>mp3 front2</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
 
   
  <script src="https://kit.fontawesome.com/5dc79dff6a.js" crossorigin="anonymous"></script>
  
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
 <script type="text/javascript" language="javascript"> 
     $(document).ready(function(){
		 $(".card.mb-2").click(function(){
			var albm_code=$(this).attr("id");
			alert(albm_code);
				$.post(
					"open_song.php",{albm_code:albm_code},function(data){
						alert(data);
						("#main_left").html(data); 
						
						alert(albm_code);
					});
		});
	  }); 
	/*  $(document).ready(function(){
		 $("a").click(function(){
			 alert("hello");
			$("#main_left").html("<h2>hello</h2>");
	  });
	  }); */
	  
  </script>
   
 </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
					<div class="custom-menu">
						<button type="button" id="sidebarCollapse" class="btn btn-primary">
						</button>
					</div>
				<div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
					<div class="user-logo">
						<div class="img" style="background-image: url(images/logo.png);"></div>
						<h3></h3>
					</div>
				</div>
				<ul class="list-unstyled components mb-5">
				  <li class="active">
					<a><span class="fa fa-home mr-3"></span> Home</a>
				  </li>
				  <li>
					  <a href="#"><span class="fa fa-download mr-3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span> Download</a>
				  </li>
				  <li>
					<a href="#"><span class="fa fa-gift mr-3"></span> Gift Code</a>
				  </li>
				  <li>
					<a href="#"><span class="fa fa-trophy mr-3"></span> Top Review</a>
				  </li>
				  <li>
					<a href="#"><span class="fa fa-cog mr-3"></span> Settings</a>
				  </li>
				  <li>
					<a href="#"><span class="fa fa-support mr-3"></span> Support</a>
				  </li>
				  <li>
					<a href="#"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
				  </li>
				</ul>
			</nav>
			<!-- Page Content  -->
			<div id="content" class="p-4 p-md-5 pt-5" style="background-color:rgb(117, 117, 116)">
				<div class="container-fluid">
					<div class="row">
					<div id="main_left">
				<!-- up navbar-->
				
						<nav class="sb-topnav navbar navbar-expand navbar-dark bg-auto" style="margin-top:-30px">
							<!-- Navbar-->
							<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" >
								<li class="nav-item dropdown">
								   <a style="cursor:pointer;color:rgba(65, 163, 228, 0.945);font-size:15px"><button class="btn btn-circle" style="color:white"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;USERNAME</button></a>&nbsp;&nbsp;&nbsp;
								   <a style="cursor:pointer;color:rgba(65, 163, 228, 0.945);font-size:15px"><button class="btn btn-circle" style="color:white"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>&nbsp;UPGRADE</button></a>
						
								</li>
							</ul>
						</nav>
						
						<div class="row" style="margin-top:30px">
							 <div class="col-sm-12"><h2>Hit Albums from all categories</h2><a href="#">view all albums..</a></div>
						
			 <!--first carousel_-->
							<div class="col-sm-12">
								<div id="dem" class="carousel slide" data-ride="carousel">
								<!-- The slideshow -->
								<div class="carousel-inner" role="listbox">
									<div class="carousel-item active">
										<?php
										include("db.php");
										$rs=mysqli_query($conn,"select * from category_album where status=0 limit 0,4");
											while($r=mysqli_fetch_array($rs)){
										?>
										<div class="col-md-3" style="float:left">
											<div class="card mb-2" style="cursor:pointer" id="<?php echo $r["code"]?>">
											  <img class="card-img-top"
												src="album/<?php echo $r["code"]?>.jpg" class="img-fluid" alt="Card image cap">
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
									<div class="carousel-item">
									<?php
										include("db.php");
										$r2=mysqli_query($conn,"select * from category_album where status=0 AND sn>4 limit 0,4");
											while($v=mysqli_fetch_array($r2)){
										?>
										<div class="col-md-3" style="float:left">
											<div class="card mb-2" style="cursor:pointer" id="<?php echo $v["code"]?>">
											  <img class="card-img-top"
												src="album/<?php echo $v["code"]?>.jpg" alt="Card image cap">
											  <div class="card-body" style="color:black">
												<h4 class="card-title"><?php echo $v["album"];?></h4>
												<p class="card-text"> <?php echo $v["description"];?></p>
												 
											  </div>
											</div>
										</div>
									<?php
											}
									?>
									</div>
								</div>

								  <!-- Left and left controls -->
								  <a class="carousel-control-prev" href="#dem" data-slide="prev">
									<span class="carousel-control-prev-icon"></span>
								  </a>
								  <a class="carousel-control-next" href="#dem" data-slide="next">
									<span class="carousel-control-next-icon"></span>
								  </a>

								</div>
							</div><br><br><br>
							 
							 
							 <?php
										include("db.php");
										$raj=mysqli_query($conn,"select * from category_album where status=0 AND category_code='a02568' limit 0,4");
											if($rj=mysqli_fetch_array($raj)){
										?>
						<div class="col-sm-12"><br><h2>Rajsthani albums</h2><a href="#">view all albums..</a></div>
						<?php
											}
						?>					
			 <!--second carousel_-->
							<div class="col-sm-12">
								<div id="demo" class="carousel slide" data-ride="carousel">
								<!-- The slideshow -->
								<div class="carousel-inner" role="listbox">
									<div class="carousel-item active">
										<?php
										include("db.php");
										$raj=mysqli_query($conn,"select * from category_album where status=0 AND category_code='a02568' limit 0,4");
											while($rj=mysqli_fetch_array($raj)){
										?>
										<div class="col-md-3" style="float:left">
											<div class="card mb-2" style="cursor:pointer" id="<?php echo $rj["code"]?>">
											  <img class="card-img-top"
												src="album/<?php echo $rj["code"]?>.jpg" class="img-fluid" alt="Card image cap">
											  <div class="card-body" style="color:black">
												<h4 class="card-title"><?php echo $rj["album"];?></h4>
												<p class="card-text"><?php echo $rj["description"];?></p>
												 
											  </div>
											</div>
										</div>
										<?php
									}
									?>
									</div>
									<div class="carousel-item">
										<div class="col-md-3" style="float:left">
											<div class="card mb-2">
											  <img class="card-img-top"
												src="images/2.jpg" alt="Card image cap">
											  <div class="card-body" style="color:black">
												<h4 class="card-title">Card title</h4>
												<p class="card-text"> content.</p>
												 
											  </div>
											</div>
										</div>
										<div class="col-md-3" style="float:left">
											<div class="card mb-2">
											  <img class="card-img-top"
												src="images/2.jpg" alt="Card image cap">
											  <div class="card-body" style="color:black">
												<h4 class="card-title">Card title</h4>
												<p class="card-text"> content.</p>
												 
											  </div>
											</div>
										</div>
										<div class="col-md-3" style="float:left">
											<div class="card mb-2">
											  <img class="card-img-top"
												src="images/2.jpg" alt="Card image cap">
											  <div class="card-body" style="color:black">
												<h4 class="card-title">Card title</h4>
												<p class="card-text"> content.</p>
												 
											  </div>
											</div>
										</div>
										<div class="col-md-3" style="float:left">
											<div class="card mb-2">
											  <img class="card-img-top"
												src="images/2.jpg" alt="Card image cap">
											  <div class="card-body" style="color:black">
												<h4 class="card-title">Card title</h4>
												<p class="card-text"> content.</p>
												 
											  </div>
											</div>
										</div>
									</div>
									
								</div>

								  <!-- Left and left controls -->
								  <a class="carousel-control-prev" href="#demo" data-slide="prev">
									<span class="carousel-control-prev-icon"></span>
								  </a>
								  <a class="carousel-control-next" href="#demo" data-slide="next">
									<span class="carousel-control-next-icon"></span>
								  </a>

								</div>
							 
							</div><br><br><br>
							
								<!-- third crousel-->
										<div class="col-sm-12" style="margin-top:20px"><h2><b>Punjabi</b></h2><a href="#">view all albums..</a></div>
										
										<div class="col-sm-12">
											<div id="punjabi" class="carousel slide" data-ride="carousel">
											<!-- The slideshow -->
												<div class="carousel-inner" role="listbox">
													<div class="carousel-item active">
														<?php
														include("db.php");
														$raj=mysqli_query($conn,"select * from category_album where status=0 AND category_code='a12358' limit 0,4");
															while($rj=mysqli_fetch_array($raj)){
														?>
														<div class="col-md-3" style="float:left">
															<div class="card mb-2" style="cursor:pointer" id="<?php echo $rj["code"]?>">
															  <img class="card-img-top"
																src="album/<?php echo $rj["code"]?>.jpg" class="img-fluid" alt="Card image cap">
															  <div class="card-body" style="color:black">
																<h4 class="card-title"><?php echo $rj["album"];?></h4>
																<p class="card-text"><?php echo $rj["description"];?></p>
																 
															  </div>
															</div>
														</div>
														<?php
													}
													?>
													</div>
													<div class="carousel-item">
														<div class="col-md-3" style="float:left">
															<div class="card mb-2">
															  <img class="card-img-top"
																src="images/2.jpg" alt="Card image cap">
															  <div class="card-body" style="color:black">
																<h4 class="card-title">Card title</h4>
																<p class="card-text"> content.</p>
																 
															  </div>
															</div>
														</div>
														<div class="col-md-3" style="float:left">
															<div class="card mb-2">
															  <img class="card-img-top"
																src="images/2.jpg" alt="Card image cap">
															  <div class="card-body" style="color:black">
																<h4 class="card-title">Card title</h4>
																<p class="card-text"> content.</p>
																 
															  </div>
															</div>
														</div>
														<div class="col-md-3" style="float:left">
															<div class="card mb-2">
															  <img class="card-img-top"
																src="images/2.jpg" alt="Card image cap">
															  <div class="card-body" style="color:black">
																<h4 class="card-title">Card title</h4>
																<p class="card-text"> content.</p>
																 
															  </div>
															</div>
														</div>
														<div class="col-md-3" style="float:left">
															<div class="card mb-2">
															  <img class="card-img-top"
																src="images/2.jpg" alt="Card image cap">
															  <div class="card-body" style="color:black">
																<h4 class="card-title">Card title</h4>
																<p class="card-text"> content.</p>
																 
															  </div>
															</div>
														</div>
													</div>
													
												</div>

											  <!-- Left and left controls -->
											  <a class="carousel-control-prev" href="#punjabi" data-slide="prev">
												<span class="carousel-control-prev-icon"></span>
											  </a>
											  <a class="carousel-control-next" href="#punjabi" data-slide="next">
												<span class="carousel-control-next-icon"></span>
											  </a>

											</div>
										 
										 </div>
							
							
						</div>
					</div>	
								</div>
					<!---->
				</div>
			</div>
			
		</div>
		
		
		
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>