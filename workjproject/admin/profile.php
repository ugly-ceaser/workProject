<?php 
$title = "All Users";

require 'req/header.php';


if (isset($_GET['user_id'])) {

    $user_id = $_GET['user_id'];
    $user = fetch_user($user_id);

    $num_inv = num_inv($user_id);
    if ($num_inv !== false) {
        $invs = $num_inv;
    } else {
        $invs = 0;
    }

    $last_currency = fetch_user_last_currency($user_id);


?>




					<div class="row">
                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                            	<br>
                                <div class="icon">
                                    <?php if ($user['gender'] === "Male") {
                                        $icon = "glyphicon glyphicon-user";
                                    }elseif ($user['gender'] === "Female") {
                                        $icon = "fa fa-female";
                                    } ?>
                                    <i class="<?= $icon ?>"></i>
                                </div>
                                <div class="text">
                                	<br>
                                    <label class="text-muted"><?= $user['name'] ?></label>
                                </div>
                                <div class="options">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    User Information
                                </div>
                                <div class="panel-body">
                                    <h4 style="font-weight: bolder;">Name : <?= $user['name'] ?></h4>
                                    <h4 style="font-weight: bolder;">Email : <?= $user['email'] ?></h4>
                                    <h4 style="font-weight: bolder;">Gender : <?= $user['gender'] ?></h4>
                                    <?php 
                                        if ($user['activated'] == 2) {
                                            $act_status = "Active";
                                            $color = "#44ee00";
                                            $button = "Deactivate";
                                        }else{
                                            $act_status = "Pending";
                                            $color = "red";
                                            $button = "Activate";

                                        }
                                    ?>
                                    <h4 style="font-weight: bolder;">Status : <i class="fa fa-circle" style="color: <?= $color ?>;"></i> <?= $act_status ?></h4>
                                    <a onclick="changeStatus(<?= $user_id ?>)" class="btn btn-lg btn-primary"><?= $button ?></a>
                                    <script type="text/javascript">
                                        function changeStatus(user_id) {
                                            
                                            // swal(`${inv_cap}`, 'Code!', 'success');
                                            $.ajax(`status_ajax.php?user_id=${user_id}`,
                                                {
                                                success : function(data){
                                                            let jData = JSON.parse(data);
                                                            if (jData.success == 1) {
                                                                window.location.href = window.location.href;
                                                            }else{
                                                                swal('Failed!', 'Process Failed!', 'success');
                                                        }
                                                        
                                                                               
                                                        },
                                                error : function(){
                                                        swal('Failed!', 'Link Failed!', 'success');
                                                        }
                                            });

                                        }
                                    </script>

                                    <h4 style="font-weight: bolder;">Member ID : #<?= $user['acn'] ?></h4>
                                    <h4 style="font-weight: bolder;">Plan : <?= $user['plan'] ?></h4>
                                    <h4 style="font-weight: bolder;">Profit Balance : $<?= floatval($user['usd_bal']) ?></h4>
                                    <h3 style="font-weight: bolder;">Change Balance : </h3>
                                    <input class="form-control" type="number" id="usd_bal" placeholder="" value="<?= $user['usd_bal'] ?>"><br>
                                    <!-- <label>Balance :  </label><input class="form-control" type="number" id="usd_bal" placeholder="Balance"><br> -->
                                    <a onclick="updateBalance(document.getElementById('usd_bal').value, <?= $user_id ?>)" class="btn btn-lg btn-primary">Update Balance</a>
                                    <script type="text/javascript">
                                        function updateBalance(usd_bal, user_id) {
                                            
                                            // swal(`${usd_bal}`, 'Code!', 'success');
                                            $.ajax(`profile_ajax.php?usd_bal=${usd_bal}&user_id=${user_id}`,
                                                {
                                                success : function(data){
                                                            let jData = JSON.parse(data);
                                                            if (jData.success == 1) {
                                                                window.location.href = window.location.href;
                                                            }else{
                                                                swal('Failed!', 'Process Failed!', 'success');
                                                        }
                                                        
                                                                               
                                                        },
                                                error : function(){
                                                        swal('Failed!', 'Link Failed!', 'success');
                                                        }
                                            });

                                        }

                                    function removeFund(inv_cap, user_id) {
                                        
                                        // swal(`${inv_cap}`, 'Code!', 'success');
                                        $.ajax(`remove_ajax.php?inv_cap=${inv_cap}&user_id=${user_id}`,
                                            {
                                            success : function(data){
                                                        let jData = JSON.parse(data);
                                                        if (jData.success == 1) {
                                                            swal('Successful!', 'Rectification Completed!', 'success');
                                                        }else{
                                                            swal('Failed!', 'Process Failed!', 'success')
                                                    }
                                                    
                                                                           
                                                    },
                                            error : function(){
                                                    swal('Failed!', 'Link Failed!', 'success')
                                                    }
                                        });

                                    }
                                    </script>
                                    <?php if (!empty($user['btc'])) {
                                        
                                     ?>
                                    <h4 style="font-weight: bolder;">BTC Wallet Address(<?= $user['btc_type'] ?>) : <?= $user['btc'] ?></h4>
                                <?php } ?>
                                    <?php if (!empty($user['eth'])) {
                                        
                                     ?>
                                    <h4 style="font-weight: bolder;">ETH Wallet Address(<?= $user['eth_type'] ?>) : <?= $user['eth'] ?></h4>
                                    <?php } ?>
                                    <?php if (!empty($user['trx'])) {
                                        
                                     ?>
                                    <h4 style="font-weight: bolder;">TRX Wallet Address(<?= $user['trx_type'] ?>) : <?= $user['trx'] ?></h4>
                                    <?php } ?>
                                    <?php if (!empty($user['ada'])) {
                                        
                                     ?>
                                    <h4 style="font-weight: bolder;">ADA Wallet Address(<?= $user['ada_type'] ?>) : <?= $user['ada'] ?></h4>
                                    <?php } ?>
                                    <h4 style="font-weight: bolder;">Referral ID : <?= $user['ref_id'] ?></h4>
                                </div>
                                
                            </div>
                        </div>

                        
                    </div>



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Downlines
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Balance</th>
                                                    
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                                $all_Users = fetch_all_downlines($user['ref_id']);
                                                if($all_Users){
                                                    $i = 0;
                                                    foreach ($all_Users as $user) {
                                                        $i++;

                                                 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><a href="?user_id=<?= $user['user_id'] ?>"><?= $user['name']; ?></a></td>
                                                    <td><?= $user['email']; ?></td>
                                                    <td class="center">$<?= floatval($user['usd_bal']); ?></td>
                                                    
                                                    <td style="width: 100%" class="center btn btn-danger"><a href="delete.php?user_id=<?= $user['user_id']; ?>" style="font-weight: bolder; text-decoration: none;">Delete</a></td>
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

<?php 
}else{

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
                                <div class="panel-heading">
                                    All Users
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Balance</th>
                                                    
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                                $all_Users = fetch_all_users();
                                                if($all_Users){
                                                    $i = 0;
                                                    foreach ($all_Users as $user) {
                                                        $i++;

                                                 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><a href="?user_id=<?= $user['user_id'] ?>"><?= $user['name']; ?></a></td>
                                                    <td><?= $user['email']; ?></td>
                                                    <td class="center">$<?= number_format($user['usd_bal']); ?></td>
                                                    
                                                    <td style="width: 100%" class="center btn btn-danger"><a href="delete.php?user_id=<?= $user['user_id']; ?>" style="font-weight: bolder; text-decoration: none;">Delete</a></td>
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



<?php

}
require 'req/footer.php'; ?>