
<?php 
$title = "Dashboard";

require 'req/header.php';


$response = deposits($user_id);
if ($response !== false) {
    $deposit = $response;
}  else $deposit = 0;

$response = profits($user_id);
if ($response !== false) {
    $profit = $response;
}  else $profit = 0;


// $roi = roi($user_id);
// if ($roi !== false) {
//     $roi = $roi;
// }  else $roi = 0;

$invs = num_inv($user_id);






 ?>


                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-green">
                                <div style="background-color: #fff;color: #337AB7;" class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <i style="color: #44ee00;" class="fa fa-user fa-2x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">#<?= $user['acn']; ?></div>
                                            <div>Member ID</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="profile"><!-- profits?record=profit -->
                                    <div style="background-color: #337AB7; color: #fff;" class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-yellow">
                                <div style="background-color: #fff;color: #337AB7; <?php if (!empty($height)) {
                                    echo "height:$height";
                                } ?>" class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <i style="color: #f73718;" class="fa fa-free-code-camp fa-2x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php if (!empty($height)) {
                                    echo "<h4>";
                                } ?><?= $user['plan']; ?><?php if (!empty($height)) {
                                    echo "</h4>";
                                } ?></div>
                                            <div>Plan</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="pkg">
                                    <div style="background-color: #337AB7; color: #fff;" class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                         
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-green">
                                <div style="background-color: #fff;color: #337AB7;" class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <i style="color: #000;" class="fa fa-clock-o fa-2x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= $roi; ?>%</div>
                                            <div>Daily ROI</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="profits?record=roi">
                                    <div style="background-color: #337AB7; color: #fff;" class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-red">
                                <div style="background-color: #fff;color: #337AB7;" class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <i class="fa fa-dollar fa-2x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">$<?= round(floatval($user['usd_bal']), 2); ?></div>
                                            <div>Balance!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div style="background-color: #337AB7; color: #fff;" class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                       
                        <!-- <div class="col-lg-4 col-md-6">
                            <div class="panel panel-primary">
                                <div style="background-color: #fff;color: #337AB7;" class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <i class="fa fa-bank fa-2x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">$<?= round(floatval($deposit), 2); ?></div>
                                            <div>Deposits</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="dep_hist">
                                    <div style="background-color: #337AB7; color: #fff;" class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-red">
                                <div style="background-color: #fff;color: #337AB7;" class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <i class="fa fa-line-chart fa-2x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">$<?= round(floatval($user['inv_cap']), 2); ?></div>
                                            <div>Investment Capital!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div style="background-color: #337AB7; color: #fff;" class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div> -->

                        
                    </div>

                    <!-- /.row -->

                    <!-- Charts Beginning -->

                    <div class="row">
                        <div class="col-lg-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> CRYPTO MARKET
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            
                                            

                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div id="">

                                        <!-- API Here -->
                                        <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinPriceBlock.js"></script><div id="coinmarketcap-widget-coin-price-block" coins="1,1027,825,2,1839,74,52,2010,5994,3718" currency="USD" theme="light" transparent="false" show-symbol-logo="true"></div>
                                    
                                        
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>

                            <!-- /.panel -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> TRON CHART
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            
                                            

                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body d-none">
                                    <div id="">
                                        
                                        <!-- API Here -->
                                        <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script><div class="coinmarketcap-currency-widget" data-currencyid="1958" data-base="USD" data-secondary="BTC" data-ticker="true" data-rank="true" data-marketcap="true" data-volume="true" data-statsticker="true" data-stats="USD"></div>
                                        
                                                           
                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-clock-o fa-fw"></i> Timeline
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <ul class="timeline">
                                        <?php 
                                                $articles = fetch_all_articles();
                                                if($articles){
                                                    $i = 0;
                                                    foreach ($articles as $article) {
                                                        $i++;
                                                        if ($i <= 2) {
                                                           $invert = "timeline-inverted";
                                                           
                                                           $badge = "fa-check"; 
                                                        }else{
                                                            $i = 0;
                                                        }

                                                 ?>
                                                 

                                                 <li class="<?php if ($i === 2) {
                                                     echo $invert;
                                                 } ?>">
                                                    <div class="timeline-badge warning"><i class="fa <?= $badge; ?>"></i>
                                                    </div>
                                                    <div class="timeline-panel">
                                                        <div class="timeline-heading">
                                                            <h4 class="timeline-title"><?= $article['title'] ?></h4>

                                                            <p>
                                                                <small class="text-muted"><i class="fa fa-clock-o"></i> <?= $article['date_posted'] ?>
                                                                </small>
                                                            </p>
                                                        </div>
                                                        <div class="timeline-body">
                                                            <p><?= $article['body'] ?>.</p>
                                                        </div>
                                                    </div>
                                                </li>


                                                 <?php }
                                                } ?>
                                        
                                    </ul>

                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->


                        </div>


                        

                    </div>

                    <!-- Chart Ending -->
                    <!-- /.row -->
                





<?php require 'req/footer.php'; ?>