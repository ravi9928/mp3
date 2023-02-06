<?php
include("db.php");
	if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
		$email=$_COOKIE["login"];
	
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
		 $(document).ready(function() {  
			 $(".btn.btn-info.1").click(function(){
				 var cat=$("#category").val();
				 if(cat==""){
					 $("#alert").html("<h3 style='color:yellow'>Enter category</h3>");  
				 }
				 else{
					 $.post(
							"category.php",{cat:cat},function(data){
								$("#alert").html(data);  
								$("#category").val("");
						});
				 }
			});
		 });  
		  $(document).on("click",".btn.btn-info.3",function(){
			    var v="aa";
				var c=$(this).attr("id");
				if(v.startsWith(c)){
					alert("hello");
				}
				
		  });	
		  
		  //add album form
		  var f_code="";
		   $(document).on("click",".btn.btn-success.1",function(){
			  f_code=$(this).attr("id");
					 $.post(
							"album_form.php",{code:f_code},function(data){
								$(".third_area").html(data);  
								
						});
		  }); 
		  
		  //edit category name
		   $(document).on("click","#eddit_cat",function(){
			   var code=$(this).attr("rel");
				$.post(
					"edit_catname.php",{code:code},function(data){
					$(".third_area").html(data);
				});
		   });
		   //for update category name
		    $(document).on("click",".btn.btn-info.2",function(){
				 var code=$(this).attr("id");
				 var cat_name=$("#cat_name").val();
				 if(cat_name==""){
					 $("#category_alert").html("<h5 class='alert alert-warning' style='color:red'>Enter category</h5>");  
				 }
				 else{
					$.post(
						"update_catname.php",{code:code,cat_name:cat_name},function(data){
							$("#category_alert").html(data);
							$("#cat_name").val("");
					});
				 }
			});
			 
			 
		   //delete category name
		    $(document).on("click","#delete_cat",function(){
			  var code=$(this).attr("rel");
				$.post(
					"delete_catagory.php",{code:code},function(data){
						if(data.trim()=="success"){
						$("#r"+code).fadeOut(1000);
						}
				});
			   
		   });
		   //search album by abcd btn 
			$(document).on("click",".btn.btn-danger.1",function(){
				  var ch=$(this).text();
				   
				  
				  $.post(
				    "btn_albm_name.php",{btn_text:ch,cat_code:f_code},function(data){
						$("#albm_name_record").html(data);
					}
				  
				  );
			  });
			  //for search category name
			$(document).on("click","#btnNavbarSearch",function(){
				  var ch=$("#text").val();
				  $.post(
					"search_cat.php",{ch:ch},function(data){
						$(".third_area").html(data);
				});
				  
			});
			//edit Album name
		   $(document).on("click","#eddit_album",function(){
			   var code=$(this).attr("rel");
				$.post(
					"edit_album.php",{code:code},function(data){
					$(".third_area").html(data);
				});
		   });
		   //for update album 
		    $(document).on("click",".btn.btn-info.3",function(){
				 var code=$(this).attr("id");
				 var album_name=$("#album_name").val();
				 var dec=$("#description").val();
				 if(album_name==""){
					 $("#album_alert").html("<h5 class='alert alert-warning' style='color:red'>All field required</h5>");  
				 }
				else{
					$.post(
						"update_album.php",{code:code,album_name:album_name,dec:dec},function(data){
							$("#album_alert").html(data);
							$("#album_name").val("");
					});
				}
			});
			
			//for delete album
			  $(document).on("click","#delete_album",function(){
			  var code=$(this).attr("rel");
				$.post(
					"delete_album.php",{code:code},function(data){
						if(data.trim()=="success"){
						$("#a"+code).fadeOut(1000);
						}
				});
			  });
			
		
		 </script>  
	</head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">	RV player</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inliāne ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search category" id="text" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search""></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
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
							<div class="sb-sidenav-menu-heading">Categories</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts" style="margin-top:-20px">
                                <?php
									$rc=mysqli_query($conn,"select * from category");
											while($c=mysqli_fetch_array($rc)){
									?>			
                                    <a class="nav-link"><?php echo $c[2];?></a>
									<?php
											}
									?>
                            </a>
						</div>
                    </div>
                           <!-- <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
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
						<div class="third_area">
                        <div class="row-1">
                            <div class="col-xl-12 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Add Category</div>
									<div class="col-xl-12" id="alert"></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
										<div class="col-xl-6"> 
										   <input type="text" id="category" class="form-control" placeholder="Enter category">
										</div>   &nbsp;&nbsp;&nbsp;
										<div class="col-xl-6"> 
											<div class="small text-white"><button class="btn btn-info 1"><i class="fas fa-plus" style="font-size:30px"></i></button></div>
										</div>	
                                    </div>
                                </div>
							</div>
                        </div>
						<div class="row-2" >
                            <div class="col-xl-12">
								<div class="cat_area">
									<?php
									$rs=mysqli_query($conn,"select * from category");
											while($r=mysqli_fetch_array($rs)){
												if($r["status"]==0){
									?>
													<table class="table table-borderless">
														<tr id="r<?php echo $r['code']; ?>">
															<td style="width:200px"><?php echo $r[2]; ?></td>
															<td><button class="btn btn-success 1" id="<?php echo $r[1]; ?>">Add Album</button></td>
															<td><i class="fas fa-edit" style="color:blue;cursor:pointer" id="eddit_cat" rel="<?php echo $r['code']; ?>"></i></td>
															<td><i class="fas fa-trash" style="color:red;cursor:pointer" id="delete_cat" rel="<?php echo $r['code']; ?>"></i></td>
														</tr>
													</table>
											
									<?php
												}
											}
									?>
								</div>
							</div>
						</div>	
                    </div>
                </main>
				
				
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; RV player</div>
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
