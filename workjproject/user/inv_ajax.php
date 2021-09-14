<?php
require_once 'inc/db.php';
// amt=500&plan=YELLOW&interest=7&days=3&user_id=4&inv_cap=3788350
	$amt = $_GET['amt'];
	$user_id = $_GET['user_id'];
	$plan = $_GET['plan'];
	$usd_bal = $_GET['usd_bal'];
	$interest = $_GET['interest'];
	$days = $_GET['days'];
	
	global $link;
	$type = "Investment";
	$status = "running";

		$sql = "INSERT INTO trans (user_id, usd_amt, plan, type, status, days, interest) VALUES ('$user_id', '$amt', '$plan', '$type', '$status', '$days', '$interest')";
		$query = mysqli_query($link, $sql);
		if ($query) {
			$usd_bal = $usd_bal - $amt;
			$sql2 = "UPDATE users SET usd_bal = '$usd_bal' WHERE user_id = '$user_id'";
			$query2 = mysqli_query($link,$sql2);
			if ($query2 === true) {
				echo json_encode(array('success' => 1));
				}else{
					echo json_encode(array('success' => 0));
				}
			}else{
					echo json_encode(array('success' => 0));
				}
			
		// echo json_encode(array('success' => 0));
	