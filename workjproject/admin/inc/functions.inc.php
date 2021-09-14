<?php 
ob_start();
session_start();
require_once '../user/inc/db.php';

function sanitize_email($email){
	global $link;
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	if ($email) {
		$email = mysqli_real_escape_string($link, $email);
		return $email;
	} return false;
}

function sanitize($input)
{
	global $link;
	$input = htmlentities(strip_tags(trim($input)));
	$input = mysqli_real_escape_string($link, $input);
	return $input;
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

function login_admin($post)
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
		if (verify_admin_password($email, $password)) {
			return true;
		} else {
			$errors[] = "Access denied";
			return $errors;
		}
	} return $errors;
}

function verify_admin_password($email, $plain_pw)
{
	global $link;
	$sql = "SELECT admin_id, password, role  FROM admin WHERE email = '$email'";
	$query = mysqli_query($link, $sql);
	if (mysqli_num_rows($query) > 0) {
		$row = mysqli_fetch_array($query);
		$hashed_password = $row['password'];
		$admin_id = $row['admin_id'];
		$role = $row['role'];
		if (password_verify($plain_pw, $hashed_password)) {
			$_SESSION['admin-id'] = $admin_id;
			return true;
		} return false;
	} return false;
}

function fetch_admin_user($admin_id = null)
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

function total_users(){

	global $link;
	$sql = "SELECT * FROM users";
	$query = mysqli_query($link, $sql);
	if(mysqli_num_rows($query) > 0){
	if ($query) {
		$num = mysqli_num_rows($query);
		return $num;
	} else{
		return false;
	}
		}

}

function total_deposits(){

	global $link;
	$type = "Deposit";
	$status = "approved";
	$sql = "SELECT * FROM trans WHERE type = '$type' AND status = '$status'";
	$query = mysqli_query($link, $sql);
	if(mysqli_num_rows($query) > 0){
	if ($query) {
		$num = mysqli_num_rows($query);
		return $num;
	} else{
		return false;
	}
		}return false;

}

function active_inv(){

	global $link;
	$type = "Investment";
	$status = "running";
	$sql = "SELECT * FROM trans WHERE type = '$type' AND status = '$status'";
	$query = mysqli_query($link, $sql);
	if(mysqli_num_rows($query) > 0){
	if ($query) {
		$num = mysqli_num_rows($query);
		return $num;
	} else{
		return false;
	}
		}return false;

}

function withdrawals(){

	global $link;
	$type = "Withdrawal";
	$status = "approved";
	$sql = "SELECT * FROM trans WHERE type = '$type' AND status = '$status'";
	$query = mysqli_query($link, $sql);
	if(mysqli_num_rows($query) > 0){
	if ($query) {
		$num = mysqli_num_rows($query);
		return $num;
	} else{
		return false;
	}
		}return false;

}

function fetch_all_deposits(){
	global $link;
	// $status = "pending";
	$type = "Deposit";
	$sql = "SELECT * FROM trans WHERE type = '$type' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
	}return false;
}

function getUserById($id){
	global $link;
	$sql = "SELECT * FROM users WHERE user_id = '$id'";
	$query = mysqli_query($link, $sql);
	if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			return $row['name'];
		}return false;
}

function getUserBalance($id){
	global $link;
	$sql = "SELECT * FROM users WHERE user_id = '$id'";
	$query = mysqli_query($link, $sql);
	if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			return $row['usd_bal'];
		}return false;
}

function getUserInvBalance($id){
	global $link;
	$sql = "SELECT * FROM users WHERE user_id = '$id'";
	$query = mysqli_query($link, $sql);
	if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			return $row['usd_bal'];
		}return false;
}

function fetch_all_pending(){
	global $link;
	$status = "pending";
	$sql = "SELECT * FROM trans WHERE status = '$status' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query)) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function fetch_all_transfer(){
	global $link;
	$status = "sending";
	$sql = "SELECT * FROM trans WHERE status = '$status' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query)) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function fetch_all_withdrawal(){
	global $link;
	$status = "pending";
	$type = "Withdrawal";
	$sql = "SELECT * FROM trans WHERE type = '$type' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query)) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function fetch_all_investments(){
	global $link;
	$status = "running";
	$type = "Investment";
	$sql = "SELECT * FROM trans WHERE type = '$type' AND status = '$status' ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function fetch_all_transactions(){
	global $link;
	// $status = "Completed";
	$sql = "SELECT * FROM trans ORDER BY date DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function set_wallet($post, $admin_id){
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
			$sql = "UPDATE admin SET $currency = '$wallet' WHERE admin_id = '$admin_id'";
			$query = mysqli_query($link,$sql);
			if($query){
				return true;
			} else{
				// $errors['query'] = mysqli_error($query);
				return false;
			}
		}elseif ($currency === "paypal") {
			$sql = "UPDATE admin SET $currency = '$wallet' WHERE admin_id = '$admin_id'";
			$query = mysqli_query($link,$sql);
			if($query){
				return true;
			} else{
				// $errors['query'] = mysqli_error($query);
				return false;
			}
		}else{
			$sql = "UPDATE admin SET $currency = '$wallet', $type = '$network' WHERE admin_id = '$admin_id'";
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

function num_inv($user_id){

	global $link;
	$type = "Investment";
	$sql = "SELECT * FROM trans WHERE user_id = '$user_id' AND type = '$type'";
	$query = mysqli_query($link, $sql);
	if(mysqli_num_rows($query) > 0){
	if ($query) {
		$num = mysqli_num_rows($query);
		return $num;
	} else{
		return false;
	}
		}

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

function fetch_userBy_acn($acn = null)
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

function fetch_user_last_currency($user_id = null)
{
	global $link;
	if ($user_id != null) {
		$sql = "SELECT * FROM `trans` WHERE user_id = '$user_id' ORDER BY `t_id` DESC LIMIT 1";
		$query = mysqli_query($link, $sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			return $row['currency'];
		}return false;
	}return false;
}

function fetch_user_last_id($user_id = null)
{
	global $link;
	if ($user_id != null) {
		$sql = "SELECT * FROM `trans` WHERE user_id = '$user_id' ORDER BY `t_id` DESC LIMIT 1";
		$query = mysqli_query($link, $sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			return $row['t_id'];
		}return false;
	}return false;
}

function fetch_all_users(){
	global $link;
	$sql = "SELECT * FROM users ORDER BY date_created DESC";
	$query = mysqli_query($link, $sql);
	if($query){
		while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
		}return $inv;
	}return $inv;
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

function fetch_trans($t_id = null)
{
	global $link;
	if ($t_id != null) {
		$sql = "SELECT * FROM trans WHERE t_id = '$t_id' ";
		$query = mysqli_query($link, $sql);
		if (mysqli_num_rows($query) > 0) {
			$row = mysqli_fetch_array($query);
			return $row;
		}return false;
	}return false;
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

function add_member($post, $file = null)
 {
 	global $link;
	$err_flag = false;
	$errors = array();

	if (!empty($post['name'])) {
			$name = sanitize($post['name']);
		
	} else{
		$errors['name'] = "Please Enter the name";
		$err_flag = true;
	}

	if (!empty($post['role'])) {
			$role = $post['role'];
		
	} else{
		$errors['role'] = "Please enter role";
		$err_flag = true;
	}
	if (!empty($post['bio'])) {
			$bio = $post['bio'];
		
	}


	if (!empty($file)) {
		$member_img = upload_image($file, $errors);
		if (!$member_img) {
			$member_img = 'uploads/default.png';
		} 
	}
	if ($err_flag !== true) {
		$sql = "INSERT INTO team (name,position,bio,img) VALUES ('$name','$role', '$bio','$member_img')";
		$query = mysqli_query($link,$sql);
		if($query){
			return true;
		} else{
			$errors['query'] = mysqli_error($query);
			return $errors;
		}
	} return $errors;
 }

function add_article($post)
 {
 	global $link;
	$err_flag = false;
	$errors = array();

	if (!empty($post['title'])) {
			$title = sanitize($post['title']);
		
	} else{
		$errors['title'] = "Please Enter the title";
		$err_flag = true;
	}

	if (!empty($post['body'])) {
			$body = $post['body'];
		
	} else{
		$errors['body'] = "Please enter Article body";
		$err_flag = true;
	}
	
	if ($err_flag !== true) {
		$sql = "INSERT INTO article (title,body) VALUES ('$title','$body')";
		$query = mysqli_query($link,$sql);
		if($query){
			return true;
		} else{
			$errors['query'] = mysqli_error($query);
			return $errors;
		}
	} return $errors;
 }

function fetch_all_admins(){
	global $link;
	$sql = "SELECT * FROM admin WHERE admin_id != 1";
	$query = mysqli_query($link, $sql);
	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_assoc($query)) {
			$inv[] = $row; 
			}return $inv;
		}
		
	}return false;
}

function add_admin($post)
{
	global $link;
	$err_flag = false;
	$errors = [];
// 	return var_dump($file);
	extract($post);

	if (!empty($name)) {
		$name = sanitize($name);
	} else{
		$errors[] = "Enter user name";
		$err_flag = true;
	}

	if (!empty($role)) {
		$role = sanitize($role);
	} else{
		$errors[] = "Enter user role";
		$err_flag = true;
	}

	if (!empty($email)) {
		if (sanitize_email($email)) {
			$tmp = sanitize_email($email);
			if (!check_duplicate("admin", "email", $tmp)) {
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
	$sql = "INSERT INTO admin (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
		$query = mysqli_query($link, $sql);
		if ($query) {
			return true;
		} else {
			$errors['error'] = "Error Registering User please Try again" . mysqli_error($link);
			return $errors;
			
		}
	}  return $errors;

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