<?php 
$title = "Email Sender";

require 'req/header.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] === "success") {
        echo "<script>swal('Sent!', 'Email Delivered Successfully!', 'success');</script>";
    }elseif ($_GET['action'] === "fail") {
        echo "<script>swal('Failed!', 'Try Again!', 'warning');</script>";        
    }elseif ($_GET['action'] === "delete") {
        echo "<script>swal('Deleted!', 'Successfully Removed!', 'success');</script>";        
    }
}

?>


<div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                
                                <!-- /.panel-heading -->
                                <div class="panel-heading">
                                    <h2 class="panel-title" style="font-weight:bolder;">New Mail</h2>
                                </div>
                                <div class="panel-body">
                                    <?php
                                    if (isset($_GET['submit']) && !empty($_GET['subject']) && !empty($_GET['body']) && !empty($_GET['email'])) {
                                        require_once '../email_file/mail-function.php';
                                        $name = $site_title;
                                        $message = $_GET['body'];
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
                <h1 style='margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;'>Support Mail!</h1>
                <p style='margin:0;'>$message</p>
                

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
                                        $mail = send_mail($_GET['email'], $name, $_GET['business'], $_GET['body']);
                                        // var_dump($post);
                                        if ($mail === true) {
                                            header("Location: email?action=success");
                                            exit();
                                        }else{
                                            header("Location: email?action=fail");
                                            exit();
                                        }
                                    }

                                     ?>
                                    <form role="form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="get">
                                                    
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <label>Subject</label>
                                                                <input id="title" class="form-control" name="subject" type="text" placeholder="Enter Mail Subject" autofocus required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Reciever Email</label>
                                                                <input id="title" class="form-control" name="email" type="email" placeholder="user@example.com" autofocus required>
                                                            </div>

                                                            <label>Body</label>
                                                            <textarea name="body" placeholder="Email Body..." class="form-control" style="resize: none;" rows="12" required></textarea>
                                                            <br>
                                                            

                                                            <!-- Change this to a button or input when using this as a form -->
                                                            <button name="submit" type="submit" class="btn btn-lg btn-success btn-block">Send Mail</button>
                                                            
                                                        </fieldset>
                                                    </form>
                                    

                                    <!-- /.modal -->
                                </div>
                                <!-- .panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                    </div>




<?php require 'req/footer.php'; ?>