<?php 
$title = "Profile";

require 'req/header.php';


$num_inv = num_inv($user_id);
if ($num_inv !== false) {
    $invs = $num_inv;
} else {$invs = 0;}

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
                                    <h4 style="font-weight: bolder;">Member ID : #<?= $user['acn'] ?></h4>
                                    <!-- <h4 style="font-weight: bolder;">Investment Capital : $<?= round(floatval($user['inv_cap']), 2) ?></h4> -->
                                    <h4 style="font-weight: bolder;">Balance : $<?= round(floatval($user['usd_bal']), 2) ?></h4>
                                    <h4 style="font-weight: bolder;">Plan : <?= $user['plan'] ?></h4>
                                    <h4 style="font-weight: bolder;">Referral ID : <?= $user['ref_id'] ?></h4>
                                    <p style="color: red;font-weight: bolder;">Refer your friends and Earn 2.5% on their every deposit</p>
                                    
                                </div>
                                <div class="panel-footer">
                                    Happy Investing!
                                </div>
                            </div>
                        </div>

                        
                    </div>





<?php require 'req/footer.php'; ?>