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
      <title>Details of a video</title>

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
                  </div>
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
                              <iframe src="https://www.youtube.com/embed/pvPsJFRGleA"  class="embed-responsive-item"></iframe>
                           </div>
                           <h2 class="title main-head-title">Kiss me if I’m wrong but Dinosaurs still exist? Right?s</h2>
                           <div class="metabox">
                              <span class="meta-i">
                              <i class="fa fa-thumbs-up" aria-hidden="true"></i>20.895
                              </span>
                              <span class="meta-i">
                              <i class="fa fa-thumbs-down" aria-hidden="true"></i>3.981
                              </span>
                              <span class="meta-i">
                              <i class="fa fa-user"></i>John Doe</a>
                              </span>
                              <span class="meta-i">
                              <i class="fa fa-clock-o"></i>March 16. 2017
                              </span>
                              <span class="meta-i">
                              <i class="fa fa-eye"></i>1,347,912 views
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
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
										<strong>Kelvin</strong> <span class="pull-right">2020.7.4 18:00</span>
									</div>
									<div class="panel-body">
										Lorem Ipsum is simply dummy text of the printing and typesetting industry.
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
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting
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
