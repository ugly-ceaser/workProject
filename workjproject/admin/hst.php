<?php 
$title = "Transaction History";

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
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Currency</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	<?php 
                                            	$all_Trans = fetch_all_transactions();
                                            	if($all_Trans){
                                            		$i = 0;
                                            		foreach ($all_Trans as $trans) {
                                            			$i++;

                                            	 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><?= getUserById($trans['user_id']); ?></td>
                                                    <td>$<?= floatval($trans['usd_amt']); ?></td>
                                                    <td class="center"><?= $trans['currency']; ?></td>
                                                    <td class="center"><?= $trans['type']; ?></td>
                                                    <td class="center"><?= $trans['status']; ?></td>
                                                    <td class="center"><?= $trans['date']; ?></td>
                                                </tr>


                                                <?php }
                                            	} ?>


                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>







<?php require 'req/footer.php'; ?>