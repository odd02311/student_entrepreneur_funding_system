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
                              <i id="like" class="fa fa-thumbs-up" aria-hidden="true"></i>
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
                  <input type="text" value=   
                  <?php 
                    $username = getUserName();
                    echo "'$username'";
                  ?> 
                  id="username" style="visibility: hidden;"/>
                  <input type="text" value=
                  <?php echo "'$product_id'"; ?> id="product_id" style="visibility: hidden;"/>

									<textarea id="content" placeholder="Your comment goes here" ></textarea>
									<div class="comment-box-control">
										<input type="button" value="Post" id="post_btn" class="btn pull-right"/>
									</div>
								</form>
							</div>
						</div>
						
						<div class="row comment-posts">
              <?php
                  $index = 0;
                      $rows = getComments($product_id);
                      if(!empty($rows)){
                        foreach ($rows as $row){
              ?>

                <div class="col-sm-1">
                  <div class="thumbnail">
                    <img class="img-responsive user-photo" src=
                      <?php echo $row['headimg_url']; ?>
                    alt="Comment User Avatar">
                  </div>
                </div>

  							<div class="col-sm-11">
  								<div class="panel panel-default">
  									<div class="panel-heading">
  										<strong>
                        <?php echo $row['username']; ?>
                      </strong> 
                      <span class="pull-right">
                        <?php echo $row['create_date']; ?>
                      </span>
  									</div>
  									<div class="panel-body">
  										<?php echo $row['content']; ?>
  									</div>
  								</div>
  							</div>

                    <?php }} ?>

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

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script>
 
        $("#like").click(function () {
            var param = {
                "act": 'like',
                "product_id": $("#product_id").val()
            };
            $.ajax({
                url:"/student_entrepreneur_funding_system/doaction.php",
                data:param,
                type:"POST",
                dataType:"text",
                success:function (data) {
                    if (data.search('Like successfully') > -1){
                        window.document.location.reload();
                    }
                }
            })
        })

        $("#post_btn").click(function () {
            var param = {
                "act": 'comment',
                "content": $("#content").val(),
                "username": $("#username").val(),
                "product_id": $("#product_id").val()
            };

            if ($("#username").val() == ''){
              window.location = 'login.php';
            }

            $.ajax({
                url:"/student_entrepreneur_funding_system/doaction.php",
                data:param,
                type:"POST",
                dataType:"text",
                success:function (data) {
                    if (data.search('Post successfully') > -1){
                        window.document.location.reload();
                    }
                }
            })
        })
    </script>

</html>
