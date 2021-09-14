<?php
require_once '../site_name.php';
require_once '../user/inc/db.php';
require_once '../email_file/mail-function.php';

global $link;

function profits($user_id){

	global $link;
	$status = "pending";
	$type = "Deposit";
	$sql = "SELECT * FROM profit WHERE user_id = '$user_id' AND status = '$status'";
	$query = mysqli_query($link, $sql);
	if (mysqli_num_rows($query) > 0) {
		$dep = 0;
	while ($row = mysqli_fetch_assoc($query)) {
			$dep += $row['amount'];
		}return $dep;
	} else{
		return false;
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

$total = 0;
function profit($t_id){
	$total++;
	global $link;
	$sql = "SELECT * FROM trans WHERE t_id = '$t_id'";
	$query = mysqli_query($link, $sql);

	if($query){
		if (mysqli_num_rows($query) > 0) {
			while ($row = mysqli_fetch_array($query)) {
			$inv = $row; 
			}
		}
	}

		$t_id = $inv['t_id'];
		$user_id = $inv['user_id'];
		$plan = $inv['plan'];
		$usd_amt = $inv['usd_amt'];
		$count = $inv['count'] + 1;
		$plan = $inv['plan'];
		$intRate = $inv['interest'];
		$days = $inv['days'];
		$date = date('d M Y');
		$time = date('H:m:s');
		
		$daily_div = floatval((($usd_amt / 100) * $intRate) / $days);
		$pending = "pending";
		$sql = "UPDATE users SET usd_bal = usd_bal+$daily_div WHERE user_id = '$user_id'";
		$query = mysqli_query($link, $sql);
		$user = fetch_user($user_id);
		$email_amount = round($daily_div,2);
		
		$to = $user['email'];
		$name = $user['name'];
		require_once '../site_name.php';

		// $sname = "$site_title Support";
		$subject = "$plan Profit Alert!";
		$body = "<!DOCTYPE html>
<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width,initial-scale=1'>
  <meta name='x-apple-disable-message-reformatting'>
  <title></title>
  <!--[if mso]>
  <style>
    table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
    div, td {padding:0;}
    div {margin:0 !important;}
  </style>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table, td, div, h1, p {
      font-family: Arial, sans-serif;
    }
    @media screen and (max-width: 530px) {
      .unsub {
        display: block;
        padding: 8px;
        margin-top: 14px;
        border-radius: 6px;
        background-color: #555555;
        text-decoration: none !important;
        font-weight: bold;
      }
      .col-lge {
        max-width: 100% !important;
      }
    }
    @media screen and (min-width: 531px) {
      .col-sml {
        max-width: 27% !important;
      }
      .col-lge {
        max-width: 73% !important;
      }
    }
  </style>
</head>
<body style='margin:0;padding:0;word-spacing:normal;background-color:#939297;'>
  <div role='article' aria-roledescription='email' lang='en' style='text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#fff;'>
    <table role='presentation' style='width:100%;border:none;border-spacing:0;'>
      <tr>
        <td align='center' style='padding:0;'>
          <!--[if mso]>
          <table role='presentation' align='center' style='width:600px;'>
          <tr>
          <td>
          <![endif]-->
          <table role='presentation' style='width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;'>
            <tr>
              <td style='padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;'>
                <a href='$site_url' style='text-decoration:none;'><img src='$site_url/img/up_logo.png' width='165' style='width:80%;max-width:165px;height:auto;border:none;text-decoration:none;color:#ffffff;'></a>
              </td>
            </tr>
            <tr>
              <td style='padding:30px;background-color:#ffffff;'>
                <h1 style='margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;'>Day $count of $days Profit Alert!</h1>
                <p style='margin:0;'><b>Dear $name,</b><br>This is to notify you that your Return on Investment(ROI) has been credited to your account Balance.</p>
                <p>Below are the details of the transcation</p>
                <p><b>Amount:</b> $ $email_amount</p>
                <p><b>Name of Package:</b> $plan</p>
                <p><b>Investment Capital:</b> $ $usd_amt</p>
                <p><b>Value Date:</b> $date</p>
                <p><b>Time of Transaction:</b> $time</p>
                <p>Thank you for choosing Skyro Capital.</p>
                <p>Best Regards!</p>
              </td>
            </tr>
            
            <tr>
              <td style='padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;'>
                
                <p style='margin:0;font-size:14px;line-height:20px;'>&reg; $site_title, Dammstrasse 19, 6301 Zug, Switzerland.</p>
              </td>
            </tr>
          </table>
          <!--[if mso]>
          </td>
          </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
    </table>
  </div>
</body>
</html>";
		$send = send_mail($to, $name, $subject, $body);
		if ($query) {
			if ($count < $days) {
				$sql2 = "UPDATE `trans` SET `count` = '$count' WHERE `t_id` = '$t_id'";
				$query2 = mysqli_query($link,$sql2);
				
			}else{
				$status = "completed";
				$sql3 = "UPDATE trans SET count = '$count', status = '$status' WHERE t_id = '$t_id'";
				$query3 = mysqli_query($link,$sql3);
				if ($query3) {
					// $profit = profits($user_id);
					$user = fetch_user($user_id);
					// $bal = $user['usd_bal'];
					$usd_bal = $user['usd_bal'];
					$usd_bal = $usd_bal + $usd_amt;
					$sql4 = "UPDATE users SET usd_bal = '$usd_bal' WHERE user_id = '$user_id'";
					$query4 = mysqli_query($link, $sql4);
					
				}
				
			}
		}
if (($query2 === true) OR ($query4 === true)) {
	return true;
}else{
	return false;
}


}

// Helper Functions end

if(!empty($_GET['id'])){
	$t_id = $_GET['id'];
	$add_profit = profit($t_id);
	if ($add_profit) {
		header("Location: pkg?status=success&total=$total");
    	exit();
	}else{
		header("Location: pkg?status=fail");
    	exit();
	}

}