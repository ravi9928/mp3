<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		$email=$_COOKIE["login"];
		if(isset($_GET["id"])){
			$albm_code=mysqli_real_escape_string($conn,$_GET["id"]);
			$rs=mysqli_query($conn,"select * from category_album where code='$albm_code'");
			if($r=mysqli_fetch_array($rs)){
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Rv Player</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">  
		 </script>  
		 <script type="text/javascript" language="javascript">  
			//for delete song
			 $(document).ready(function(){
				$("a").click(function(){
				  var code=$(this).attr("rel");
				  var sn=$(this).attr("id");
				  var text=$(this).text();
				  if(text=="Delete"){
					$.post(
						"delete_song.php",{code:code,sn:sn},function(data){
							if(data.trim()=="success"){
								$("#s"+code+sn).fadeOut(1000);
							}
					});
				  }
				  else if(text=="Edit"){
					$.post(
						"edit_song.php",{code:code,sn:sn},function(data){
							$("#edit_song").html(data);
							
					});
				  }
				 });
			 }); 
			 //update song
			  $(document).on("click",".btn.btn-info.4",function(){
				var code=$(this).attr("id");
				 var sn=$(this).attr("rel");
				 var title=$("#song_title").val();
				 var dec=$("#description").val();
				 if(title=="" || dec==""){
					 $("#song_alert").html("<h5 class='alert alert-warning' style='color:red'>All field required</h5>");  
				 }
				else{
					$.post(
						"update_song.php",{code:code,title:title,dec:dec,sn:sn},function(data){
							$("#song_alert").html(data);
							$("#title").val("");
							$("#dec").val("");
					});
				}
			});
			
		 </script>  
	</head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3">	RV player</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" ><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
          <!--  <form class="d-none d-md-inline-block form-inliāne ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> -->
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown" style="margin-left:2050%">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                   <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href="logout.php">Login as another account</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
						</div>
					</div>	
						
                        <!--    <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>-->
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                     <?php echo $email; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">Dashboard</h1>
						<div class="row" id="edit_song">
							<div class="col-xl-12" id="albm_alert"></div>
							<h4 style="color:blue">Add song in <strong style="color:red"><?php echo $r[2];?></strong> Album...</h4>
                           <div class="col-xl-5">
								<?php $rm=mysqli_query($conn,"select * from category_album where code='$albm_code'")or die(mysqli_error($conn));
								if($m=mysqli_fetch_array($rm)){
									?>
								<image src="../album/<?php echo $m['code']; ?>.jpg" style="width:500px;height:300px" class="img-fluid">
								<?php }?>
							</div>
							
						   <div class="col-xl-7" style="margin-top:40px">
								<form enctype="multipart/form-data" method="post" action="song_add.php?id=<?php echo $r["code"];?>">
												<table class="table table-borderless" style="margin-top:-180px">
														<tr><td colspan=2>
														<?php
														if(isset($_GET["success"])){
															echo "<h5 class='alert alert-success'>Song added</h5>";
														}?>
														</td></tr>
														<tr><td><label>Song Title :</label></td>
														<td><input type="text" name="title" class="form-control" required></td></tr><br><br>
														<tr><td><label>mp3 File :</label></td>
														<td><input type="file" name="file" class="form-control" ></td></tr><br><br>
														<tr><td><label>Description :</label></td>
														<td><textarea rows=3 name="description" class="form-control" required></textarea></td></tr><br><br>
														<!--<tr><td><button type="button" class="btn btn-info 2" id="<?php //echo $r["code"];?>">Submit</button></td></tr>-->
														<tr><td></td><td><button class="btn btn-warning">Submit</button></td></tr>
													
												</table>
								</form>
											
							<?php				
										}
										
									}
							
									?>
							</div>
						</div>
						
						<div class="row" style="margin-top:10px">
							<div class="col-xl-12">	
							<?php
							$rv=mysqli_query($conn,"select * from song where album_code='$albm_code'");
								
								?> <h4 style="color:blue"><strong style="color:red"><?php echo $r[2];?></strong> album songs...</h4>
								
								<table class="table table-borderless"><tr><td><strong>Song title</strong></td></tr></table><?php
									while($v=mysqli_fetch_array($rv)){
										if($v["status"]==0){
										?>
										<table class="table table-borderless" style="margin-top:-15px">
											<tr id="s<?php echo $v['album_code'],$v['sn']; ?>">
												<td style="width:200px"><?php echo $v[1]; ?></td><td></td>
											<!--	<td><button class="btn btn-success 2" id="<?php //echo $v["code"]; ?>"><a href="song_form.php?id=<?php //echo $v["code"]; ?>">Add Song</a></button></td>-->
												<td><a id="<?php echo $v['sn'];?>" rel="<?php echo $v['album_code'];?>"><i class="fas fa-edit" style="color:blue;cursor:pointer"></i>Edit</a></td>
												<td><a id="<?php echo $v['sn'];?>" rel="<?php echo $v['album_code']; ?>"><i class="fas fa-trash" style="color:red;cursor:pointer" ></i>Delete</a></td>
												</tr>
										</table>
										<?php	
										}
									}
								 ?>
							</div>
						</div>
                    </div>
                </main>
				
				
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

<?php

	}
	?>
