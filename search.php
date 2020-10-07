<?php
    include dirname(__FILE__) .'./common.php';
    session_start();

    $keyword = $_REQUEST['keyword'];
    if(empty($keyword)){
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Online system for student entrepreneur funding">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <title>Home</title>
    <link rel="stylesheet" href="css/backend-style.css">
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

                        <div class="collapse navbar-collapse js-navbar-collapse navbg">

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

                                        <div class="col-lg-8 col-md-8 profiletimeline">
                                            <?php
                                                    $rows = search($keyword);
                                                    if(!empty($rows)){
                                                    foreach ($rows as $row){
                                            ?>
                                            <div class="sl-item">
                                                <div class="sl-left"> 
                                                    <img src=
                                                    <?php echo $row['headimg_url']; ?>
                                                    alt="user" class="img-circle"> 
                                                </div>

                                                <div class="sl-right">
                                                    <div> <a href="#" class="link">
                                                        <?php echo $row['username']; ?>
                                                        </a> 
                                                        <span class="sl-date">
                                                        <?php echo $row['create_date']; ?>
                                                        </span>
                                                        <div class="m-t-20 row">
                                                            <div class="col-md-3 col-xs-12">
                                                         <a href=
                                                                <?php echo 'details.php?product_id=' .$row['product_id']; ?>
                                                                class="link m-r-10">0 comments
                                                        
                                                                    <img src=
                                                                    <?php echo $row['pic_url']; ?>
                                                                    alt="user" class="img-responsive radius">
                                                                </a> 
                                                            </div>
                                                            <div class="col-md-9 col-xs-12">
                                                                <p> 
                                                                    <?php echo $row['description']; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="like-comm m-t-20"> <a href=
                                                         class="link m-r-10">0 comments</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i>
                                                            <?php echo $row['likes']; ?>
                                                        </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <?php }} ?>

                                        </div>
                                        <div class="col-lg-2 col-md-2"></div>



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