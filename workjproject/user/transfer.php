<?php 
$title = "Transfer";

require 'req/header.php';

?>

                    <div class="row">
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Transfer Instructions
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="alert alert-success">
                                        Enter Amount in USD in the Input below.
                                    </div>
                                    <div class="alert alert-info">
                                        Manually Type the Account Number of Beneficiary, avoid pasting from clipboard.
                                    </div>
                                    <div class="alert alert-warning">
                                        If the name displayed Corresponds, Click Proceed Button to complete.
                                    </div>
                                    
                                    
                                </div>
                                <!-- .panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        <!-- /.col-lg-6 -->
                    </div>



                    <?php if (isset($_POST['submit']) && !empty($_POST['amt']) && !empty($_POST['acn'])) {
                    	if (($_POST['amt'] >= 30) && ($_POST['acn'] != $user['acn'])) {
                            if ($_POST['amt'] <= $user['usd_bal']) {
                                $transfer = transfer($_POST, $user_id);
                                if ($transfer === true) {
                                    echo "<script>swal('Transfer Successful!', 'Wait for Approval!', 'success');</script>";
                                }else{
                                    echo "<script>swal('Failed!', 'Fill All Fields and Try Again!', 'warning');</script>";
                                }
                            }else{
                                echo "<script>swal('Insufficient Balance!', 'Try Again!', 'warning');</script>";
                            }
	                    		
	                    	}else{
                                    echo "<script>swal('Failed!', 'Enter valid Account and Amount!', 'warning');</script>";
                                }
						    
						} ?>

				<!-- /.row -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                <h3>Withdrawable Balance($<?= round(floatval($user['usd_bal']), 2) ?>)</h3>
                                	<form role="form" action="" method="post">
                                                   	
						                                <fieldset>
						                                    <div class="form-group">
						                                    	<label>Amount($)</label>
						                                        <input id="amtp" class="form-control" name="amt" type="number" autofocus>
						                                    </div>

                                                            <div class="form-group">
                                                                <label>Account Number</label>
                                                                <input id="acn" class="form-control" name="acn" type="text" autofocus>
                                                            </div>

                                                            <br>
                                                                <p class="acc-name" style="font-weight: bolder;text-transform: uppercase;"></p>

						                                	<br>
						                                    
                                                            <?php if (!isset($lavey)): ?>
						                                    <!-- Change this to a button or input when using this as a form -->
						                                    <button name="submit" type="submit" class="btn btn-lg btn-success btn-block hide nbtn">Proceed</button>
                                                            <?php endif ?>

                                                            <?php if (isset($lavey)): ?>
                                                            <h2><b style="font-size: 25px;"><i class="fa fa-circle" style="color: <?= $color ?>; font-size: 25px;"></i> <?= $lavey ?></b></h2>
                                                            <?php endif ?>

                            <script type="text/javascript">


                                document.getElementById('acn').addEventListener('keyup', function(){
                                    var acctNo = document.getElementById('acn').value;
                                                $.ajax(`ajax.php?acn=${acctNo}`,
                                                        {
                                                        success : function(data){
                                                            let jData = JSON.parse(data);

                                                            if (jData.success == 1) {
                                                                $(".nbtn").removeClass("hide");
                                                            }else{
                                                                $(".nbtn").addClass("hide");
                                                            }

                                                            $(".acc-name").html(jData.name)
                                                            

                                                                            },
                                                        error : function(){
                                                            swal('Failed!', 'Link Failed!', 'success')
                                                                            }
                                                    });
                                                });
                                                                
                                                            </script>
						                                    
						                                </fieldset>
						                            </form>
                                    

                                    <!-- /.modal -->
                                </div>
                                <!-- .panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                    </div>


                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3>History</h3>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Reciever</th>
                                                    <th>Amount</th>
                                                    <th>Transaction ID</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	<?php 
                                            	$all_Transfer = fetch_all_transfers_by_Id($user_id, $user['acn']);
                                            	if($all_Transfer){
                                            		$i = 0;
                                            		foreach ($all_Transfer as $transf) {
                                            			$i++;
                                                        $reciever = getUserByAcn($transf['r_acn']);
                                                        

                                            	 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><?= $transf['r_acn'] ."/".$reciever['name']; ?></td>
                                                    <td>$<?= number_format($transf['usd_amt']); ?></td>
                                                    <td class="center"><?= $transf['trans_id']; ?></td>
                                                    <td class="center"><?php if ($transf['r_acn'] === $user['acn']) {
                                                            echo "CREDIT";
                                                        }else{
                                                            echo "DEBIT";
                                                        } ?></td>
                                                    <td class="center"><?= $transf['status']; ?></td>
                                                    <td class="center"><?= $transf['date']; ?></td>
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