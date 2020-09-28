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
	<title>Home</title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/common.css">

	<link rel="stylesheet" href="css/font-awesome.min.css">

</head>

<body>
	<!-- HOME 1 -->
	<div id="home1" class="container-fluid standard-bg">
		<!-- HEADER -->
		<div class="row">
			<div class="main-title" style="padding-left: 25px;">
				Student Entrepreneur Funding System
			</div>
			<!-- MENU -->
			<div class="row home-mega-menu ">
				<div class="col-md-12">
					<nav class="navbar navbar-default">

						<div class="collapse navbar-collapse js-navbar-collapse megabg dropshd ">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Home</a></li>
								<li>
			                        <?php
			                            //determines whether user logged in
			                            if (isLoggedIn()){
			                                echo '<a href="#">' .getUserID() .'</a>';
			                            } else {
			                                echo '<a id="loginLink" href="login.html">Login/SignUp</a>';
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
							<div class="search-block">
								<form>
									<input type="search" placeholder="Search">
								</form>
							</div>
						</div>
						<!-- /.nav-collapse -->
					</nav>
				</div>
			</div>
			<!-- CORE -->
			<div class="row">
				<!-- SIDEBAR -->
				<div class="col-lg-2 col-md-4 hidden-sm hidden-xs">
					<aside class="dark-bg">
						<article>
							<h2 class="icon"><i class="fa fa-gears" aria-hidden="true"></i>categories</h2>
							<ul class="sidebar-links">
								<li class="fa fa-chevron-right"><a href="#">Animation Clips</a><span>2.000</span></li>
								<li class="fa fa-chevron-right"><a href="#">Music Clips</a><span>650</span></li>
								<li class="fa fa-chevron-right"><a href="#">Articles</a><span>7.800</span></li>
							</ul>
						</article>
						<div class="clearfix spacer"></div>
					</aside>
				</div>
				<!-- HOME MAIN POSTS -->
				<div class="col-lg-10 col-md-8">
					<section id="home-main">
						<h2 class="icon"><i class="fa fa-television" aria-hidden="true"></i>popular productions</h2>
						<div class="row">
							<!-- ARTICLES -->
							<div class="col-lg-9 col-md-12 col-sm-12">
								<div class="row auto-clear">
									<article class="col-lg-3 col-md-6 col-sm-4">
										<!-- POST L size -->
										<div class="post post-medium">
											<div class="thumbr">
												<a class="afterglow post-thumb" href="" data-lity>
													<span class="play-btn-border" title="Play"><i
															class="fa fa-play-circle headline-round"
															aria-hidden="true"></i></span>
													<div class="cactus-note ct-time font-size-1"><span>02:02</span>
													</div>
													<img class="img-responsive" src="resources/overview_1.jpg" alt="#">
												</a>
											</div>
											<div class="infor">
												<h4>
													<a class="title" href="#">Product 1</a>
												</h4>
												<span class="posts-txt" title="Posts from Channel"><i
														class="fa fa-thumbs-up" aria-hidden="true"></i>20.895</span>
											</div>
										</div>
									</article>
									<article class="col-lg-3 col-md-6 col-sm-4">
										<!-- POST L size -->
										<div class="post post-medium">
											<div class="thumbr">
												<a class="post-thumb" href="" data-lity>
													<span class="play-btn-border" title="Play"><i
															class="fa fa-play-circle headline-round"
															aria-hidden="true"></i></span>
													<div class="cactus-note ct-time font-size-1"><span>02:02</span>
													</div>
													<img class="img-responsive" src="resources/overview_2.jpg" alt="#">
												</a>
											</div>
											<div class="infor">
												<h4>
													<a class="title" href="#">Product 2</a>
												</h4>
												<span class="posts-txt" title="Posts from Channel"><i
														class="fa fa-thumbs-up" aria-hidden="true"></i>20.895</span>
											</div>
										</div>
									</article>
									<article class="col-lg-3 col-md-6 col-sm-4">
										<!-- POST L size -->
										<div class="post post-medium">
											<div class="thumbr">
												<a class="post-thumb" href="" data-lity>
													<span class="play-btn-border" title="Play"><i
															class="fa fa-play-circle headline-round"
															aria-hidden="true"></i></span>
													<div class="cactus-note ct-time font-size-1"><span>02:02</span>
													</div>
													<img class="img-responsive" src="resources/overview_3.jpg" alt="#">
												</a>
											</div>
											<div class="infor">
												<h4>
													<a class="title" href="#">Product 3</a>
												</h4>
												<span class="posts-txt" title="Posts from Channel"><i
														class="fa fa-thumbs-up" aria-hidden="true"></i>20.895</span>
											</div>
										</div>
									</article>
									<article class="col-lg-3 col-md-6 col-sm-4">
										<!-- POST L size -->
										<div class="post post-medium">
											<div class="thumbr">
												<a class="post-thumb" href="" data-lity>
													<span class="play-btn-border" title="Play"><i
															class="fa fa-play-circle headline-round"
															aria-hidden="true"></i></span>
													<div class="cactus-note ct-time font-size-1"><span>02:02</span>
													</div>
													<img class="img-responsive" src="resources/overview_4.jpg" alt="#">
												</a>
											</div>
											<div class="infor">
												<h4>
													<a class="title" href="#">Product 4</a>
												</h4>
												<span class="posts-txt" title="Posts from Channel"><i
														class="fa fa-thumbs-up" aria-hidden="true"></i>20.895</span>
											</div>
										</div>
									</article>
									<article class="col-lg-3 col-md-6 col-sm-4">
										<!-- POST L size -->
										<div class="post post-medium">
											<div class="thumbr">
												<a class="post-thumb" href="" data-lity>
													<span class="play-btn-border" title="Play"><i
															class="fa fa-play-circle headline-round"
															aria-hidden="true"></i></span>
													<div class="cactus-note ct-time font-size-1"><span>02:02</span>
													</div>
													<img class="img-responsive" src="resources/overview_5.jpg" alt="#">
												</a>
											</div>
											<div class="infor">
												<h4>
													<a class="title" href="#">Product 5</a>
												</h4>
												<span class="posts-txt" title="Posts from Channel"><i
														class="fa fa-thumbs-up" aria-hidden="true"></i>20.895</span>
											</div>
										</div>
									</article>
									<article class="col-lg-3 col-md-6 col-sm-4">
										<!-- POST L size -->
										<div class="post post-medium">
											<div class="thumbr">
												<a class="post-thumb" href="" data-lity>
													<span class="play-btn-border" title="Play"><i
															class="fa fa-play-circle headline-round"
															aria-hidden="true"></i></span>
													<div class="cactus-note ct-time font-size-1"><span>02:02</span>
													</div>
													<img class="img-responsive" src="resources/overview_6.jpg" alt="#">
												</a>
											</div>
											<div class="infor">
												<h4>
													<a class="title" href="#">Product 6</a>
												</h4>
												<span class="posts-txt" title="Posts from Channel"><i
														class="fa fa-thumbs-up" aria-hidden="true"></i>20.895</span>
											</div>
										</div>
									</article>
									<article class="col-lg-3 col-md-6 col-sm-4">
										<!-- POST L size -->
										<div class="post post-medium">
											<div class="thumbr">
												<a class="post-thumb" href="" data-lity>
													<span class="play-btn-border" title="Play"><i
															class="fa fa-play-circle headline-round"
															aria-hidden="true"></i></span>
													<div class="cactus-note ct-time font-size-1"><span>02:02</span>
													</div>
													<img class="img-responsive" src="resources/overview_7.jpg" alt="#">
												</a>
											</div>
											<div class="infor">
												<h4>
													<a class="title" href="#">Product 7</a>
												</h4>
												<span class="posts-txt" title="Posts from Channel"><i
														class="fa fa-thumbs-up" aria-hidden="true"></i>20.895</span>
											</div>
										</div>
									</article>
									<article class="col-lg-3 col-md-6 col-sm-4">
										<!-- POST L size -->
										<div class="post post-medium">
											<div class="thumbr">
												<a class="post-thumb" href="" data-lity>
													<span class="play-btn-border" title="Play"><i
															class="fa fa-play-circle headline-round"
															aria-hidden="true"></i></span>
													<div class="cactus-note ct-time font-size-1"><span>02:02</span>
													</div>
													<img class="img-responsive" src="resources/overview_8.jpg" alt="#">
												</a>
											</div>
											<div class="infor">
												<h4>
													<a class="title" href="#">Product 8</a>
												</h4>
												<span class="posts-txt" title="Posts from Channel"><i
														class="fa fa-thumbs-up" aria-hidden="true"></i>20.895</span>
											</div>
										</div>
									</article>
								</div>
								<div class="clearfix spacer"></div>
							</div>
							<!-- RIGHT ASIDE -->
							<div class="col-lg-3 hidden-md col-sm-12 text-center top-sidebar">
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>

		<!-- TABS -->
		<div id="tabs" class="container-fluid featured-bg">
			<div class="container-fluid">
				<div class="col-md-12">
					<!-- BOOTSTRAP TABS -->
					<div class="head-section">
						<ul class="nav nav-tabs text-center">
							<li class="active">
								<a data-toggle="tab" href="">
									<h2 class="title">latest</h2>
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="">
									<h2 class="title">top rated</h2>
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="">
									<h2 class="title">most viewed</h2>
								</a>
							</li>
						</ul>
					</div>
					<div class="row auto-clear">
						<!-- TAB CONTENTS -->
						<div class="tab-content">
							<div id="tab1" class="tab-pane fade in active">
								<!-- POST L size -->
								<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
									<div class="thumbr">
										<a class="post-thumb" href="" data-lity>
											<span class="play-btn-border" title="Play"><i
													class="fa fa-play-circle headline-round"
													aria-hidden="true"></i></span>
											<div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
											<img class="img-responsive" src="img/covers/thumb-tab.jpg" alt="#">
										</a>
									</div>
									<div class="infor">
										<h4>
											<a class="title" href="#">Product 9</a>
										</h4>
										<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
												aria-hidden="true"></i>20.895</span>
									</div>
								</article>
								<!-- POST L size -->
								<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
									<div class="thumbr">
										<a class="post-thumb" href="" data-lity>
											<span class="play-btn-border" title="Play"><i
													class="fa fa-play-circle headline-round"
													aria-hidden="true"></i></span>
											<div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
											<img class="img-responsive" src="img/covers/thumb-tab2.jpg" alt="#">
										</a>
									</div>
									<div class="infor">
										<h4>
											<a class="title" href="#">Product 10</a>
										</h4>
										<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
												aria-hidden="true"></i>20.895</span>
									</div>
								</article>
								<!-- POST L size -->
								<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
									<div class="thumbr">
										<a class="post-thumb" href="" data-lity>
											<span class="play-btn-border" title="Play"><i
													class="fa fa-play-circle headline-round"
													aria-hidden="true"></i></span>
											<div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
											<img class="img-responsive" src="img/covers/thumb-tab3.jpg" alt="#">
										</a>
									</div>
									<div class="infor">
										<h4>
											<a class="title" href="#">Product 11</a>
										</h4>
										<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
												aria-hidden="true"></i>20.895</span>
									</div>
								</article>
								<!-- POST L size -->
								<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
									<div class="thumbr">
										<a class="post-thumb" href="" data-lity>
											<span class="play-btn-border" title="Play"><i
													class="fa fa-play-circle headline-round"
													aria-hidden="true"></i></span>
											<div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
											<img class="img-responsive" src="img/covers/thumb-tab4.jpg" alt="#">
										</a>
									</div>
									<div class="infor">
										<h4>
											<a class="title" href="#">Product 12</a>
										</h4>
										<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
												aria-hidden="true"></i>20.895</span>
									</div>
								</article>
								<!-- POST L size -->
								<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
									<div class="thumbr">
										<a class="post-thumb" href="" data-lity>
											<span class="play-btn-border" title="Play"><i
													class="fa fa-play-circle headline-round"
													aria-hidden="true"></i></span>
											<div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
											<img class="img-responsive" src="img/covers/thumb-tab5.jpg" alt="#">
										</a>
									</div>
									<div class="infor">
										<h4>
											<a class="title" href="#">Product 13</a>
										</h4>
										<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
												aria-hidden="true"></i>20.895</span>
									</div>
								</article>
								<!-- POST L size -->
								<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
									<div class="thumbr">
										<a class="post-thumb" href="" data-lity>
											<span class="play-btn-border" title="Play"><i
													class="fa fa-play-circle headline-round"
													aria-hidden="true"></i></span>
											<div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
											<img class="img-responsive" src="img/covers/thumb-tab6.jpg" alt="#">
										</a>
									</div>
									<div class="infor">
										<h4>
											<a class="title" href="#">Product 14</a>
										</h4>
										<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
												aria-hidden="true"></i>20.895</span>
									</div>
								</article>
							</div>
							<div id="tab2" class="tab-pane fade">
								<!-- POST L size -->
								<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
									<div class="thumbr">
										<a class="post-thumb" href="" data-lity>
											<span class="play-btn-border" title="Play"><i
													class="fa fa-play-circle headline-round"
													aria-hidden="true"></i></span>
											<div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
											<img class="img-responsive" src="img/covers/thumb-tab.jpg" alt="#">
										</a>
									</div>
									<div class="infor">
										<h4>
											<a class="title" href="#">With You, I forget all my problems. With You, Time
												Stands Still.</a>
										</h4>
										<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
												aria-hidden="true"></i>20.895</span>
									</div>
								</article>
								<!-- POST L size -->
								<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
									<div class="thumbr">
										<a class="post-thumb" href="" data-lity>
											<span class="play-btn-border" title="Play"><i
													class="fa fa-play-circle headline-round"
													aria-hidden="true"></i></span>
											<div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
											<img class="img-responsive" src="img/covers/thumb-tab2.jpg" alt="#">
										</a>
									</div>
									<div class="infor">
										<h4>
											<a class="title" href="#">I’m not perfect but I am Loyal</a>
										</h4>
										<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
												aria-hidden="true"></i>20.895</span>
									</div>
								</article>
								<!-- POST L size -->
								<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
									<div class="thumbr">
										<a class="post-thumb" href="" data-lity>
											<span class="play-btn-border" title="Play"><i
													class="fa fa-play-circle headline-round"
													aria-hidden="true"></i></span>
											<div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
											<img class="img-responsive" src="img/covers/thumb-tab3.jpg" alt="#">
										</a>
									</div>
									<div class="infor">
										<h4>
											<a class="title" href="#">When I fell for you, I fell Hard</a>
										</h4>
										<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
												aria-hidden="true"></i>20.895</span>
									</div>
								</article>
								<!-- POST L size -->
								<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
									<div class="thumbr">
										<a class="post-thumb" href="" data-lity>
											<span class="play-btn-border" title="Play"><i
													class="fa fa-play-circle headline-round"
													aria-hidden="true"></i></span>
											<div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
											<img class="img-responsive" src="img/covers/thumb-tab4.jpg" alt="#">
										</a>
									</div>
									<div class="infor">
										<h4>
											<a class="title" href="#">If you are Mine, You are Mine. I don’t like
												Sharing</a>
										</h4>
										<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
												aria-hidden="true"></i>20.895</span>
									</div>
								</article>
								<!-- POST L size -->
								<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
									<div class="thumbr">
										<a class="post-thumb" href="" data-lity>
											<span class="play-btn-border" title="Play"><i
													class="fa fa-play-circle headline-round"
													aria-hidden="true"></i></span>
											<div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
											<img class="img-responsive" src="img/covers/thumb-tab5.jpg" alt="#">
										</a>
									</div>
									<div class="infor">
										<h4>
											<a class="title" href="#">I love you. That’s all I know</a>
										</h4>
										<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
												aria-hidden="true"></i>20.895</span>
									</div>
								</article>
								<!-- POST L size -->
								<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
									<div class="thumbr">
										<a class="post-thumb" href="" data-lity>
											<span class="play-btn-border" title="Play"><i
													class="fa fa-play-circle headline-round"
													aria-hidden="true"></i></span>
											<div class="cactus-note ct-time font-size-1"><span>02:02</span></div>
											<img class="img-responsive" src="img/covers/thumb-tab6.jpg" alt="#">
										</a>
									</div>
									<div class="infor">
										<h4>
											<a class="title" href="#">It will be Always YOU</a>
										</h4>
										<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
												aria-hidden="true"></i>20.895</span>
									</div>
								</article>
							</div>
							<div id="tab3" class="tab-pane fade">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<div id="footer" class="container-fluid footer-background">
 <div class="container">
	<footer>

	   <div class="row copyright-bottom text-center">
		  <div class="col-md-12 text-center">
			<h3> 
				Student Entrepreneur Funding System
			</h3>
		  </div>
	   </div>
	</footer>
  </div>
</div>

</body>

</html>