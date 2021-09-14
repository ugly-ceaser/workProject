<?php 
$title = "Referral";

require 'req/header.php';


$num_inv = num_inv($user_id);
if ($num_inv !== false) {
    $invs = $num_inv;
} else {$invs = 0;}

?>



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3>Downlines</h3>
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
                                                    <h4 style="font-weight: bolder;">Referral ID : <?= $user['ref_id'] ?></h4>
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
                                                    <td><?= $user['name']; ?></td>
                                                    <td><?= $user['email']; ?></td>
                                                    
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