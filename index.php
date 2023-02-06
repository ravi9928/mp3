<html>
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

        <script>
            $(document).ready(function(){
				$("#answer").hide();
				
				$(".fa.fa-angle-down").click(function(){
					$(this).addClass("fa fa-angle-up");
					$("#answer").show(20);
				});
				
			 });
                 
        </script>
        <style>
            label{
                font-family:vardana;
                font-size:20px;
            }
            .modal-title{
                font-family:arial;
                font-stye:bold;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#" style="color:rgba(99, 93, 187, 0.945);font-size:30px"><img src="images/logo.png" style="width:70px;height:70px"><b>RV Player</b></a>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar"> 
                <ul class="navbar-nav">
                    <li class="nav-item" >
                        <a class="nav-link" href="#" style="color:rgba(4, 226, 255, 0.945);font-size:20px">Premeum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color:rgba(4, 226, 255, 0.945);font-size:20px"> Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color:rgba(4, 226, 255, 0.945);font-size:20px">Download</a>
                    </li>
                </ul>
            </div>

            <!-- Links -->
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" style="cursor:pointer;color:rgba(65, 163, 228, 0.945);font-size:20px" data-toggle="modal" data-target="#myModalsignup">SignUp</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="cursor:pointer;color:rgba(65, 163, 228, 0.945);font-size:20px" data-toggle="modal" data-target="#myModal">SignIn</a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row" style="background-color:rgba(197, 100, 253, 0.945)">
                <div class="col-sm-12" id="login">&nbsp;&nbsp;</div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <img src="images/back.jpg" class="img-fluid"> 
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-6" style="margin-top:100px">
                    <b style="color:white;font-size:60px">Play millions of songs and podcasts, for free.</b><br>
                    <br><a href="main_site.php"><button class="bt btn-info" style="border-radius: 12px">Use RV player without registering?</button></a>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-12">&nbsp;&nbsp;</div>
            </div>

            <div class="row" style="margin-top:40px">
                <div class="col-sm-12" ><center style="color:black;font-size:40px"><b>Why RV player?</b></center></div>

                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <center><i class="fas fa-play-circle" style="margin-right:30px;font-size:130px;color:blue"></center></i><br><h3><b>Play your favorites.</b></h3><p>Listen to the songs you love,<br> and discover new music and podcasts.</p> 
                </div>
                <div class="col-sm-4">
                    <center ><i class="fas fa-heart" style="margin-right:40px;font-size:130px;color:blue"></i></center><br><h3 style="margin-left:80px"><b>Make it yours.</b></h3><p style="margin-left:80px">Tell us what you like,<br> and we'll recommend music for you.</p> 
                </div>
                <div class="col-sm-3">
                    <center><i class="fas fa-bolt" style="margin-right:30px;font-size:130px;color:blue"></center></i><br><h3><b>Save mobile data.</b></h3><p>To use less data when you play music,<br> turn on Data Saver in Settings.</p> 
                </div>
                <div class="col-sm-1"></div>

            </div>

            <div class="row" style="margin-top:40px;background-color:rgba(197, 100, 253, 0.945)">
                <div class="col-sm-12"><br><br></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <b style="color:white;font-size:60px"><center>It's free.<br>No credit card required.</center></b>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-12"><br><br></div>
            </div>	

            <div class="row" style="margin-top:40px">
                <div class="col-sm-12"><center><h1>Got questions?</h1></center></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body"><b>How can I register to RV player?</b><i class="fa fa-angle-down" style="margin-left:100%"></i>
                            <p id="answer">Ans:Click on the signuo link on navigation bar.</p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>	
            <div class="row footer" style="background-color:rgba(118, 117, 119, 0.945);margin-top:10px;color:white">
                <div class="col-sm-12" style="margin-top:110px"></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                    <img src="images/logo.png" style="width:150px;height:150px"><h1><b>RV Player</b></h1>
                </div>
                <div class="col-sm-2">
                    COMPANY<br><br>
                    About<br><br>
                    Jobs<br><br>
                    For the Record<br><br>
                </div>
                <div class="col-sm-2">
                    COMMUNITIES<br><br>
                    For Artists<br><br>
                    Developers<br><br>
                    Advertising<br><br>
                    Investors<br><br>
                    Vendors<br><br>
                </div>
                <div class="col-sm-2">
                    USEFUL LINKS<br><br>
                    Support<br><br>
                    Web Player<br><br>
                    Free Mobile App<br><br>
                </div>
                <div class="col-sm-3" style="font-size:30px">
                    <i class="fa fa-instagram" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-facebook-official" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;&nbsp;
                </div>
                <div class="col-sm-12" style="font-size:15px">
                    Legal&nbsp;&nbsp;
                    Privacy Center&nbsp;&nbsp;
                    Privacy Policy&nbsp;&nbsp;
                    Cookies&nbsp;&nbsp;
                    About Ads&nbsp;&nbsp;
                    <p style="margin-left:90%">India (English)
                        © 2021 RV player AB</p>
                </div>
                <div class="col-sm-12" style="margin-top:50px">
                </div>
            </div>	




            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Login</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="post" action="login_ret.php">  
                                <label>Email : </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-tie"></i></span>
                                    </div>  
                                    <input type="email" class="form-control" placeholder="Enter text " name="email"  required><br>
                                </div>

                                <label>Password : </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                    </div> 
                                    <input type="password" class="form-control" name="pass" placeholder="Enter Password" required><br>
                                </div>
                                <input type="submit" class="btn btn-success" value="Login">
                            </form>
                        </div>

                        <!-- Modal footer -->

                    </div>
                </div>
            </div>
            <div mdbModal #frame="mdbModal" class="modal fade top" id="myModalsignup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                 <div class="modal-dialog modal-notify modal-success" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <h4 class="modal-title">Registration</h4>
                        </div>

                        <!--Body-->
                        <div class="modal-body">
                            <form method="post" action="reg_ret.php">  
                                <label>Name: </label>
                                <input type="text" class="form-control" name="name" required><br>
                                <label>Age: </label>
                                <select name="age" class="form-control">
                                    <option value="<13">less than 13</option>
                                    <option value="13-18">13-18</option>
                                    <option value="18-22">18-22</option>
                                    <option value="22-25">22-25</option>
                                    <option value=">25">greater than 25</option>
                                </select><br><br>
                                <label>Phone no. : </label>
                                <input type="text" class="form-control" name="phone"  required><br>
                                <label>Email: </label>
                                <input type="email" class="form-control" name="email"  required><br>
                                <label>Password : </label>
                                <input type="password" class="form-control" name="pass"  required><br>
                                <label>City : </label>
                                <input type="text" class="form-control" name="city"  required><br>

                                </div>

                                <!--Footer-->
                                <div class="modal-footer justify-content-right">
                                    <button class="btn btn-success">Register</button>
                                </div>
                            </form>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>

            </div>




    </body>
</html>