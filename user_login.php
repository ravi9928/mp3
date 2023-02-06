<?php
if(isset($_REQUEST["v"])){
	$v=$_REQUEST["v"];
	$output="";
	if($v=="SignIn"){
 ?>

        <div class="col-sm-12" style="margin-top:40px">
        <div class="shadow-lg p-3 mb-5 bg-white rounded">	
	  		<h3 style="color:primary">Login</h3>
		   <!-- <form method="post" action="login_reg.php"> --> 
				<label>Email : </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
					</div>  
					<input type="email" class="form-control" id="email" placeholder="Enter Email" required><br>
				</div>
				
				<label>Password : </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
					</div> 
					<input type="password" class="form-control" id="pass" placeholder="Enter Password" required><br>
				</div>
				<button class="btn btn-primary">Login</button>
			<!--</form-->
		</div>
		</div>;
		<?php
		
	}

    }
?>