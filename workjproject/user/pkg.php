<?php 
$title = "Investment Packages";

require 'req/header.php';

?>




 <!-- /.row -->
                    <div class="row">
<?php 


if (!empty($invPlan) && !empty($_GET['sector']) && ($_GET['sector'] == $user['plan'])) {
	$i = 0;
		$i++;
		if ($invPlan[4] === "No Limit") {
			$limit = 90000000000;
		}else{
			$limit = $invPlan[4];
		}
 ?>
                      
                        
                        <div class="col-lg-4 col-md-6">
                        	<h3 style="font-weight: bolder;"><i class="fa fa-money"></i> Available Bal: $<?= round(floatval($user['usd_bal']),2);?></h3>
                        	<br>
                            <div class="panel panel-primary">


                                
                                <!-- <div class="login-panel panel panel-default sign-in"> -->
			                        <div class="panel-heading">
			                            <h2 align="center" style="font-weight: bolder;"><?= $invPlan[0]; ?></h2>
			                        </div>
			                        <div class="panel-body" style="height: 356px;width: 321px;">
			                            <!-- <form role="form" action="" method=""> -->
			                            	<h4><b>Amount Range : $<?= number_format($invPlan[3]); ?> - $<?= $invPlan[4]; ?></b></h4>
			                            	<h4><b>Maturity : <?= $invPlan[2]; ?> Days</b></h4>
			                            	<h4><b>Returns : <?= $invPlan[1]; ?>%</b></h4>
			                            	<h4><b>24/7 Support</b></h4>
			                            	<h4><b>Instant Withdrawals</b></h4>
			                                <fieldset>
			                                    <div class="form-group">
			                                        <input style="visibility: hidden;" class="form-control" name="sector" type="text" value="<?= $plan ?>">
			                                    	<label>Enter Amount</label>
			                                        <input id="amt<?= $i; ?>" class="form-control" placeholder="Amount" name="amt" type="number" autofocus>
			                                    </div>
			                                    
			                                    <?php if (!isset($lavey)): ?>
			                                    <!-- Change this to a button or input when using this as a form -->
			                                    <button onclick="sendData(<?= $i ?>, <?= $user['usd_bal'] ?>, '<?= $invPlan[0] ?>', <?= $invPlan[1] ?>, <?= $invPlan[2] ?>, <?= $user_id ?>, <?= $invPlan[3] ?>, <?= $limit ?>)" id="inv<?= $i; ?>" class="btn btn-lg btn-success btn-block">Activate</button>
			                                    <?php endif ?>
			                                    <?php if (isset($lavey)): ?>
			                                    <h2><b style="font-size: 20px;"><i class="fa fa-circle" style="color: <?= $color ?>; font-size: 20px;"></i> <?= $lavey ?></b></h2>
			                                    <?php endif ?>

			                                </fieldset>
			                            <!-- </form> -->

			                        </div>
			                    <!-- </div> -->


                            </div>
                        </div>

<script type="text/javascript">
	function sendData(id, balance, plan, interest, days, user_id, min, max) {
		var amt = document.getElementById(`amt${id}`).value;
		console.log(amt);
		if ((amt >= min) && (amt <= max) && (amt <= balance)) {
			$.ajax(`inv_ajax.php?amt=${amt}&plan=${plan}&interest=${interest}&days=${days}&user_id=${user_id}&usd_bal=${balance}`,
	            	{
	            		success : (data)=>{
	            			let jData = JSON.parse(data);
	            			// jData.name
	            			if (jData.success = 1) {

	            			swal('Activated!', `Successfully Activated ${plan} Plan!`, 'success').then(window.location.href = "pkg");
	            		}else{
	            			swal('Failed!', 'Try Again!', 'warning');

	            		}
	            		},
	            		error : ()=>{
	            			swal('Failed!', 'Link Failed!', 'warning');
	            		}
	            	});
		}else{
			swal('Failed!', 'Invalid Amount/Insufficient Balance!', 'warning');
		}
		// if (amount >= plan4 && ...balance) {
		// 	$.ajax(`inv.ajax.php?amt=${amount}`)
		// }
	}
</script>

<?php } ?>


                        


                    </div>



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" align="center">
                                    <h2 style="font-weight: bolder;">All Investments</h2>
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
                                                    <th>Plan</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <!-- <th>End</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	<?php 
                                            	$all_Trans = fetch_all_investments_by_Id($user_id);
                                            	if($all_Trans){
                                            		$i = 0;
                                            		foreach ($all_Trans as $trans) {
                                            			$i++;

                                            	 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><?= $user['name']; ?></td>
                                                    <td>$<?= number_format($trans['usd_amt']); ?></td>
                                                    <td class="center"><?= $trans['plan']; ?></td>
                                                    <td class="center"><?= $trans['status']; ?></td>
                                                    <td class="center"><?= $trans['date']; ?></td>
                                                    <!-- <td class="center"><?= $trans['end_date']; ?></td> -->
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