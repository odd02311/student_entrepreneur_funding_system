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

    <title></title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/backend-style.css">
</head>


<body class="fix-header fix-sidebar card-no-border">

    <div id="main-wrapper">

        <header class="topbar">
            <a class="userinfo" href=""><img src="img/headimg/1.png" class="profile-pic" />Kelvin</a>
        </header>


        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a href="index.php" ><span>Home</span></a>
                        </li>
                        <li class="active"> <a href="admin.php" aria-expanded="false"><span>Profile</span></a>
                        </li>
                        <li> <a href="admin_accounts.php"><span>Accounts</span></a>
                        </li>
                        <li> <li> <a href="admin_posts.php"><span>Posts</span></a>
                        </li>
                        <li> <li> <a href="logout.php"><span>Logout</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"> Profile</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30"> <img src="img/headimg/1.png" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">Hanna Gover</h4>
                                    <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-8"><i>Follower:</i> <font class="font-medium">254</font></div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
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
                                             class="form-control form-control-line" name="example-email" id="email">
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

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether JavaScript -->
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>

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



</body>

</html>
