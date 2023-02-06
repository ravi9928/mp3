
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
 
   
  <script src="https://kit.fontawesome.com/5dc79dff6a.js" crossorigin="anonymous"></script>
  
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">  
		 </script>  
		 <script type="text/javascript" language="javascript"> 
		 $(document).on("click",".card.mb-2",function(){
			var albm_code=$(this).attr("id");
				$.post(
					"open_song.php",{albm_code:albm_code},function(data){
						$("#main_left").html(data); 
					});
		});

		/* view all album*/
	   $(document).on("click","a",function(){
				var ch=$(this).text();
				var code=$(this).attr("id");
				if(ch =="view all"){
					$.post(
						"open_album.php",{code:code},function(data){
							$("#main_left").html(data);
					});
				}
		});	
		
		
		//for song play
		var song_flag=0;
		 $(document).on("click",".fas.fa-play",function(){
			$(".fas.fa-pause").attr('class', 'fas fa-play');
			var song=$(this).attr("id");
				$("#play_song").attr("src",song+".mp3");
				$(this).attr('class', 'fas fa-pause');
	
		 });
		 
		 //for song pause
		 $(document).on("click",".fas.fa-pause",function(){
			$(this).attr('class', 'fas fa-play');
			$("#play_song").attr("src","");
		 });
		 
		  //for favirotes
		 $(document).on("click",".fas.fa-heart",function(){
				var code=$(this).attr("id");
					$.post(
						"fav.php",{code:code},function(data){
						if(data.trim()=="not_login"){
							alert("Please login first...");
						}
						else if(data.trim()=="success"){
							$("#"+code).css('color','red');
							
						}
						else if(data.trim()=="delete"){
							$("#"+code).css('color','white');
						}
					});
		 });
		 // Favorites	
		 $(document).on("click",".nav-link",function(){
			 var ch=$(this).text();
				if(ch =="    Favorites"){
					$("#main_left").load("fav_songs.php");
					
				}
				if(ch =="    Search"){
					$("#main_left").load("search.php");
					
				}
		 });
		  $(document).on("keyup","#search",function(){
				var rec=$(this).val();
				 $.post(
					"search_record.php",{search:rec},function(data){
							$("#search_songs").html(data);
					}
				 );
		  });
  </script>
  
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<!--left sidebar-->
		<div class="col-sm-2" style="background-color:black;color:white">
		<div class="position-fixed">
			<nav>
				<div id="mySidenav" class="sidenav" style="margin-top:40px">
				
					<ul style="margin-left:-110px">
						<center><img src="images/logo.png" style="width:50px;height:50px"></img><h3><b>RV Player</b></h3></center>
					</ul>
					<ul class="navbar-nav" style="margin-left:30px;font-size:15px;color:white">
					<table class="table table-hover">	
					<tr><li class="nav-item">
						<a class="nav-link" style="color:white;cursor:pointer" href="main_site.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;Home</a>
						</li></tr>
					<tr><li class="nav-item">
						  <a class="nav-link" style="color:white;cursor:pointer"><i class="fa fa-search" aria-hidden="true"></i>    Search</a>
						</li></tr>
					<tr><li class="nav-item">
						  <a class="nav-link" style="color:white;cursor:pointer"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;&nbsp;Library</a>
						</li></tr>
					<tr><li class="nav-item">
						  <a class="nav-link" style="color:white;cursor:pointer"><i class="fa fa-heart" aria-hidden="true"></i>    Favorites</a>
						</li></tr>
						
						</table>	
					</ul>
					<ul class="navbar-nav" style="margin-left:30px;font-size:20px;color:white">
					<li class="nav-item">
						  <a class="nav-link" style="color:white;cursor:pointer"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add playlist</a>
					</li>
					</ul >
					<!-- <div class="footer" style="margin-top:100%">
                        <div class="small">Logged in as:</div>
                     <?php //echo "email"; ?>
					</div>-->
				</div>
			</nav><br><br><br><br><br><br><br><br><br><br>
			 <footer class="py-4 bg-light mt-auto"style="margin-top:100%">
                   <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"> <h6>Download RV player</h6></div>
                        </div>
                    </div>
                </footer>
		</div>	
		</div>
		
		<div class="col-sm-10" style="background-color:rgba(60, 60, 61, 0.945);color:white">
		<div id="main_left">
	<!-- up navbar-->
	
			<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			
				<!-- Navbar-->
				<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" >
					<li class="nav-item dropdown" style="margin-left:800px">
					<?php   
					include("db.php");
					if(isset($_COOKIE["login"])){
							
						$email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
						$rs=mysqli_query($conn,"select * from user where email='$email'");
						if($r=mysqli_fetch_array($rs)){
				?>
						 <a style="cursor:pointer;color:rgba(65, 163, 228, 0.945);font-size:15px"><button class="btn btn-circle" style="color:white"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $r["email"];?></button></a>
					
				<?php						
						}
					}
					else{
				?>			   
					  <a style="cursor:pointer;color:rgba(65, 163, 228, 0.945);font-size:15px"><button class="btn btn-circle" style="color:white"> <i class="fa fa-user" aria-hidden="true"></i>&nbsp;USERNAME</button></a>
				<?php
					}
				?>
				<?php   
								include("db.php");
								if(isset($_COOKIE["login"])){
										
									$email=mysqli_real_escape_string($conn,$_COOKIE["login"]);
									$rs=mysqli_query($conn,"select * from user where email='$email'");
									if($r=mysqli_fetch_array($rs)){
							?>
								 <a href="logout.php" class="nav-link" style="color:white;cursor:pointer">&nbsp;<i class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;Logout</a>
							<?php						
									}
								}
								else{
							?>			   
								  <a href="index.php" class="nav-link" style="color:white;cursor:pointer">&nbsp;<i class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;Login</a>
								  <?php
								}
							?>
					   </li>
				</ul>
			</nav>
			
			<div class="row" style="margin-top:30px">
				 <div class="col-sm-12"><h2>Gujrati albums</h2><a id="a01248" style="cursor:pointer">view all</a></div>
			
 <!--first carousel_-->
				<div class="col-sm-12">
					<div id="dem" class="carousel slide" data-ride="carousel">
					<!-- The slideshow -->
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<?php
							include("db.php");
							$rs=mysqli_query($conn,"select * from category_album where status=0 AND category_code='a01248' limit 0,4");
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
							$r2=mysqli_query($conn,"select * from category_album where status=0 AND sn>4 AND category_code='a01248' limit 0,4");
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

					  <!-- Left and right controls -->
					  <a class="carousel-control-prev" href="#dem" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					  </a>
					  <a class="carousel-control-next" href="#dem" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					  </a>

					</div>
				</div><br><br><br>
				 
				
			<div class="col-sm-12"><br><h2>Rajsthani albums</h2><a id="a02568" style="cursor:pointer">view all</a></div>
				
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
						<?php
							include("db.php");
							$r2=mysqli_query($conn,"select * from category_album where status=0 AND sn>4 AND category_code='a02568' limit 0,4");
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

					  <!-- Left and right controls -->
					  <a class="carousel-control-prev" href="#demo" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					  </a>
					  <a class="carousel-control-next" href="#demo" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					  </a>

					</div>
				 
				</div><br><br><br>
				
					<!-- third crousel-->
							<div class="col-sm-12" style="margin-top:20px"><h2><b>Punjabi</b></h2><a id="a12358" style="cursor:pointer">view all</a></div>
							
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
										<?php
											include("db.php");
											$r2=mysqli_query($conn,"select * from category_album where status=0 AND sn>4 AND category_code='a12358' limit 0,4");
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

								  <!-- Left and right controls -->
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
	</div>
</div>	
</body>
</html>