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
			<div class="row ">


				<div class="col-md-12">

					<nav class="navbar navbar-default">

						<div class="collapse navbar-collapse js-navbar-collapse navbg ">

							<div class="search-block ">
								<form action="search.php">
								   <input name="keyword" type="search" placeholder="Search">
								</form>
						 	</div>

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
			<!-- CORE -->
			<div class="row">
				<!-- SIDEBAR -->
				<div class="col-lg-2 col-md-4 hidden-sm hidden-xs">
					<aside class="blue-bg">
						<article>
							<h2 class="icon"><i class="fa fa-gears" aria-hidden="true"></i>categories</h2>
							<ul class="sidebar-links">
								<li class="fa fa-chevron-right"><a href="#">Video</a>
								<span>
									<?php echo getItemsNumberbyCategory('Video'); ?>
								</span>
								</li>
								<li class="fa fa-chevron-right"><a href="#">Animation</a>
								<span>
									<?php echo getItemsNumberbyCategory('Animation'); ?>
								</span>
								</li>
								<li class="fa fa-chevron-right"><a href="#">Music Clip</a>
								<span>
									<?php echo getItemsNumberbyCategory('Music Clip'); ?>
								</span>
								</li>
							</ul>
						</article>
						<div class="clearfix spacer"></div>
					</aside>
				</div>
				<!-- HOME MAIN POSTS -->
				<div class="col-lg-10 col-md-8">
					<section id="home-main">
						<h2 class="icon"><i class="fa fa-television" aria-hidden="true"></i>Popular productions</h2>
						<div class="row">
							<!-- ARTICLES -->
							<div class="col-lg-9 col-md-12 col-sm-12">
								<div class="row auto-clear">

                                    <?php
                                    		$index = 0;
                                            $rows = getPopularPosts();
                                            foreach ($rows as $row){
                                    ?>

									<article class="col-lg-3 col-md-6 col-sm-4">
										<!-- POST L size -->
										<div class="post post-medium">
											<div class="thumbr">
												<a class="afterglow post-thumb" href=
													<?php echo 'details.php?product_id=' .$row['product_id']; ?>
												data-lity>
													<img class="img-responsive" src=
													<?php echo $row['pic_url']; ?>
													>
												</a>

											</div>
											<div class="infor">
												<h4>
													<a class="title" href=
														<?php echo 'details.php?product_id=' .$row['product_id']; ?>
													>
														<?php echo $row['title']; ?>
													</a>
												</h4>
												<span class="posts-txt" title="Posts from Channel"><i
														class="fa fa-thumbs-up" aria-hidden="true"></i>
														<?php echo $row['likes']; ?>
												</span>
											</div>
										</div>
									</article>

                                    <?php } ?>

								</div>
								<div class="clearfix spacer"></div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>

		<!-- TABS -->
		<div class="container-fluid">
			<div class="container-fluid">
				<div class="col-lg-1 col-md-2"> </div>
				<div class="col-lg-10 col-md-8">
					<!-- BOOTSTRAP TABS -->
					<h2 class="title">TOP RATED</h2>
					<div class="row auto-clear">

                        <?php
                        		$index = 0;
                                $rows = getTopRatedPosts();
                                foreach ($rows as $row){
                        ?>
						<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
							<div class="thumbr">
								<a class="post-thumb" href=
									<?php echo 'details.php?product_id=' .$row['product_id']; ?>
								data-lity>
									<img class="img-responsive" src=
										<?php echo $row['pic_url']; ?>
									>
								</a>
							</div>
							<div class="infor">
								<h4>
									<a class="title" href=
										<?php echo 'details.php?product_id=' .$row['product_id']; ?>
									>
										<?php echo $row['title']; ?>
									</a>
								</h4>
								<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
										aria-hidden="true"></i>
									<?php echo $row['likes']; ?>
								</span>
							</div>
						</article>
						<?php } ?>
					</div>

					<h2 class="title">Latest</h2>
					<div class="row auto-clear">
                        <?php
                        		$index = 0;
                                $rows = getLatestPosts();
                                foreach ($rows as $row){
                        ?>
						<article class="col-lg-2 col-md-4 col-sm-4 post post-medium">
							<div class="thumbr">
								<a class="post-thumb" href=
									<?php echo 'details.php?product_id=' .$row['product_id']; ?>
								data-lity>
									<img class="img-responsive" src=
										<?php echo $row['pic_url']; ?>
									>
								</a>
							</div>
							<div class="infor">
								<h4>
									<a class="title" href="#">
										<?php echo $row['title']; ?>
									</a>
								</h4>
								<span class="posts-txt" title="Posts from Channel"><i class="fa fa-thumbs-up"
										aria-hidden="true"></i>
									<?php echo $row['likes']; ?>
								</span>
							</div>
						</article>
						<?php } ?>
					</div>

				</div>
			</div>

			<div class="col-lg-1 col-md-2"> </div>
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