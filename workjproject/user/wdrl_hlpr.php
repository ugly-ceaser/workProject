<?php 
if (!empty($_GET['user_id'])) {
	$user_id = $_GET['user_id'];

$title = "Withdrawal Processing";

require 'req/header.php';

 ?>



					<div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                	<?php
                                	if (isset($_POST['submit'])) {
                                		if ($_POST['pin'] === $user['act_code']) {
                                			$confirm = confirm_wdrl($user_id);
                            				if ($confirm === true) {
                            					echo "<script>window.location.href = 'wdrl?status=success'</script>";
                            				}else{
			                                    echo "<script>swal('Failed!', 'Try Again!', 'warning');</script>";
			                                }

                                		}else{
                                                echo "<script>swal('Wrong Code!', 'Try Again!', 'warning');</script>";
                                            }
                                		
                                	}
                                	 ?>
                                	<form role="form" action="" method="post">
                                		<div id="pinPack" class="form-group">
                                            <label>Confirmation Code</label>
                                            <input id="pin" class="form-control" name="pin" type="number">
                                            <p style="color: red; font-weight: bolder;">Enter the Confirmation code sent to your email</p>
                                            <br>

                                            <button name="submit" type="submit" class="btn btn-lg btn-success btn-block">Confirm Withdrawal</button>

                                        </div>
                                	</form>
                                </div>
                            </div>
                        </div>
                    </div>





 <?php 
require 'req/footer.php';

}else{
	header("Location: wdrl");
}
 ?>