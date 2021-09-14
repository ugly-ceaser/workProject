<?php  
// error_reporting(0);
require '../site_name.php';
require_once 'inc/functions.inc.php';
if (!isset($_SESSION['id'])){
    header("Location: index");
    exit();
}
$user_id = $_SESSION['id'];
$user_id = sanitize($user_id);
$response = fetch_user($user_id);

if ($response) {
    $user = $response;
    if ($response['activated'] > 0) {
       $anton = 1;
    }else{
       $anton = 0;
    }

}


switch ($user['plan']) {
    case 'STARTER':
        $roi = 10;
        $invPlan = [$user['plan'], $roi, 14, 100, "No Limit"];
        break;

    case 'HIGH FREQUENCY':
        $roi = 30;
        $invPlan = [$user['plan'], $roi, 30, 5000, "No Limit"];
        $height = "97px";
        break;

    case 'CONTRACT':
        $roi = 50;
        $invPlan = [$user['plan'], $roi, 90, 50000, "No Limit"];
        break;

    case 'LEVERAGE':
        $roi = 50;
        $invPlan = [$user['plan'], $roi, 120, 100000, "No Limit"];
        break;
    
    default:
        $roi = 5;
        break;
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

        <title><?= $title; ?> - <?= $site_title ?></title>

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

        <link rel="shortcut icon" href="../img/up_logo.png">

        <script type="text/javascript" src="js/sweetalert.min.js"></script>
        <script src="js/jquery.min.js"></script>
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="resize: none;">
        <?php include('./inc/alert.php'); ?>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="width: 100%;">
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

                    <br>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?= $user['name']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            
                            <li class="divider"></li>
                            <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- /.navbar-top-links -->

                <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script><div id="coinmarketcap-widget-marquee" coins="1,1027,825,1839,2010,52,74,5994,3718,5426,1831,6636,2,4195,5864,3513,3890,6892,4642,6719,1975,2416,3077,7083,2130,1772,7226,5488,6942,2900,6937,1518,7186,4256,2502,512,8916,328,3635,3717,2469,3155,1684,2273,2930,9566,1321,7278,3602,1274,5805,2135,6538,2634,6758,2499,1958,2011,2586,3945,109,1437,4066,1896,5161" currency="USD" theme="light" transparent="false" show-symbol-logo="true"></div>
                


                <!-- Price Ticker End -->


                <div id="satan" class="navbar-default sidebar hide" role="navigation">

                    <div class="sidebar-nav navbar-collapse">

                        <ul class="nav" id="side-menu">

                            <!-- <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                            </li> -->

                            <li>
                                <a href="dashboard" class="<?php if($title === "Dashboard"){
                                    echo 'active';

                                } ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a href="profile" class="<?php if($title === "Profile"){
                                    echo 'active';

                                } ?>"><i class="fa fa-user fa-fw"></i> Profile</a>
                            </li>

                            

                            <li>
                                <a href="#"><i class="fa fa-money fa-fw"></i> Deposit<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    
                                    <li>
                                        <a href="#">Crypto <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="deposit?currency=BTC" class="<?php if($title === "BTC"){
                                                    echo 'active';

                                                } ?>"> BTC</a>
                                            </li>

                                            <li>
                                                <a href="deposit?currency=ETH" class="<?php if($title === "ETH"){
                                                    echo 'active';

                                                } ?>"> ETH</a>
                                            </li>

                                            <li>
                                                <a href="deposit?currency=TRX" class="<?php if($title === "TRX"){
                                                    echo 'active';

                                                } ?>"> TRX</a>
                                            </li>

                                            <li>
                                                <a href="deposit?currency=LTC" class="<?php if($title === "LTC"){
                                                    echo 'active';

                                                } ?>"> LTC</a>
                                            </li>

                                            <li>
                                                <a href="deposit?currency=DOGE" class="<?php if($title === "DOGE"){
                                                    echo 'active';

                                                } ?>"> DOGE</a>
                                            </li>

                                            <li>
                                                <a href="deposit?currency=BNB" class="<?php if($title === "BNB"){
                                                    echo 'active';

                                                } ?>"> BNB(Smart Chain)</a>
                                            </li>

                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>

                                    <li>
                                        <a href="#">Fiat <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="deposit?currency=PAYPAL" class="<?php if($title === "PAYPAL"){
                                                    echo 'active';

                                                } ?>"><i class="fa fa-paypal fa-fw"></i> PAYPAL</a>
                                            </li>

                                            <li>
                                                <a href="deposit?currency=PERFECT MONEY" class="<?php if($title === "PERFECT MONEY"){
                                                    echo 'active';

                                                } ?>"><i class="fa fa-paypal fa-fw"></i> PERFECT MONEY</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="ref" class="<?php if($title === "Referral"){
                                    echo 'active';

                                } ?>"><i class="fa fa-users fa-fw"></i> Referral</a>
                            </li>

                            <li>
                                <a href="pkg?sector=<?= $user['plan'] ?>" class="<?php if($title === "Investment"){
                                    echo 'active';

                                } ?>"><i class="fa fa-sitemap fa-fw"></i> Investment</a>
                            </li>
                            

                            <li>
                                <a class="menu-trigger" href="#"><i class="fa fa-exchange fa-fw"></i> Transactions<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <!-- <li>
                                        <a href="deposit" class="<?php if($title === "Deposits"){
                                    echo 'active';

                                } ?>"><i class="fa fa-dollar fa-fw"></i> Deposits</a>
                                    </li> -->

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
                                        <a href="ovd" class="<?php if($title === "Overdraft"){
                                    echo 'active';

                                } ?>"><i class="fa fa-battery-1 fa-fw"></i> Overdraft(<i style="color: red;">Coming Soon</i>)</a>
                                    </li>

                                    <li>
                                        <a href="hst" class="<?php if($title === "Transaction History"){
                                    echo 'active';

                                } ?>"><i class="fa fa-briefcase fa-fw"></i> Transaction History</a>
                                    </li>


                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-gear fa-fw"></i> Settings<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="wallet" class="<?php if($title === "Payment Details"){
                                    echo 'active';

                                } ?>"><i class="fa fa-edit fa-fw"></i> Payment Details</a>
                                    </li>
                                    <li>
                                        <a href="profile" class="<?php if($title === "Profile"){
                                    echo 'active';

                                } ?>"><i class="fa fa-info fa-fw"></i> User Profile</a>
                                    </li>
                                    

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            
                            </ul>
                                

                        </ul>

                    </div>

                </div>

                <script type="text/javascript">
                    $(document).ready(()=>{
                        setTimeout(()=>{
                            $("#satan").removeClass("hide");
                        }, 2000);
                    });
                </script>


            </nav>



            <!-- Navigation End -->

            <div id="page-wrapper">
                <div class="container-fluid">
<br>
<br>
<br>
<br>
<br>
<?php 
if ($user['activated'] == 2) {
    $act_status = "Active";
    $color = "#44ee00";
}elseif($user['activated'] == 1){
    $act_status = "Inactive<br>(Make a Deposit to Activate)";
    $color = "red";
}elseif($anton == 0){
    $lavey = "ACCOUNT RESTRICTED";
    $color = "red";
}
 ?>
                    <div class="row" style="width: 100%;">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="width: 100%;"><?= $title; ?>
                                <?php if (isset($act_status)): ?>
                                    <br><br><b style="font-size: 25px;">Status - <i class="fa fa-circle" style="color: <?= $color ?>; font-size: 25px;"></i> <?= $act_status ?></b>
                                <?php endif ?>

                                <?php if (isset($lavey)): ?>
                                    <br><br><b style="font-size: 30px;"><i class="fa fa-circle" style="color: <?= $color ?>; font-size: 25px;"></i> <?= $lavey ?></b>
                                <?php endif ?>
                                </h1>

                        </div>
                        <!-- /.col-lg-12 -->
                        
                        <div class="col-lg-5">
                            <div id="google_translate_element"></div>


                            <script type="text/javascript">
                            function googleTranslateElementInit() {
                              new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                            }
                            </script>

                            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </div>

                    </div>

