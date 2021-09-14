<?php 
$title = "Payment Details";

require 'req/header.php';

?>



					<div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">

                            	<?php 
                            	if (isset($_POST['submit'])) {
                            		$update = set_wallet($_POST, $user_id);
                            		if ($update === true) {
                            			echo "<script>swal('Updated!', 'Details has been added Successfully!', 'success');</script>";
                            		}else{
                            			echo "<script>swal('Failed!', 'Fill All Fields and Try Again!', 'warning');</script>";
                            		}
                            	}
                            	 ?>
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                	<form role="form" action="" method="POST">
                                                   	
						                                <fieldset>
						                                    <div class="form-group">
						                                    	<label>Enter Wallet Address</label>
						                                        <input id="amtp" class="form-control" name="wallet" type="text" autofocus>
						                                    </div>
						                                    <label>Select Currency</label>
						                                    <select class="form-control" name="currency">
                                                                <option>Select Wallet To Update</option>
                                                                <option value="BTC">Bitcoin(BTC)</option>
                                                                <option value="ETH">Ethereum(ETH)</option>
                                                                <option value="TRX">Tronix(TRX)</option>
                                                                <option value="LTC">Litecoin(LTC)</option>
                                                                <option value="DOGE">Dogecoin(DOGE)</option>
                                                                <option value="BNB">Binance Coin(BNB)</option>
                                                                <option value="Perfect_Money">Perfect Money</option>
                                                                <option value="paypal">PayPal</option>
                                                            </select>

						                                	<label>Select Network</label>
						                                    <select class="form-control" name="network">
						                                		<option>Select Network</option>
						                                		<option value="BTC">BTC</option>
                                                                <option value="ERC20">ERC20</option>
                                                                <option value="BEP20">BEP20</option>
                                                                <option value="BEP2">BEP2</option>
                                                                <option value="OMNI">OMNI</option>
                                                                <option value="TRC20">TRC20</option>
						                                	</select>
						                                	<br>
						                                    

						                                    <!-- Change this to a button or input when using this as a form -->
						                                    <button name="submit" type="submit" class="btn btn-lg btn-success btn-block">Update Wallets</button>
						                                    
						                                </fieldset>
						                            </form>
                                    

                                    <!-- /.modal -->
                                </div>
                                <!-- .panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3>Payment Details</h3>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Address</th>
                                                    <th>Currency</th>
                                                    <th>Network</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	
                                                <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <td><?= $user['btc']; ?></td>
                                                    <td>BTC</td>
                                                    <td><?= $user['btc_type']; ?></td>
                                                </tr>

                                                <tr class="odd gradeX">
                                                    <td>2</td>
                                                    <td><?= $user['eth']; ?></td>
                                                    <td>ETH</td>
                                                    <td><?= $user['eth_type']; ?></td>
                                                </tr>

                                                <tr class="odd gradeX">
                                                    <td>3</td>
                                                    <td><?= $user['trx']; ?></td>
                                                    <td>TRX</td>
                                                    <td><?= $user['trx_type']; ?></td>
                                                </tr>

                                                <tr class="odd gradeX">
                                                    <td>5</td>
                                                    <td><?= $user['ltc']; ?></td>
                                                    <td>LTC</td>
                                                    <td><?= $user['ltc_type']; ?></td>
                                                </tr>

                                                <tr class="odd gradeX">
                                                    <td>6</td>
                                                    <td><?= $user['doge']; ?></td>
                                                    <td>DOGE</td>
                                                    <td><?= $user['doge_type']; ?></td>
                                                </tr>

                                                <tr class="odd gradeX">
                                                    <td>7</td>
                                                    <td><?= $user['bnb']; ?></td>
                                                    <td>BNB</td>
                                                    <td><?= $user['bnb_type']; ?></td>
                                                </tr>

                                                <tr class="odd gradeX">
                                                    <td>8</td>
                                                    <td><?= $user['perfect_money']; ?></td>
                                                    <td>Perfect Money</td>
                                                </tr>

                                                <tr class="odd gradeX">
                                                    <td>9</td>
                                                    <td><?= $user['paypal']; ?></td>
                                                    <td>PayPal</td>
                                                </tr>

                                                
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