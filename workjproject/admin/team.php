<?php 
$title = "Team";

require 'req/header.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] === "added") {
        echo "<script>swal('Added!', 'New Member Added Successfully!', 'success');</script>";
    }elseif ($_GET['action'] === "fail") {
        echo "<script>swal('Failed!', 'Try Again!', 'warning');</script>";        
    }elseif ($_GET['action'] === "delete") {
        echo "<script>swal('Deleted!', 'Successfully Removed!', 'success');</script>";        
    }
}

?>


<div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                
                                <!-- /.panel-heading -->
                                <div class="panel-heading">
		                            <h2 class="panel-title" style="font-weight:bolder;">New Member</h2>
		                        </div>
                                <div class="panel-body">
                                	<?php
                                	if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['bio'])) {
                                		$member = add_member($_POST, $_FILES['picture']);
                                		// var_dump($member);
	                                	if ($member === true) {
	                                		header("Location: team?action=added");
											exit();
	                                	}else{
	                                		header("Location: team?action=fail");
											exit();
	                                	}
                                	}

                                	 ?>
                                	<form role="form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                                                   	
						                                <fieldset>
						                                    <div class="form-group">
						                                    	<label>Name</label>
						                                        <input id="name" class="form-control" name="name" type="text" placeholder="Enter Member Name" autofocus>
						                                    </div>
                                                            <div class="form-group">
                                                                <label>Position/Role</label>
                                                                <input id="role" class="form-control" name="role" type="text" placeholder="Enter Member Position/Role" autofocus>
                                                            </div>
                                                            <div>
                                                                <label>Member Image</label>
                                                                <input type="file" name="picture" id="picture" class="form-control">
                                                            </div>
                                                            <br>
						                                    <label>Bio</label>
						                                    <textarea name="bio" placeholder="Member Bio..." class="form-control" style="resize: none;" rows="12"></textarea>
						                                	<br>
						                                    

						                                    <!-- Change this to a button or input when using this as a form -->
						                                    <button name="submit" type="submit" class="btn btn-lg btn-success btn-block">Add Member</button>
						                                    
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
                                                    <th>Position</th>
                                                    <th>Image</th>
                                                    <th>Bio</th>
                                                    <th>Date</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	<?php 
                                            	$members = fetch_all_team();
                                                if (!empty($members)) {
                                                    $i = 0;
                                                    foreach ($members as $member) {
                                            			$i++;

                                            	 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><?= $member['name']; ?></td>
                                                    <td><?= $member['position']; ?></td>
                                                    <td><img style="width: 50px; height: 50px" src="<?= $member['img']; ?>"></td>
                                                    <td><?= $member['bio']; ?></td>
                                                    
                                                    <td class="center"><?= $member['date']; ?></td>
                                                    <td class="center"><a href="delete?member_id=<?= $member['id']; ?>">Delete</a></td>
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