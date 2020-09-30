<?php
    include dirname(__FILE__) .'./common.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Online system for student entrepreneur funding">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<title>Login</title>
	<link rel="stylesheet" href="css/login-register.css">
	<link rel="stylesheet" href="css/frontend-style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.3.3.6.css">
</head>

<body>
	<!-- HOME 1 -->
	<div id="home1" class="container-fluid">
		<!-- HEADER -->
		<div class="row">
			<div class="main-title" style="padding-left: 25px;">
				Student Entrepreneur Funding System
			</div>
			<!-- MENU -->
			<div class="row home-mega-menu ">
				<div class="col-md-12">
					<nav class="navbar navbar-default">

						<div class="collapse navbar-collapse js-navbar-collapse navbg ">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Home</a></li>
								<li>
			                        <?php
			                            //determines whether user logged in
			                            if (isLoggedIn()){
			                            	if (isAdmin()){
			                            		echo '<a href="admin.php">' .getUserName() .'</a>';
			                                } else {
			                                	echo '<a href="mypage.php">' .getUserName() .'</a>';
			                                }
			                            } else {
			                            	echo '<a id="loginLink" href="login.php">Login/SignUp</a>';
			                            }
			                        ?>
								</li>
								<li>
			                        <?php
			                            //determines whether user logged in
			                            if (isLoggedIn()){
			                                echo '<a href="logout.php">logout</a>';
			                            }
			                        ?>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>

         <!-- LOGIN -->
         <div class="row">
            <div class="container">
               <section class="registration col-lg-12 col-md-12">
                  <div class="row secBg">
                     <div class="large-12 columns">
                        <div class="login-register-content">
                           <div class="row" data-equalizer data-equalize-on="medium" id="test-eq">
                           	  <div class="col-md-1"></div>
                              <div class="clearfix spacer"></div>
                              <div class="col-md-5">
                              	<img class="loginbg" src="img/login/login.jpg">
                              </div>
                              
                              <div class="col-md-5">
                                 <div class="register-form">
                                    <h2 class="title main-head-title">Login</h2>
                                    <form id='login-form' method="post">
                                       <div class="input-group">
                                          <span class="fa fa-user login-inputicon"></span>
                                          <input type="text" id="username" placeholder="Enter your username" required>
                                       </div>
                                       <div class="input-group">
                                          <span class="fa fa-lock login-inputicon"></span>
                                          <input type="password" id="password" placeholder="Enter your password" required> 
                                       </div>
                                       <div>
                                            <a id="registerAccount" href="register.php">Create an account</a>
                                       </div>
                                       <div id="hints" style="color:red"></div>
                                       <div class="login-btn-box">
                                       	  <input type="button" name="signin" id="signin" class="btn btn-success" value="login Now"/>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <div class="col-md-1"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
 		</div>
 </div>
</div>


</body>
	<footer>
	   <div class="row copyright-bottom text-center">
			<h3> 
				Student Entrepreneur Funding System
			</h3>
	   </div>
	</footer>

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script>
        $("#username").click(function () {
            $("#hints").html('');
        })
        $("#password").click(function () {
            $("#hints").html('');
        })
        $("#signin").click(function () {
            var param = {
                "username": $("#username").val(),
                "password": $("#password").val(),
            };

            $.ajax({
                url:"/student_entrepreneur_funding_system/dologin.php",
                data:param,
                type:"POST",
                dataType:"text",
                success:function (data) {
                    if (data.search('Login successfully') > -1){
                        window.location = 'index.php';
                    }else{
                        $("#hints").html(data);
                    }
                }
            })
        })
    </script>


</html>