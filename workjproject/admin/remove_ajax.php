<?php
require_once 'inc/functions.inc.php';

// inv_cap=67&usd_bal=566&user_id=4
	$inv_cap = $_GET['inv_cap'];
  // $usd_bal = $_GET['usd_bal'];
	$user_id = $_GET['user_id'];
	$user = fetch_user($user_id);
  $t_id = fetch_user_last_id($user_id);
  $name = $user['name'];
  $email = $user['email'];
  $acn = $user['acn'];
	global $link;
  $sql = "UPDATE users SET inv_cap = inv_cap-$inv_cap WHERE user_id = '$user_id'";
      $query = mysqli_query($link,$sql);
		if ($query) {
      $sql2 = "DELETE FROM trans WHERE t_id = '$t_id'";
      $query2 = mysqli_query($link,$sql2);
      if ($query2) {
        
          require '../site_name.php';
          require_once '../email_file/mail-function.php';

          $subject = "Reversal";
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
                              <a href='$site_url' style='text-decoration:none;'><img src='$site_url/img/up_logo.png' width='165' alt='Logo' style='width:80%;max-width:165px;height:auto;border:none;text-decoration:none;color:#ffffff;'></a>
                            </td>
                          </tr>
                          <tr>
                            <td style='padding:30px;background-color:#ffffff;'>
                              <h1 style='margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;'>Reversal!</h1>
                              <p style='margin:0;'><b>Dear $name,</b><br> This is to notify you that there is a reversal action on your Account with the account number: $acn based on your request and approval from from the finance Unit. <br>Thank you for choosing Skyro Capital. <br>Best Regards!</p>
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
          $send_mail = send_mail($email, $name, $subject, $body);
          if ($send_mail) {
              echo json_encode(array('inv_cap' => $inv_cap, 'success' => 1));
          }else{
              echo json_encode(array('inv_cap' => 'Not fOUND', 'success' => 0));
          }  

      }else{
              echo json_encode(array('inv_cap' => 'Not fOUND', 'success' => 0));
          }
      
    } else {
       	echo json_encode(array('inv_cap' => 'Not fOUND', 'success' => 0));
 			}
