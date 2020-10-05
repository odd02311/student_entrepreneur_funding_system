<?php
    include dirname(__FILE__) .'./common.php';
    session_start();
    $product_id = $_REQUEST['product_id'];
    if(empty($product_id)){
        die();
    }
    $product_info = getProductionById($product_id);
    inc_view($product_id);
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Online system for student entrepreneur funding">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
      <title>
        <?php echo $product_info['title']; ?>
      </title>

      <link rel="stylesheet" href="css/details.css">
      <link rel="stylesheet" href="css/frontend-style.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.3.3.6.css">

   </head>
   <body>
      <!-- SINGLE VIDEO -->
      <div id="single-video" class="container-fluid standard-bg">

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
                                         echo '<a href="#">' .getUserName() .'</a>';
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
                        <li class="fa fa-chevron-right"><a href="#">Video</a><span>7.800</span></li>
                        <li class="fa fa-chevron-right"><a href="#">Animation</a><span>2.000</span></li>
                        <li class="fa fa-chevron-right"><a href="#">Music Clip</a><span>650</span></li>
                      </ul>
                  </article>
                  <div class="clearfix spacer"></div>
               </aside>
            </div>

            <!-- SINGLE VIDEO -->	
            <div id="single-video-wrapper" class="col-lg-10 col-md-8">
               <div class="row">
                  <!-- VIDEO SINGLE POST -->
                  <div class="col-lg-8 col-md-12 col-sm-12">
                     <!-- POST L size -->
                     <article class="post-video">
                        <!-- VIDEO INFO -->
                        <div class="video-info">
                           <!-- 16:9 aspect ratio -->
                           <div class="embed-responsive embed-responsive-16by9 video-embed-box">
                              <iframe src=
                                <?php echo $product_info['video_url']; ?>
                                class="embed-responsive-item">
                              </iframe>
                           </div>
                           <h2 class="title main-head-title">
                            <?php echo $product_info['title']; ?>
                           </h2>
                           <div class="metabox">
                              <span class="meta-i">
                              <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                              <?php echo $product_info['likes']; ?>
                              </span>
                              <span class="meta-i">
                              <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                              <?php echo $product_info['dislikes']; ?>
                              </span>
                              <span class="meta-i">
                              <i class="fa fa-user"></i>
                              <?php echo $product_info['author']; ?>
                              </a>
                              </span>
                              <span class="meta-i">
                              <i class="fa fa-clock-o"></i>
                              <?php echo $product_info['create_date']; ?>
                              </span>
                              <span class="meta-i">
                              <i class="fa fa-eye"></i>
                              <?php echo $product_info['views']; ?>
                              </span>
                           </div>
                           <ul class="social">
                              <li class="social-facebook"><a class="fa fa-facebook social-icons"></a></li>
                              <li class="social-google-plus"><a class="fa fa-google-plus social-icons"></a></li>
                              <li class="social-twitter"><a class="fa fa-twitter social-icons"></a></li>
                              <li class="social-youtube"><a class="fa fa-youtube social-icons"></a></li>
                              <li class="social-rss"><a class="fa fa-rss social-icons"></a></li>
                           </ul>
                        </div>
                        <div class="clearfix spacer"></div>
                        <!-- DETAILS -->
                        <div class="video-content">
                           <h2 class="title main-head-title">Video Details</h2>
                           <p>
                              <?php echo $product_info['description']; ?>
                           </p>
                        </div>
                     </article>
                  
					<!-- COMMENTS -->
					<section id="comments">
						<h2 class="title">leave comment</h2>
						<div class="widget-area">
							<div class="status-upload">
								<form>
									<textarea placeholder="Your comment goes here" ></textarea>
									<div class="comment-box-control">
										<button type="submit" class="btn pull-right">Post</button>
									</div>
								</form>
							</div><!-- Status Upload  -->
						</div><!-- Widget Area -->
						
						
						<div class="row comment-posts">
							<div class="col-sm-1">
								<div class="thumbnail">
									<img class="img-responsive user-photo" src="img/headimg/1.png" alt="Comment User Avatar">
								</div>
							</div>

							<div class="col-sm-11">
								<div class="panel panel-default">
									<div class="panel-heading">
										<strong>Kelvin</strong> <span class="pull-right">2020.8.11 11:00</span>
									</div>
									<div class="panel-body">
										I'm just gonna simp for WLOP for the rest of my life.
									</div>
								</div>
							</div>
						
							<div class="col-sm-1">
								<div class="thumbnail">
									<img class="img-responsive user-photo" src="img/headimg/2.png" alt="Comment User Avatar">
								</div>
							</div>

              <div class="col-sm-11">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <strong>Andy Lee</strong> <span class="pull-right">2020.7.4 11:00</span>
                  </div>
                  <div class="panel-body">
                    Imagine a movie looking like this. It’d be something magical like Studio Ghibli with it’s landscapes.
                  </div>
                </div>
              </div>


              <div class="col-sm-1">
                <div class="thumbnail">
                  <img class="img-responsive user-photo" src="img/headimg/3.png" alt="Comment User Avatar">
                </div>
              </div>

              <div class="col-sm-11">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <strong>Tony</strong> <span class="pull-right">2020.7.4 11:00</span>
                  </div>
                  <div class="panel-body">
                    HOW  do her strands of hair look like ONE brush stroke yet so detailed?
                    Never gonna reacht this level, amazing job once again!.
                  </div>
                </div>
              </div>


              <div class="col-sm-1">
                <div class="thumbnail">
                  <img class="img-responsive user-photo" src="img/headimg/4.png" alt="Comment User Avatar">
                </div>
              </div>

              <div class="col-sm-11">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <strong>Sun</strong> <span class="pull-right">2020.7.4 11:00</span>
                  </div>
                  <div class="panel-body">
                    This is amazing, it is a new and bigger step to bring your drawings to live。
                  </div>
                </div>
              </div>
            </div>
					</section>
				  
				   </div>

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
