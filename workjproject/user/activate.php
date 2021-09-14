<?php
require_once 'inc/functions.inc.php';
require '../site_name.php';
if (!empty($_GET['actc'])) {
	$actc = urldecode($_GET['actc']);
	$sql = "UPDATE users SET activated = 1 WHERE act_code = '$actc'";
	$query = mysqli_query($link, $sql);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
</head>
<body>

	<?php 

	if ($query === true) {
		$user = fetch_userBy_actc($actc);
		$to = $user['email'];
        $name = $user['name'];
        // $name = "Uprising Investment Support";
        $subject = "Welcome!";
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
                <h1 style='margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;'>Welcome to $site_title!</h1>
                <p style='margin:0;'><b>Hi $name,</b><br>Congratulations for a successful comfirmation of your skyro account, just a few more steps to activate your account and start earning.</p>
                <p>Do you know you can earn up to 5-25% profit from your prefered investment plan in skyro in 4-21 days from the comfort of your home?</p>
                <p>skyro team of professionals have carefully mapped out investment plans with the use of analytical tools such as artificial intelligence
and specially designed whale trading bots to tap into the global economic market with the sole aim of maximizing profit. With its informative
tentacles spread across industries such as; insurance sector, minning sector, oil and gas (natural and biogas) industry, pharmaceutical industry
(herbal and supplements),government agencies and information technology, Skyro Capital provides its investors with quality asset and financial closers.</p>
<p>TAKE THE TOUR by simply clicking on <a href='www.skyrocap.com'>www.skyrocap.com</a> to login to your account and explore skyro.</p>
<p>- Navigate across your dashbpoard and check out our investment packages.</p>
<p>- Make a deposit and select an investment package.</p>
<p>- Choose your prefered investment plan and start earning at once.</p>
<p>Note: Be informed that transaction of bitcoin attracts higher charges than other crypto by your transaction network, this is not from skyro.</p>
<p>For more information,contact Skyro costumer care 24hrs live chat on the website or,
send us an email at info@skyrocap.com.</p>
<p>we hope to meet you at our next Skyro Capital convention.</p>
<p>Happy Investing!!</p>
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
        $welcome_mail = send_mail($to, $name, $subject, $body);
		if ($welcome_mail) {
			header("Location: dashboard");
    		exit();
		}
		
	}else{
		echo "<script>swal('Invalid Activation Link!', 'Try Again with a valid Link!', 'warning');</script>";
	}
	?>

</body>
</html>