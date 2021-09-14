<?php 
$title = "Skyro Partner's Plan";

require 'req/header.php';

?>




 <!-- /.row -->
                    <div class="row">
<?php 
		$plan1 = ["RETIREMENT(Compound)", 25, 730, 30, "No Limit"];
		$plan2 = ["SAVINGS", 15, 365, 30, "No Limit"];
		$plans = array($plan1, $plan2);
		
	

if (!empty($plans)) {
	$i = 0;
	foreach ($plans as $plan) {
		$i++;
		$y = $plan[2] / 365;
		if ($plan[4] === "No Limit") {
			$limit = 90000000000;
		}else{
			$limit = $plan[4];
		}
 ?>
                        <div class="col-lg-5 col-md-6">
                            <div class="panel panel-primary">

                           

                                
                                <!-- <div class="login-panel panel panel-default sign-in"> -->
			                        <div class="panel-heading">
			                            <h2 align="center" style="font-weight: bolder;"><?= $plan[0]; ?></h2>
			                        </div>
			                        <div class="panel-body">
			                            <!-- <form role="form" action="" method=""> -->
			                            	<h4><b>Amount Range : $<?= $plan[3]; ?> - $<?= $plan[4]; ?></b></h4>
			                            	<h4><b>Duration : <?= $y; ?> Year(s)</b></h4>
			                            	<h4><b>CIM : <?= $plan[1]; ?>%</b></h4>
			                            	<h4><b>24/7 Support</b></h4>
			                            	<!-- <h4><b>Instant Withdrawals</b></h4> -->
			                                <fieldset>
			                                    <div class="form-group">
			                                        <input style="visibility: hidden;" class="form-control" name="sector" type="text" value="<?= "reirement" ?>">
			                                    	<label>Enter Amount</label>
			                                        <input id="amt<?= $i; ?>" class="form-control" placeholder="Amount" name="amt" type="number" autofocus>
			                                    </div>
			                                    
			                                    <!-- Change this to a button or input when using this as a form -->
			                                    <button onclick="sendData(<?= $i ?>, <?= $user['inv_cap'] ?>, '<?= $plan[0] ?>', <?= $plan[1] ?>, <?= $plan[2] ?>, <?= $user_id ?>, <?= $plan[3] ?>, <?= $limit ?>)" id="inv<?= $i; ?>" class="btn btn-lg btn-success btn-block">Activate</button>
			                                    

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
			$.ajax(`inv_ajax.php?amt=${amt}&plan=${plan}&interest=${interest}&days=${days}&user_id=${user_id}&inv_cap=${balance}`,
	            	{
	            		success : (data)=>{
	            			let jData = JSON.parse(data);
	            			// jData.name
	            			if (jData.success = 1) {

	            			swal('Activated!', `Successfully Activated ${plan} Plan!`, 'success');
	            		}else{
	            			swal('Failed!', 'Try Again!', 'warning');

	            		}
	            		},
	            		error : ()=>{
	            			swal('Failed!', 'Link Failed!', 'warning');
	            		}
	            	});
		}else{
			swal('Failed!', 'Invalid Amount!', 'warning');
		}
		// if (amount >= plan4 && ...balance) {
		// 	$.ajax(`inv.ajax.php?amt=${amount}`)
		// }
	}
</script>

<?php } } ?>


                        


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