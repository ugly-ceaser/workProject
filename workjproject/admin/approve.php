<?php 
require 'inc/functions.inc.php';
require '../site_name.php';

// id=44&usd_amt=666&type=Withdrawal&user_id=4
if (isset($_GET['id']) && isset($_GET['user_id']) && isset($_GET['usd_amt']) && isset($_GET['type'])) {
	global $link;
	$id = $_GET['id'];
	$user_id = $_GET['user_id'];
	$amt = $_GET['usd_amt'];
	$type = $_GET['type'];
	$status = "approved";
  $trans = fetch_trans($id);
	// $date = new DateTime("+15 day");
	// $date = date('Y-m-d H:i:s', strtotime("+15 day"));
	// $date = $_GET['date'];
  $time = date('H:m:s');
	$sql = "UPDATE trans SET status = '$status' WHERE t_id = '$id'";
	$query = mysqli_query($link, $sql);
	if ($query) {
		if ($type === "Deposit") { 
			// $inv_cap = getUserBalance($user_id);
      $usd_bal = getUserInvBalance($user_id);
			$usd_bal = $usd_bal + $amt;
      $activated = 2;
			$sql2 = "UPDATE users SET usd_bal = '$usd_bal', activated = '$activated' WHERE user_id = '$user_id'";
			$query2 = mysqli_query($link, $sql2);
                        require_once '../email_file/mail-function.php';
			$user = fetch_user($user_id);
			$to = $user['email'];
			$name = $user['name'];
			$subject = "Deposit Completed";
			$bonus = ($amt / 100) * (5/2);
      $amount = round(floatval($trans['usd_amt']), 2);
      $acn = $user['acn'];
      $currency = $trans['currency'];
      // $date = $trans['date'];
      $setup = new DateTime($trans['date']);
      $date = $setup->format('d M Y');
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
                <h1 style='margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;'>Deposit Alert!</h1>
                <p style='margin:0;'><b>Dear $name,</b><br>This is to notify you that a deposit has just occured on your account with us.</p>
                <p>Below are the details of the transaction</p>
                <p><b>Account Number:</b> $acn</p>
                <p><b>Transaction Description:</b> $currency</p>
                <p><b>Amount:</b> $ $amount</p>
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
			if ($query2) {
				$user = fetch_user($user_id);
				if (!empty($user['referrer'])) {
					$referrer = $user['referrer'];
					$sql2 = "UPDATE users SET usd_bal = usd_bal+$bonus WHERE ref_id = '$referrer'";
					$result2 = mysqli_query($link, $sql2);
					if ($result2) {
						header("Location: pending?action=success");
						exit();
					}
				}else{
					header("Location: pending?action=success");
					exit();
				}
				
				
			}
		}elseif ($type === "Withdrawal") {
      // $account = $_GET['account'];
      $user = fetch_user($user_id);
			$bal = $user['usd_bal'];
			$bal = $bal - $amt;
			$sql2 = "UPDATE users SET usd_bal = '$bal' WHERE user_id = '$user_id'";
			$query2 = mysqli_query($link, $sql2);
			require_once '../email_file/mail-function.php';
			$user = fetch_user($user_id);
			$to = $user['email'];
			$name = $user['name'];
			$subject = "Withdrawal Released to your Wallet";
      $amount = round(floatval($trans['usd_amt']), 2);
      $acn = $user['acn'];
      $currency = $trans['currency'];
      // $date = $trans['date'];
      $setup = new DateTime($trans['date']);
      $date = $setup->format('d M Y');
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
                <h1 style='margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;'>WITHDRAWAL ALERT!</h1>
                <p style='margin:0;'><b>Dear $name,</b><br>This is to notify you that a debit action has just occured on your account with us.</p>
                <p>Below are the details of the transaction</p>
                <p><b>Account Number:</b> $acn</p>
                <p><b>Transaction Description:</b> $currency</p>
                <p><b>Amount:</b> $amount</p>
                <p><b>Value Date:</b> $date</p>
                <p><b>Time of Transaction:</b> $time</p>
                <p>The privacy and security of your account details is important to us. if you did not make this transaction, kindly contact
skyro customer 24 hours live support on the website or send us an email at <a href='mailto:support@skyrocap.com'>support@skyrocap.com</a> for assistance.</p>
                <p>Note that Skyro Capital will never request for the password to your account.</p>

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
			if ($query2) {
				header("Location: pending?action=success");
				exit();
				
			}
		}
		

		
					
		
	} else{
		header("Location: pending?action=fail");
		exit();
	}
}