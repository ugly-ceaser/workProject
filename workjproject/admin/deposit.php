<?php 
$title = "Deposits";

require 'req/header.php';

?>



                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3>All Deposits</h3>
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
                                            	$all_Deposits = fetch_all_deposits();
                                            	if($all_Deposits){
                                            		$i = 0;
                                            		foreach ($all_Deposits as $dep) {
                                            			$i++;


                                            	 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><?= getUserById($dep['user_id']); ?></td>
                                                    <td>$<?= number_format($dep['usd_amt']); ?></td>
                                                    <td class="center"><?= $dep['currency']; ?></td>
                                                    <td class="center"><?= $dep['status']; ?></td>
                                                    <td class="center"><?= $dep['date']; ?></td>
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