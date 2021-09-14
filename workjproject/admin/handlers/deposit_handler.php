<?php

	require_once('../inc/db.php');
	session_start();

	if(isset($_POST['submit'])){
		$POST = filter_var_array($_POST);
		extract($POST);

		$user_id = $_SESSION['id'];
		$status = "pending";
		$type = "Deposit";

		$query = "INSERT INTO trans (user_id, usd_amt, currency, trans_id, type, status) VALUES ('$user_id', '$amt', '$currency', '$t_id', '$type', '$status')";
		$result = mysqli_query($link, $query);

		if($result){
			header("Location: ../deposit.php?alert=d_s");
		}
	}