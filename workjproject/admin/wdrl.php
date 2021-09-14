<?php 
$title = "Withdrawals";

require 'req/header.php';

?>



                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3>All Withdrawals</h3>
                                </div>
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
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	<?php 
                                            	$all_withd = fetch_all_withdrawal();
                                            	if($all_withd){
                                            		$i = 0;
                                            		foreach ($all_withd as $withd) {
                                            			$i++;


                                            	 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><?= getUserById($withd['user_id']); ?></td>
                                                    <td>$<?= number_format($withd['usd_amt']); ?></td>
                                                    <td class="center"><?= $withd['currency']; ?></td>
                                                    <td class="center"><?= $withd['status']; ?></td>
                                                    <td class="center"><?= $withd['date']; ?></td>
                                                </tr>


                                                <?php  }
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