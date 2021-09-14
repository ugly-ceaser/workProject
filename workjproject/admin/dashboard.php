<?php 
$title = "Dashboard";

require 'req/header.php';


$users = total_users();
if ($users !== false) {
    $num_user = $users;
} else {$num_user = 0;}


$total_dep = total_deposits();
if ($total_dep !== false) {
    $num_dep = $total_dep;
} else {$num_dep = 0;}


$inv = active_inv();
if ($inv !== false) {
    $num_inv = $inv;
} else {$num_inv = 0;}


$withd = withdrawals();
if ($withd !== false) {
    $num_withd = $withd;
} else {$num_withd = 0;}




 ?>


                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <i class="fa fa-user fa-4x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= $num_user ?></div>
                                            <div>Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="profile">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <i class="fa fa-money fa-4x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= $num_dep ?></div>
                                            <div>Total Deposits!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="deposit">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <i class="fa fa-btc fa-4x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= $num_inv; ?></div>
                                            <div>Active Investments!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="pkg">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-1">
                                            <i class="fa fa-exchange fa-2x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= $num_withd; ?></div>
                                            <div>Withdrawals!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="wdrl">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- /.row -->

                    <!-- Charts Beginning -->

                    <div class="row">
                        <div class="col-lg-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Coins Prices
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
                                    <i class="fa fa-bar-chart-o fa-fw"></i> TRON Price
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            
                                            

                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div id="">
                                        
                                        <!-- API Here -->
                                        <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script><div class="coinmarketcap-currency-widget" data-currencyid="1958" data-base="USD" data-secondary="BTC" data-ticker="true" data-rank="true" data-marketcap="true" data-volume="true" data-statsticker="true" data-stats="USD"></div>


                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->


                            
                            <!-- /.panel -->


                        </div>


                        

                    </div>

                    <!-- Chart Ending -->
                    <!-- /.row -->
                





<?php require 'req/footer.php'; ?>