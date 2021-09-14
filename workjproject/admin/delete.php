<?php 
require 'inc/functions.inc.php';

if (isset($_GET['id'])) {
	global $link;
	$id = $_GET['id'];
	$sql = "DELETE FROM trans WHERE t_id = '$id'";
	$query = mysqli_query($link, $sql);
	if ($query) {
		header("Location: pending?action=delete");
		exit();
	} else{
		header("Location: pending?action=fail");
		exit();
	}
}

if (isset($_GET['aid'])) {
	global $link;
	$aid = $_GET['aid'];
	$sql = "DELETE FROM admin WHERE admin_id = '$aid'";
	$query = mysqli_query($link, $sql);
	if ($query) {
		header("Location: admins?action=delete");
		exit();
	} else{
		header("Location: admins?action=fail");
		exit();
	}
}

if (isset($_GET['article_id'])) {
	global $link;
	$article_id = $_GET['article_id'];
	$sql = "DELETE FROM article WHERE id = '$article_id'";
	$query = mysqli_query($link, $sql);
	if ($query) {
		header("Location: article?action=delete");
		exit();
	} else{
		header("Location: article?action=fail");
		exit();
	}
}

if (isset($_GET['member_id'])) {
	global $link;
	$member_id = $_GET['member_id'];
	$sql = "DELETE FROM team WHERE id = '$member_id'";
	$query = mysqli_query($link, $sql);
	if ($query) {
		header("Location: team?action=delete");
		exit();
	} else{
		header("Location: team?action=fail");
		exit();
	}
}


if (isset($_GET['user_id'])) {
	global $link;
	$user_id = $_GET['user_id'];
	$sql = "DELETE FROM users WHERE user_id = '$user_id'";
	$query = mysqli_query($link, $sql);
	if ($query) {
		header("Location: profile?action=delete");
		exit();
	} else{
		header("Location: profile?action=fail");
		exit();
	}
}