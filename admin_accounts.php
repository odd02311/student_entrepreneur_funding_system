
<?php
session_start();
require_once dirname(__FILE__) .'/common.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

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
                        <li> <a href="admin.php" aria-expanded="false"><span>Profile</span></a>
                        </li>
                        <li class="active"> <a href="admin_accounts.php"><span>Accounts</span></a>
                        </li>
                        <li> <a href="admin_posts.php"><span>Posts</span></a>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Accounts</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Accounts</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>School</th>
                                                <th>Create Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
 
                                        <?php
                                                    $index=0;
                                                    $rows = getAllUsers();
                                                    foreach ($rows as $row){
                                                        $index+=1;
                                        ?>
                                                <td>
                                                    <?php echo $index; ?>
                                                </td>

                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['school']; ?></td>
                                                <td><?php echo $row['create_date']; ?></td>
                                            </tr>

                                        <?php } ?>

                                        </tbody>
                                    </table>
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

</body>

</html>
