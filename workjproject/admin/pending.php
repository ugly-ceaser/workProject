<?php 
$title = "Pending Transactions";

require 'req/header.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] === "success") {
        echo "<script>swal('Updated!', 'Successfully Approved!', 'success');</script>";
    }elseif ($_GET['action'] === "fail") {
        echo "<script>swal('Failed!', 'Try Again!', 'warning');</script>";        
    }elseif ($_GET['action'] === "delete") {
        echo "<script>swal('Updated!', 'Successfully Deleted!', 'success');</script>";        
    }
}

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
                                                    <!-- <th>Account</th> -->
                                                    <th>Type</th>
                                                    <th>Approve</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	<?php 
                                            	$all_Pending = fetch_all_pending();
                                            	if($all_Pending){
                                            		$i = 0;
                                            		foreach ($all_Pending as $pend) {
                                            			$i++;
                                                        if ($pend['account'] === "usd_bal") {
                                                            $account = "Profit Balance";
                                                        }elseif ($pend['account'] === "inv_cap") {
                                                            $account = "Investment Capital";
                                                        }else{
                                                            $account = "Investment Capital";
                                                        }

                                            	 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><a href="profile?user_id=<?= $pend['user_id'] ?>"><?= getUserById($pend['user_id']); ?></a></td>
                                                    <td>$<?= floatval($pend['usd_amt']); ?></td>
                                                    <td class="center"><?= $pend['currency']; ?></td>
                                                    <!-- <td class="center"><?= $account; ?></td> -->
                                                    <td class="center"><?= $pend['type']; ?></td>
                                                    <td style="width: 100%" class="center btn btn-warning"><a href="approve?id=<?= $pend['t_id']; ?>&usd_amt=<?= $pend['usd_amt']?>&type=<?= $pend['type'] ?>&user_id=<?= $pend['user_id'] ?><?php if (!empty($pend['account'])) {
                                                            echo '&account='. $pend['account'];
                                                        } ?>" style="font-weight: bolder; text-decoration: none;">Approve</a></td>
                                                    <td class="center"><?= $pend['status']; ?></td>
                                                    <td class="center"><?= $pend['date']; ?></td>
                                                    <td style="width: 100%" class="center btn btn-danger"><a href="delete?id=<?= $pend['t_id']; ?>" style="font-weight: bolder; text-decoration: none;">Delete</a></td>
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