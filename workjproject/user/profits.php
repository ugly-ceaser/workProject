<?php 
$title = "Earning History";

require 'req/header.php';

?>




<!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <!-- <div class="panel-heading">
                                    Pending Transactions
                                </div> -->
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <?php 
                                    if (!empty($_GET['record'])) {
                                        if ($_GET['record'] === "profit") {
                                            $response = fetch_all_profits($user_id);
                                        }elseif ($_GET['record'] === "roi") {
                                            $response = fetch_all_roi($user_id);
                                        }

                                    
                                        
                                        if ($response !== false) {
                                            $profit = $response;
                                            $alertClass = ["alert-success", "alert-info", "alert-warning", "alert-danger"];
                                            $i = 0;

                                            foreach ($profit as $value) {
                                                
                                       
                                    
                                     ?>

                                <div class="alert alert-info">
                                        You recieved $<?= floatval($value['amount']) ?> on <?= $value['date'] ?>
                                    </div>

                                <?php }
                                    }
                                 } ?>
                                        


                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>







<?php require 'req/footer.php'; ?>