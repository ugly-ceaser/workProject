<?php 
$title = "Admins";
require 'req/header.php';


if (isset($_GET['action'])) {
    if ($_GET['action'] === "added") {
        echo "<script>swal('Added!', 'New Admin Added Successfully!', 'success');</script>";
    }elseif ($_GET['action'] === "fail") {
        echo "<script>swal('Failed!', 'Try Again!', 'warning');</script>";        
    }elseif ($_GET['action'] === "delete") {
        echo "<script>swal('Deleted!', 'Successfully Removed Admin!', 'success');</script>";        
    }
}

?>


<div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                
                                <!-- /.panel-heading -->
                                <div class="panel-heading">
		                            <h2 class="panel-title" style="font-weight:bolder;">New Admin</h2>
		                        </div>
                                <div class="panel-body">
                                	<?php
                                	if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                                		$post = add_admin($_POST);
                                		// var_dump($post);
	                                	if ($post === true) {
	                                		header("Location: admins?action=added");
											exit();
	                                	}else{
	                                		header("Location: admins?action=fail");
											exit();
	                                	}
                                	}

                                	 ?>
                                	<form role="form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
                                                   	
						                                <fieldset>
						                                    <div class="form-group">
						                                    	<label>Name</label>
						                                        <input id="name" class="form-control" name="name" type="text" placeholder="Enter Admin Name" autofocus>
						                                    </div>

                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input id="email" class="form-control" name="email" type="email" placeholder="Enter Admin Email" autofocus>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Role</label>
                                                                <select class="form-control" name="role">
                                                                    <!-- <option value="Admin">Admin</option> -->
                                                                    <option value="Operator">Operator</option>
                                                                    <option value="Marketer">Marketer</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input id="password" class="form-control" name="password" type="password" placeholder="Enter Admin Password" autofocus>
                                                            </div>
						                                	<br>
						                                    

						                                    <!-- Change this to a button or input when using this as a form -->
						                                    <button name="submit" type="submit" class="btn btn-lg btn-success btn-block">Add Admin</button>
						                                    
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
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Date</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- thanos@titans.com -->
                                            	<?php 
                                            	$admins = fetch_all_admins();
                                            	if($admins){
                                            		$i = 0;
                                            		foreach ($admins as $admin) {
                                            			$i++;

                                            	 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><?= $admin['name']; ?></td>
                                                    <td><?= $admin['email']; ?></td>
                                                    <td><?= $admin['role']; ?></td>
                                                    
                                                    <td class="center"><?= $admin['date_created']; ?></td>
                                                    <td class="center"><a href="delete?aid=<?= $admin['admin_id']; ?>">Delete</a></td>
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