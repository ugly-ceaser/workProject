<?php
require_once 'inc/functions.inc.php';
require '../site_name.php';
// require_once '../email_file/mail-function.php';

// inv_cap=67&usd_bal=566&user_id=4
	// $inv_cap = $_GET['inv_cap'];
  $usd_bal = $_GET['usd_bal'];
	$user_id = $_GET['user_id'];
	
	
	global $link;
  $sql = "UPDATE users SET usd_bal = '$usd_bal' WHERE user_id = '$user_id'";
      $query = mysqli_query($link,$sql);
		if ($query) {
			   echo json_encode(array('usd_bal' => $usd_bal, 'success' => 1));
        
      } else {
        echo json_encode(array('user_id' => 'Not fOUND', 'success' => 0));
      }
 