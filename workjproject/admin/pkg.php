<?php 
$title = "Active Investments";

require 'req/header.php';

if (!empty($_GET['status'])) {
    $status = $_GET['status'];
    $total = $_GET['total'];
    if ($status === "success") {
        echo "<script>swal('Successful!', 'Profits Added for $total Investment(s)!', 'success');</script>";
    }elseif ($status === "fail") {
        echo "<script>swal('Failed!', 'Try Again!', 'warning');</script>";
    }elseif ($status === "none") {
        echo "<script>swal('No Active Investments!', '', 'warning');</script>";
    }
}


?>


                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-lg-12">
                            <a href="all_profit" class="btn btn-primary">Add All Interests</a>
                            
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            
                            <div class="panel panel-default">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Plan</th>
                                                    <th>Status</th>
                                                    <th>Interest</th>
                                                    <th>Start Date</th>
                                                    <!-- <th>End</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	<?php 
                                            	$all_Inv = fetch_all_investments();
                                            	if($all_Inv){
                                            		$i = 0;
                                            		foreach ($all_Inv as $invsmt) {
                                            			$i++;

                                            	 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><?= getUserById($invsmt['user_id']); ?></td>
                                                    <td>$<?= number_format($invsmt['usd_amt']); ?></td>
                                                    <td class="center"><?= $invsmt['plan']; ?></td>
                                                    <td class="center"><?= $invsmt['status']; ?></td>
                                                    <td style="width: 100%" class="center btn btn-warning"><a href="single?id=<?= $invsmt['t_id']; ?>" style="font-weight: bolder; text-decoration: none;">Add Interest</a></td>
                                                    <td class="center"><?= $invsmt['date']; ?></td>
                                                    <!-- <td class="center"><?= $invsmt['end_date']; ?></td> -->
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