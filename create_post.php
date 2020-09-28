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
            <i><img src="img/headimg/1.png" class="profile-pic" />Markarn Doe</i>
        </header>


        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a href="index.php" ><span>Home</span></a>
                        </li>
                        <li> <a href="mypage.php" aria-expanded="false"><span>Profile</span></a>
                        </li>
                        <li class="active"> <a href="create_post.php" aria-expanded="false"><span>Create a post</span></a>
                        </li>
                        <li> <a href="logout.php"><span>Logout</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>


        <div class="page-wrapper">

            <div class="container-fluid">
                <!-- Row -->
                <div class="row">

                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-12">Title</label>
                            <div class="col-md-12">
                                <input type="text" id='title' placeholder="Title" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Author</label>
                            <div class="col-md-12">
                                <input type="text" id='author' placeholder="Author name" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Cover picture url</label>
                            <div class="col-md-12">
                                <input type="text" id='pic_url' placeholder="Url" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Video url</label>
                            <div class="col-md-12">
                                <input type="text" id='video_url' placeholder="Url" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea id='desc' rows="10" cols="50" class="form-control form-control-line"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Category</label>
                            <div class="col-sm-12">
                                <select id='category' class="form-control form-control-line">
                                    <option>Video</option>
                                    <option>Music clip</option>
                                    <option>Animation</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12" id='hints'style="color:red;"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="button" class="btn btn-success" id="submit-post" value="Submit" />
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
</div>
</body>

    <script>

        $("#desc").click(function () {
            $("#hints").html('');
        })
        $("#pic_url").click(function () {
            $("#hints").html('');
        })
        $("#video_url").click(function () {
            $("#hints").html('');
        })
        $("#author").click(function () {
            $("#hints").html('');
        })
        $("#title").click(function () {
            $("#hints").html('');
        })

        $("#submit-post").click(function () {
            var param = {
                "act": 'add',
                "desc": $("#desc").val(),
                "pic_url": $("#pic_url").val(),
                "video_url": $("#video_url").val(),
                "author": $("#author").val(),
                "title": $("#title").val(),
                "category": $("#category").val()
            };

            $.ajax({
                url:"/student_entrepreneur_funding_system/doaction.php",
                data:param,
                type:"POST",
                dataType:"text",

                success:function (data) {
                    if (data.search('Post successfully') > -1){
                        $("#hints").html('Post successfully');

                        $("#desc").val('');
                        $("#pic_url").val('');
                        $("#video_url").val('');
                        $("#author").val('');
                        $("#title").val('');
                    }
                }
            })
        })
    </script>

</html>
