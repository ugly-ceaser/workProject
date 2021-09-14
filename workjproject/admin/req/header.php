<?php
// error_reporting(0);


require '../site_name.php';
require 'inc/functions.inc.php';

if (!isset($_SESSION['admin-id'])){
    header("Location: index");
    exit();
}
$admin_id = $_SESSION['admin-id'];
$admin_id = sanitize($admin_id);
$response = fetch_admin_user($admin_id);

if ($response) {
    $admin = $response;
}

 ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $title; ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="shortcut icon" href="../img/favicon.png">

        <script type="text/javascript" src="js/sweetalert.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><?= $site_title ?></a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="../"><i class="fa fa-home fa-fw"></i> Home</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">

                    

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?= $admin['name']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="admins"><i class="fa fa-user fa-fw"></i> All Admins</a>
                            </li>
                            <!-- <li><a href="setting"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li> -->
                            <li class="divider"></li>
                            <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- /.navbar-top-links -->

                <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script><div id="coinmarketcap-widget-marquee" coins="1,1027,825,1839,2010,52,74,5994,3718,5426,1831,6636,2,4195,5864,3513,3890,6892,4642,6719,1975,2416,3077,7083,2130,1772,7226,5488,6942,2900,6937,1518,7186,4256,2502,512,8916,328,3635,3717,2469,3155,1684,2273,2930,9566,1321,7278,3602,1274,5805,2135,6538,2634,6758,2499,1958,2011,2586,3945,109,1437,4066,1896,5161" currency="USD" theme="light" transparent="false" show-symbol-logo="true"></div>


                <div class="navbar-default sidebar" role="navigation">

                    <div class="sidebar-nav navbar-collapse">

                        <ul class="nav" id="side-menu">

                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>

                            <li>
                                <a href="dashboard" class="<?php if($title === "Dashboard"){
                                    echo 'active';

                                } ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a href="profile" class="<?php if($title === "All Users"){
                                    echo 'active';

                                } ?>"><i class="fa fa-users fa-fw"></i> All Users</a>
                            </li>

                            <li>
                                <a href="team" class="<?php if($title === "Team"){
                                    echo 'active';

                                } ?>"><i class="fa fa-users fa-fw"></i> Team</a>
                            </li>

                            <li>
                                <a href="email" class="<?php if($title === "Email Sender"){
                                    echo 'active';

                                } ?>"><i class="fa fa-plane fa-fw"></i> Email Sender</a>
                            </li>
                            

                            <li>
                                <a href="article" class="<?php if($title === "Articles"){
                                    echo 'active';

                                } ?>"><i class="fa fa-edit fa-fw"></i> Articles</a>
                            </li>
                            

                            <li>
                                <a class="menu-trigger" href="#"><i class="fa fa-exchange fa-fw"></i> Transactions<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="deposit" class="<?php if($title === "Deposits"){
                                    echo 'active';

                                } ?>"><i class="fa fa-dollar fa-fw"></i> Deposits</a>
                                    </li>

                                    <li>
                                        <a href="pending" class="<?php if($title === "Pending Transactions"){
                                    echo 'active';

                                } ?>"><i class="fa fa-exchange fa-fw"></i> Pending Transactions</a>
                                    </li>

                                    <li>
                                        <a href="wdrl" class="<?php if($title === "Withdrawals"){
                                    echo 'active';

                                } ?>"><i class="fa fa-money fa-fw"></i> Withdrawals</a>
                                    </li>

                                    <li>
                                        <a href="pkg" class="<?php if($title === "Active Investments"){
                                    echo 'active';

                                } ?>"><i class="fa fa-briefcase fa-fw"></i> Active Investments</a>
                                    </li>

                                    <li>
                                        <a href="hst" class="<?php if($title === "Transaction History"){
                                    echo 'active';

                                } ?>"><i class="fa fa-briefcase fa-fw"></i> Transaction History</a>
                                    </li>


                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <?php if (($admin['role'] === "Developer") OR ($admin['role'] === "Admin")) {
                                ?>
                            <li>
                                <a href="#"><i class="fa fa-gear fa-fw"></i> Settings<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="wallet" class="<?php if($title === "Wallet Addresses"){
                                    echo 'active';

                                } ?>"><i class="fa fa-edit fa-fw"></i> Wallet Addresses</a>
                                    </li>
                                    <li>
                                        <a href="admins" class="<?php if($title === "Admins"){
                                    echo 'active';

                                } ?>"><i class="fa fa-users fa-fw"></i> Admins</a>
                                    </li>
                                    

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <?php 
                            }  ?>

                            
                            </ul>
                                

                        </ul>

                    </div>

                </div>


            </nav>



            <!-- Navigation End -->

            <div id="page-wrapper">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <br>
                            <br>
                            <h1 class="page-header"><?= $title; ?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

