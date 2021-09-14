<?php 
ob_start();
session_start();
require_once 'db.php';
require_once '../email_file/mail-function.php';

// Helper Functions


function sanitize($input)
{
	global $link;
	$input = htmlentities(strip_tags(trim($input)));
	$input = mysqli_real_escape_string($link, $input);
	return $input;
}

function GetIP() 
{
    if ( getenv("HTTP_CLIENT_IP") ) {
        $ip = getenv("HTTP_CLIENT_IP");
    } elseif ( getenv("HTTP_X_FORWARDED_FOR") ) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        if ( strstr($ip, ',') ) {
            $tmp = explode(',', $ip);
            $ip = trim($tmp[0]);
        }
    } else {
        $ip = getenv("REMOTE_ADDR");
    }
    return $ip;
}

function record_views($ip, $post_id){
	global $link;
	$sql = "INSERT INTO views(article_id, ip) VALUES('$post_id', '$ip')";
	$query = mysqli_query($link, $sql);
	if ($query) {
		return true;
	}
}

function sanitize_email($email){
	global $link;
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	if ($email) {
		$email = mysqli_real_escape_string($link, $email);
		return $email;
	} return false;
}


function upload_image($file, &$errors){
	$size = $file['size'];
	$type = $file['type']; 
	$tmp_location = $file['tmp_name'];

// 	if ($size > 512000) {
// 		$errors[] = "Profile picture is too large.";
// 		return false;
// 	}

	$allowed_extensions = array("jpg", 'jpeg', 'png', 'gif');
	$file_ext = explode('/', $type);
	$image_ext = strtolower(end($file_ext));
	if (!in_array($image_ext, $allowed_extensions)) {
		$errors[] = "File type not allowed";
		return false;
	}

	$upload_dir = "uploads/";
	$image_name = hash("sha256", uniqid());
	$image_path = $upload_dir . $image_name . '.' . $image_ext;

	if (move_uploaded_file($tmp_location, $image_path)) {
		return $image_path;
	} 

	$errors[] = "Sorry, image upload failed!";
	return false;
}

function upload_public_image($file, &$errors){
	$size = $file['size'];
	$type = $file['type']; 
	$tmp_location = $file['tmp_name'];

// 	if ($size > 512000) {
// 		$errors[] = "Profile picture is too large.";
// 		return false;
// 	}

	$allowed_extensions = array("jpg", 'jpeg', 'png', 'gif');
	$file_ext = explode('/', $type);
	$image_ext = strtolower(end($file_ext));
	if (!in_array($image_ext, $allowed_extensions)) {
		$errors[] = "File type not allowed";
		return false;
	}

	$upload_dir = "uploads/";
	$image_name = hash("sha256", uniqid());
	$image_path = $upload_dir . $image_name . '.' . $image_ext;

	if (move_uploaded_file($tmp_location, $image_path)) {
		return $image_path;
	} 

	$errors[] = "Sorry, image upload failed!";
	return false;
}

function check_duplicate($table, $field, $data)
{
	global $link;
	$sql = "SELECT $field FROM $table WHERE $field = '$data'";
	$query = mysqli_query($link, $sql);
	if (mysqli_num_rows($query) > 0) {
		return true;
	} 
	return false;
}

function verify_user_password($email, $plain_pw)
{
	global $link;
	$sql = "SELECT user_id, password  FROM users WHERE email = '$email'";
	$query = mysqli_query($link, $sql);
	if (mysqli_num_rows($query) > 0) {
		$row = mysqli_fetch_array($query);
		$hashed_password = $row['password'];
		$user_id = $row['user_id'];
		if (password_verify($plain_pw, $hashed_password)) {
			$_SESSION['id'] = $user_id;
			return true;
		} return false;
	} return false;
}


// Helper Functions End

function register_user($post)
{
	global $link;
	$err_flag = false;
	$errors = [];
// 	return var_dump($file);
	extract($post);

	if (!empty($fname) && !empty($lname)) {
		$name = $fname . " ". $lname;
		$name = sanitize($name);
	} else{
		$errors[] = "Enter user name";
		$err_flag = true;
	}
	
	if (!empty($ref)) {
		$ref = sanitize($ref);
	} else{
		$ref = "";
	}

	if (!empty($email)) {
		if (sanitize_email($email)) {
			$tmp = sanitize_email($email);
			if (!check_duplicate("users", "email", $tmp)) {
				$email = $tmp;
			} else {
				$errors[] = "A user already registered with that email";
				$err_flag = true;	
			}
		} else {
			$errors[] = "Enter a valid email address";
			$err_flag = true;
		}
	} else {
			$errors[] = "Enter an email address";
			$err_flag = true;
	  }

	if (!empty($password)) {
		$password = sanitize($password);
		$password = password_hash($password, PASSWORD_DEFAULT);
		//$password = $passwords;
	} else{
		$errors[] = "Please enter your password";
		$err_flag = true;
	}

	if($err_flag === false){
		$text = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$ref_id = substr(str_shuffle($text), 0, 5);
		$act_code = substr(str_shuffle($text), 0, 6);
		$activated = 0;
		$acn_init = random_int(10, 37);
		$acn_end = random_int(10000001, 99999999);
		$acn = $acn_init . $acn_end;
		$sql = "INSERT INTO users (name, email, gender, plan, acn, password, ref_id, referrer, activated, act_code) VALUES ('$name', '$email', '$gender', '$plan', '$acn', '$password', '$ref_id', '$ref', '$activated', '$act_code')";
			$query = mysqli_query($link, $sql);
			if ($query) {
				return $act_code;
			} else {
				return false;
				
			}
		}  return false;

}

function login_user($post)
{
	global $link;
	$err_flag = false;
	$errors = [];

	if (!empty($post['email'])) {
		$tmp = sanitize_email($post['email']);
		if ($tmp) {
			$email = $tmp;
		} else{
			$err_flag = true;
			$errors[] = "Please enter a valid email address";
		}
	} else{
		$err_flag = true;
			$errors[] = "Please enter an email address";
	}

	if (!empty($post['password'])) {
		$password = sanitize($post['password']);
	} else{
		$err_flag = true;
		$errors[] = "Please enter your password";
	}
	if (!empty($post['remember'])) {
		$rem = $post['remember'];
		$time = time()+3600*24;
		setcookie("email","$email","$time");
	}else{
		setcookie('email','');
	}

	if ($err_flag === false) {
		if (verify_user_password($email, $password)) {
			return true;
		} else {
			$errors[] = "Access denied";
			return $errors;
		}
	} return $errors;
}

function fetch_user($user_id = null)
{
	global $link;
	if ($user_id != null) {
		$sql = "SELECT * FROM users WHERE user_id = '$user_id' ";
		$query = mysqli_query($link, $sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			return $row;
		}return false;
	}return false;
}

function fetch_userBy_actc($actc = null)
{
	global $link;
	if ($actc != null) {
		$sql = "SELECT * FROM users WHERE act_code = '$actc' ";
		$query = mysqli_query($link, $sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			return $row;
		}return false;
	}return false;
}

function deposits($user_id){

	global $link;
	$status = "approved";
	$type = "Deposit";
	$sql = "SELECT * FROM trans WHERE user_id = '$user_id' AND status = '$status' AND type = '$type'";
	$query = mysqli_query($link, $sql);
	if (mysqli_num_rows($query) > 0) {
		$dep = 0;
	while ($row = mysqli_fetch_assoc($query)) {
			$dep += $row['usd_amt'];
		}return $dep;
	} else{
		return false;
	}

}

function profits($user_id){

	global $link;
	$status = "pending";
	$type = "Deposit";
	$sql = "SELECT * FROM profit WHERE user_id = '$user_id'  AND status = '$status'";
	$query = mysqli_query($link, $sql);
	if ($query) {
		if (mysqli_num_rows($query) > 0) {
			$dep = 0;
		while ($row = mysqli_fetch_assoc($query)) {
				$dep += $row['amount'];
			}return $dep;
		} else{
			return false;
		}
		
	}

}

function roi($user_id){

	global $link;
	$status = "pending";
	$type = "Deposit";
	$sql = "SELECT * FROM profit WHERE user_id = '$user_id' AND status = '$status' ORDER BY id DESC LIMIT 1";
	$query = mysqli_query($link, $sql);
	if ($query) {
		if (mysqli_num_rows($query) > 0) {
			$dep = 0;
		while ($row = mysqli_fetch_assoc($query)) {
				$dep += $row['amount'];
			}return $dep;
		} else{
			return false;
		}
		
	}

}

function fetch_admin_wallet_address($admin_id = null)
{
	global $link;
	if ($admin_id != null) {
		$sql = "SELECT * FROM admin WHERE admin_id = '$admin_id' ";
		$query = mysqli_query($link, $sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			return $row;
		}return false;
	}return false;
}

function num_inv($user_id){

	global $link;
	$type = "Investment";
	$status = "running";
	$sql = "SELECT * FROM trans WHERE user_id = '$user_id' AND type = '$type' AND status = '$status'";
	$query = mysqli_query($link, $sql);
	if(mysqli_num_rows($query) > 0){
		if ($query) {
			$num = mysqli_num_rows($query);
			return $num;
		} else{
			return 0;
		}
	}return 0;

}

function depositV($post, $user_id)
{
	global $link;
	$err_flag = false;
	$errors = [];
// 	return var_dump($file);
	extract($post);

	if (!empty($amt)) {
		$amt = sanitize($amt);
	} else{
		$err_flag = true;
	}

	if (!empty($t_id)) {
		$t_id = sanitize($t_id);
	} else{
		$err_flag = true;
	}

	if (!empty($currency)) {
		$currency = sanitize($currency);
	} else{
		$err_flag = true;
	}

	

	if($err_flag === false){
		$status = "pending";
		$sql = "INSERT INTO trans (user_id, usd_amt, currency, trans_id, status) VALUES ('$user_id', '$amt', '$currency', '$t_id', '$status')";
		
			$query = mysqli_query($link, $sql);
			if ($query) {
				return true;
			} else {
				return false;
				
			}
		}  return false;

}

function fetch_all_transactions_by_Id($user_id){
	global $link;
	// $status = "Completed";
	// $sql = "SELECT * FROM transactions WHERE user_id = '$user_id' AND status = '$status' ORDER BY date_ordered DESC";
	$sql = "SELECT * FROM trans WHERE user_id = '$user_id' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function fetch_all_investments_by_Id($user_id){
	global $link;
	$type = "Investment";
	$sql = "SELECT * FROM trans WHERE user_id = '$user_id' AND type = '$type' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}



function fetch_all_pending_by_Id($user_id){
	global $link;
	$status = "pending";
	$sql = "SELECT * FROM trans WHERE user_id = '$user_id' AND status = '$status' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query)) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function fetch_all_deposits_by_Id($user_id){
	global $link;
	$status = "pending";
	$type = "Deposit";
	$sql = "SELECT * FROM trans WHERE user_id = '$user_id' AND type = '$type' AND status != '$status' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
	}return false;
}

function fetch_all_withdrawal_by_Id($user_id){
	global $link;
	$status = "pending";
	$type = "Withdrawal";
	$sql = "SELECT * FROM trans WHERE user_id = '$user_id' AND type = '$type' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function withdraw($post, $user_id)
{
	global $link;
	$err_flag = false;
	$errors = array();
	$plan = "Null";
	$type = "Withdrawal";
	$status = "requested";
	extract($post);

	if (!empty($amt)) {
			$amount = $amt;
		
	}

	if (!empty($currency)) {
			$currency = $currency;
			if (($currency == "perfect_money") OR ($currency == "Perfect_Money")) {
				$currency = "Perfect Money";
			}
		
	}

	if (!empty($account)) {
			$account = $account;
		
	}

	
	if ($err_flag !== true) {
		
		$sql = "INSERT INTO trans (user_id, usd_amt, currency, account, plan, type, status) VALUES ('$user_id', '$amount', '$currency', '$account', '$plan', '$type', '$status')";
		
		$query = mysqli_query($link,$sql);
		if($query){
			return true;
		} else{
			return false;
		}
	} return $errors;
}

function confirm_wdrl($user_id)
{
	global $link;
	$status = "pending";
	$type = "Withdrawal";
	$sql = "UPDATE trans SET status = '$status' WHERE type = '$type' AND user_id = '$user_id'";
	$query = mysqli_query($link, $sql);
	if ($query) {
		return true;
	}else{
		return false;
	}
}

function invest($amt, $user_id, $plan, $bal){
	global $link;
	$err_flag = false;
	$errors = array();
	$type = "Investment";
	$status = "running";
	// extract($get);

	if (!empty($amt)) {
			$amt = $amt;
		
	}
	
	if ($err_flag !== true) {
		
		$sql = "INSERT INTO trans (user_id, usd_amt, plan, type, status) VALUES ('$user_id', '$amt', '$plan', '$type', '$status')";
		
		$query = mysqli_query($link,$sql);
		if($query){
			$bal = $bal - $amt;
			$sql2 = "UPDATE users SET usd_bal = '$bal' WHERE user_id = '$user_id'";
			$query = mysqli_query($link,$sql2);
			if ($query) {
				return true;
				
			}
		} else{
			$errors['query'] = mysqli_error($query);
			return $errors;
		}
	} return $errors;
}

function set_wallet($post, $user_id){
	global $link;
	$err_flag = false;
	$errors = array();
	extract($post);

	if (!empty($wallet)) {
			$wallet = sanitize($wallet);
		
	}else{
		$err_flag = true;
	}

	if (!empty($currency)) {
			$currency = strtolower($currency);
			$type = $currency . "_type";
	}

	if (!empty($network)) {
			$network = sanitize($network);
	}

	
	if ($err_flag !== true) {
		if ($currency === "perfect_money") {
			$sql = "UPDATE users SET $currency = '$wallet' WHERE user_id = '$user_id'";
			$query = mysqli_query($link,$sql);
			if($query){
				return true;
			} else{
				// $errors['query'] = mysqli_error($query);
				return false;
			}
		}elseif ($currency === "paypal") {
			$sql = "UPDATE users SET $currency = '$wallet' WHERE user_id = '$user_id'";
			$query = mysqli_query($link,$sql);
			if($query){
				return true;
			} else{
				// $errors['query'] = mysqli_error($query);
				return false;
			}
		}else{
			$sql = "UPDATE users SET $currency = '$wallet', $type = '$network' WHERE user_id = '$user_id'";
			$query = mysqli_query($link,$sql);
			if($query){
				return true;
			} else{
				// $errors['query'] = mysqli_error($query);
				return false;
			}
		}
		
		
	} return false;
}

function fetch_all_articles(){
	global $link;
	$sql = "SELECT * FROM article ORDER BY date_posted DESC LIMIT 8";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function fetch_all_transfers_by_Id($user_id, $acn){
	global $link;
	$status = "sent";
	$type = "Transfer";
	$sql = "SELECT * FROM trans WHERE type = '$type' AND user_id = '$user_id' OR r_acn = '$acn' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function getUserByAcn($acn = null)
{
	global $link;
	if ($acn != null) {
		$sql = "SELECT * FROM users WHERE acn = '$acn' ";
		$query = mysqli_query($link, $sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			return $row;
		}return false;
	}return false;
}

function transfer($post, $user_id)
{
	global $link;
	$err_flag = false;
	$errors = array();
	$plan = "Null";
	$type = "Transfer";
	$status = "sending";
	extract($post);

	if (!empty($amt)) {
			$amount = $amt;
		
	}

	if (!empty($acn)) {
			$acn = $acn;
		
	}

	
	if ($err_flag !== true) {
		$init = "trx";
		$text = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$mid = substr(str_shuffle($text), 0, 5);
		$end = random_int(1000000, 9000001);
		$trans_id = $init . $mid . "/" . "TO/" . $acn . "/" . $end;
		$sql = "INSERT INTO trans (user_id, r_acn, usd_amt, trans_id, type, status) VALUES ('$user_id', '$acn', '$amount', '$trans_id', '$type', '$status')";
		$query = mysqli_query($link,$sql);
		if($query){
			return true;
		} else{
			return false;
		}
	} return false;
}

function reset_password($get){
	global $link;
	$err_flag = false;
	$errors = array();
	extract($get);

	if (!empty($email)) {
			$email = sanitize($email);
		
	}

	if (!empty($password1) && ($password1 === $password2)) {
			$password = sanitize($password1);
			$password = password_hash($password, PASSWORD_DEFAULT);
	}

	
	if ($err_flag !== true) {
		
		$sql = "UPDATE users SET password = '$password' WHERE email = '$email'";
		
		$query = mysqli_query($link,$sql);
		if($query){
			return true;
		} else{
			$errors['query'] = mysqli_error($query);
			return $errors;
		}
	} return $errors;
}

function fetch_all_profits($user_id){
	global $link;
	$sql = "SELECT * FROM profit WHERE user_id = '$user_id' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function fetch_all_roi($user_id){
	global $link;
	$status = "pending";
	$sql = "SELECT * FROM profit WHERE status = '$status' AND user_id = '$user_id' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function fetch_all_downlines($ref_id){
	global $link;
	$sql = "SELECT * FROM users WHERE referrer = '$ref_id' ORDER BY date_created DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}