<?php 
$title = "Articles";

require 'req/header.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] === "posted") {
        echo "<script>swal('Posted!', 'New Post Added Successfully!', 'success');</script>";
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
		                            <h2 class="panel-title" style="font-weight:bolder;">New Article</h2>
		                        </div>
                                <div class="panel-body">
                                	<?php
                                	if (isset($_GET['submit']) && !empty($_GET['title']) && !empty($_GET['body'])) {
                                		$post = add_article($_GET);
                                		// var_dump($post);
	                                	if ($post === true) {
	                                		header("Location: article?action=posted");
											exit();
	                                	}else{
	                                		header("Location: article?action=fail");
											exit();
	                                	}
                                	}

                                	 ?>
                                	<form role="form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="get">
                                                   	
						                                <fieldset>
						                                    <div class="form-group">
						                                    	<label>Title</label>
						                                        <input id="title" class="form-control" name="title" type="text" placeholder="Enter Article Title" autofocus>
						                                    </div>
						                                    <label>Body</label>
						                                    <textarea name="body" placeholder="Enter Article Body..." class="form-control" style="resize: none;" rows="12"></textarea>
						                                	<br>
						                                    

						                                    <!-- Change this to a button or input when using this as a form -->
						                                    <button name="submit" type="submit" class="btn btn-lg btn-success btn-block">Post Article</button>
						                                    
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
                                                    <th>Title</th>
                                                    <th>Body</th>
                                                    <th>Date</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	<?php 
                                            	$articles = fetch_all_articles();
                                            	if($articles){
                                            		$i = 0;
                                            		foreach ($articles as $article) {
                                            			$i++;

                                            	 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><?= $article['title']; ?></td>
                                                    <td><?= $article['body']; ?></td>
                                                    
                                                    <td class="center"><?= $article['date_posted']; ?></td>
                                                    <td class="center"><a href="delete?article_id=<?= $article['id']; ?>">Delete</a></td>
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