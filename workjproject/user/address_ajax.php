<?php
require_once 'inc/db.php';

	$addr = $_GET['currency'];
	$addr = strtolower($addr);
	$type = $addr . "_type";
	global $link;
	if ($addr != null) {
		$sql = "SELECT * FROM admin WHERE admin_id = 7";
		$query = mysqli_query($link, $sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
				if ($addr == "perfect_money") {
					$row[$type] = "paypal";
				}elseif ($addr == "paypal") {
					$row[$type] = "PayPal";
				}
				echo json_encode(array('addr' => $row[$addr], 'type' => $row[$type], 'success' => 1));
				
		}else{
			echo json_encode(array('name' => 'Not fOUND', 'success' => 0));
		}
		// echo json_encode(array('success' => 0));
	}
	// echo json_encode(array('success' => 0));

// $acn = $_GET['acn'];
// 	global $link;
// 	if ($acn != null) {
// 		$sql = "SELECT * FROM users WHERE acn = '$acn'";
// 		$query = mysqli_query($link, $sql);
// 		if (mysqli_num_rows($query) > 0) {
// 			$row = mysqli_fetch_array($query);
// 			echo json_encode(array('name' => $row['name'], 'success' => 1));
// 		}
// 	}
