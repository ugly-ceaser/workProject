<?php
require_once 'inc/functions.inc.php';
require '../site_name.php';
require_once '../email_file/mail-function.php';

// inv_cap=67&usd_bal=566&user_id=4
  $user_id = $_GET['user_id'];
  $user = fetch_user($user_id);
  $fname = $user['name'];
  $acn = $user['acn'];
  global $link;
  if ($user['activated'] == 2) {
      $change = 0;
      $text = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $act_code = substr(str_shuffle($text), 0, 6);
      $sql = "UPDATE users SET activated = '$change', act_code = '$act_code' WHERE user_id = '$user_id'";
          $query = mysqli_query($link,$sql);
        if ($query) {
              echo json_encode(array('change' => $change, 'success' => 1));
          }else{
              echo json_encode(array('change' => 'Not fOUND', 'success' => 0));
          }
  }else{
      $change = 2;
      $text = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $act_code = substr(str_shuffle($text), 0, 6);
      $sql = "UPDATE users SET activated = '$change', act_code = '$act_code' WHERE user_id = '$user_id'";
          $query = mysqli_query($link,$sql);
        if ($query) {
              echo json_encode(array('change' => $change, 'success' => 1));
          }else{
              echo json_encode(array('change' => 'Not fOUND', 'success' => 0));
          }
  }
  
