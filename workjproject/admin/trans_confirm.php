<?php 
require '../site_name.php';
require '../user/inc/db.php';

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

if (isset($_GET['id']) && isset($_GET['usd_amt']) && isset($_GET['type']) && isset($_GET['user_id']) && isset($_GET['r_acn'])) {
require '../site_name.php';

        global $link;
        $err_flag = false;
        $errors = array();
        $plan = "Null";
        $type = "Transfer";
        $status = "sending";
        extract($_GET);
require_once '../email_file/mail-function.php';
        $user = fetch_user($user_id);
        $to = $user['email'];
        $name = $user['name'];
        $subject = "DEBIT NOTICE"; 
        $amount = floatval($usd_amt);
        $acn = $user['acn'];
        $date = date('d M Y');
        $time = date('H:m:s');
        $ben = fetch_userBy_acn($r_acn);
        $ben_name = $ben['name'];
 
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
		                <h1 style='margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;'>DEBIT NOTICE!</h1>
		                <p style='margin:0;'><b>Dear $name,</b><br>This is to notify you that you have made a Transfer from your account with us to another account.</p>
		                <p>Below are the details of the Transfer:</p>
		                <p><b>Name of Beneficiary:</b> $ben_name</p>
		                <p><b>Account Number of Beneficiary:</b> $r_acn</p>
		                <p><b>Amount:</b> $ $amount</p>
		                <p><b>Description:</b> Transfer</p>
		                <p><b>Value Date:</b> $date</p>
		                <p><b>Time of Transaction:</b> $time</p>
		                <p>The Privacy and Security of your account details is very important to us. If you did not make this transaction, kindly contact skyro customer service 24 hours live support on the website or send us an email at <a href='mailto:support@skyrocap.com'>support@skyrocap.com</a> for assistance.</p>
		                <p>Note that Skyro Capital will never request the password of your account for any reason.</p>
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
        $sql = "UPDATE users SET usd_bal = usd_bal-$usd_amt WHERE user_id = '$user_id'";
        
        $query = mysqli_query($link,$sql);
        if($query){
            $to = $ben['email'];
            $subject = "CREDIT NOTICE";
            
            $sql2 = "UPDATE users SET inv_cap = inv_cap+$usd_amt WHERE acn = '$r_acn'";
        
            $query2 = mysqli_query($link,$sql2);
            if($query2){
                $status = "sent";
                $sql3 = "UPDATE trans SET status = '$status' WHERE t_id = '$id'";
        
                $query3 = mysqli_query($link,$sql3);
                if($query3){
                	// $to, $ben_name
                    header("Location: transfers?action=success&to=$to&ben_name=$ben_name&amount=$amount&name=$name&acn=$acn&date=$date&time=$time");
	    			exit();
                } else{
                    header("Location: transfers?action=fail");
	    			exit();
                }
            } else{
                header("Location: transfers?action=fail");
	    		exit();
            }
        } else{
            header("Location: transfers?action=fail");
	    	exit();
        }



        
}