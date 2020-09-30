<?php
    include dirname(__FILE__) .'./common.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/backend-style.css">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- tether is required by bootstrap 4 beta -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/tether/js/tether.min.js"></script>
    
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>

<body class="fix-header fix-sidebar card-no-border">

    <div id="main-wrapper">

        <header class="topbar">
            <a class="userinfo" href=""><img src="img/headimg/1.png" class="profile-pic" />
                <?php
                    if(isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                        echo '';
                    } 
                ?>
            </a>
        </header>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a href="index.php" ><span>Home</span></a>
                        </li>
                        <li class="active"> <a href="mypage.php" aria-expanded="false"><span>Profile</span></a>
                        </li>
                        <li> <a href="create_post.php" aria-expanded="false"><span>Create a post</span></a>
                        </li>
                        <li> <li> <a href="logout.php"><span>Logout</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <!-- Column -->
                        <div class="card">
                            <img class="card-img-top" src="img/mypage/profile-bg.jpg" alt="Card image cap">
                            <div class="card-block little-profile text-center">
                                <div class="pro-img"><img src="img/headimg/1.png" alt="user" /></div>
                                <h3 class="m-b-0">kelvin</h3>
                                <p>Web Designer &amp; Developer</p>
                                <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Follow</a>
                                <div class="row text-center m-t-20">
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h3 class="m-b-0 font-light">99</h3><small>Articles</small></div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h3 class="m-b-0 font-light">269</h3><small>Followers</small></div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h3 class="m-b-0 font-light">66</h3><small>Following</small></div>
                                </div>
                            </div>
                        </div>
 
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Activity</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-block">
                                        <div class="profiletimeline">
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="img/headimg/1.png" alt="user" class="img-circle"> </div>
                                                <div class="sl-right">
                                                    <div><a href="#" class="link">Kelvin</a> <span class="sl-date">5 minutes ago</span>
                                                        <p>assign a new task </p>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="img/mypage/img1.jpg" alt="user" class="img-responsive radius"></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="img/mypage/img2.jpg" alt="user" class="img-responsive radius"></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="img/mypage/img3.jpg" alt="user" class="img-responsive radius"></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="img/mypage/img4.jpg" alt="user" class="img-responsive radius"></div>
                                                        </div>
                                                        <div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comments</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Likes</a> </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="img/headimg/1.png" alt="user" class="img-circle"> </div>
                                                <div class="sl-right">
                                                    <div> <a href="#" class="link">Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <div class="m-t-20 row">
                                                            <div class="col-md-3 col-xs-12"><img src="img/mypage/img1.jpg" alt="user" class="img-responsive radius"></div>
                                                            <div class="col-md-9 col-xs-12">
                                                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p></div>
                                                        </div>
                                                        <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comments</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Likes</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="img/headimg/1.png" alt="user" class="img-circle"> </div>
                                                <div class="sl-right">
                                                    <div><a href="#" class="link">John</a> <span class="sl-date">5 minutes ago</span>
                                                        <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                                    </div>
                                                    <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comments</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Likes</a> </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="img/headimg/1.png" alt="user" class="img-circle"> </div>
                                                <div class="sl-right">
                                                    <div><a href="#" class="link">John</a> <span class="sl-date">5 minutes ago</span>
                                                        <blockquote class="m-t-10">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <?php
                                                        if(isset($_SESSION['username'])) {
                                                            echo $_SESSION['username'];
                                                        } else {
                                                            echo '';
                                                        } 
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted" id='phone-info'>
                                                    <?php
                                                        if(isset($_SESSION['phone'])) {
                                                            echo $_SESSION['phone'];
                                                        } else {
                                                            echo '';
                                                        } 
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted" id='email-info'>
                                                    <?php
                                                        if(isset($_SESSION['email'])) {
                                                            echo $_SESSION['email'];
                                                        } else {
                                                            echo '';
                                                        } 
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>University</strong>
                                                <br>
                                                <p class="text-muted" id='school-info'>
                                                    <?php
                                                        if(isset($_SESSION['school'])) {
                                                            echo  $_SESSION['school'];
                                                        } else {
                                                            echo '';
                                                        } 
                                                    ?>                   
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="m-t-30" id='desc-info'>
                                            <?php
                                                if(isset($_SESSION['desc'])) {
                                                    $text = $_SESSION['desc'];
                                                    echo  "$text";
                                                } else {
                                                    echo "";
                                                } 
                                            ?> 
                                        </p>
                                        <h4 class="font-medium m-t-30">Skill Set</h4>
                                        <hr>
                                        <h5 class="m-t-30">PHP <span class="pull-right">80%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-block">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" disabled placeholder=<?php
                                                    if(isset($_SESSION['username'])) {
                                                            $text = $_SESSION['username'];
                                                            echo "'$text'";
                                                    } else {
                                                        echo "''";
                                                    } 
                                                    ?>
                                                    class="form-control form-control-line" id="username">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control form-control-line" id="password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder=
                                                    <?php
                                                        if(isset($_SESSION['phone'])) {
                                                            $text = $_SESSION['phone'];
                                                            echo "'$text'";
                                                        } else {
                                                            echo "''";
                                                        } 
                                                    ?> class="form-control form-control-line" id="phone">
                                                </div>
                                            </div>
                                           <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder=
                                                    <?php
                                                        if(isset($_SESSION['email'])) {
                                                            $text = $_SESSION['email'];
                                                            echo "'$text'";
                                                        } else {
                                                            echo "''";
                                                        } 
                                                    ?>
                                                     class="form-control form-control-line" name="email" id="email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Decription</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5" placeholder=
                                                    <?php
                                                        if(isset($_SESSION['desc'])){
                                                            $text = $_SESSION['desc'];
                                                            echo "'$text'";
                                                        } else {
                                                            echo "''";
                                                        }
                                                    ?> 
                                                    class="form-control form-control-line" id="desc"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Select your University</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line" id="school">
                                                        <option>National University of Singapore</option>
                                                        <option>Nanyang Technological University</option>
                                                        <option>NUS Business School</option>
                                                        <option>Singapore Management University</option>
                                                        <option>James Cook University Singapore</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div id="hints" style="color:red"></div>
                                                <div class="col-sm-12">
                                                    <input type="button" name="update-profile" id="update-profile" class="btn btn-success" value="Update Profile"/>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script>
        $("#password").click(function () {
            $("#hints").html('');
        })
        $("#email").click(function () {
            $("#hints").html('');
        })
        $("#desc").click(function () {
            $("#hints").html('');
        })
        $("#phone").click(function () {
            $("#hints").html('');
        })
        $("#update-profile").click(function () {
            var param = {
                "act": 'update_account',
                "password": $("#password").val(),
                "phone": $("#phone").val(),
                "email": $("#email").val(),
                "desc": $("#desc").val(),
                "school": $("#school").val()
            };
            $.ajax({
                url:"/student_entrepreneur_funding_system/doaction.php",
                data:param,
                type:"POST",
                dataType:"text",
                success:function (data) {
                     if (data.search('Update successfully') > -1){
                            if ($("#phone").val() != ''){
                                $("#phone-info").html($("#phone").val());
                            }
                            if ($("#email").val() != ''){
                                $("#email-info").html($("#email").val());
                            }
                            if ($("#school").val() != ''){
                                $("#school-info").html($("#school").val());
                            }
                            if ($("#desc").val() != ''){
                                $("#desc-info").html($("#desc").val());
                            }

                     }
                    $("#hints").html(data);
                }
            })
        })
    </script>



</html>
