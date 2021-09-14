<?php 
$title = "Pending Transfers";

require 'req/header.php';
require_once '../email_file/mail-function.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] === "success") {
        $subject = "CREDIT NOTICE";
        extract($_GET);
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
                        <h1 style='margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;'>CREDIT NOTICE!</h1>
                        <p style='margin:0;'><b>Dear $ben_name,</b><br>This is to notify you that your account has been credited.</p>
                        <p>Below are the details of the transaction</p>
                        <p><b>Amount:</b> $ $amount</p>
                        <p><b>Name of Sender:</b> $name</p>
                        <p><b>Account Number of Sender:</b> $acn</p>
                        <p><b>Description:</b> Transfer</p>
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
          $send = send_mail($to, $ben_name, $subject, $body);
          if ($send) {
              echo "<script>swal('Updated!', 'Successfully Approved!', 'success');</script>";
          }
    }elseif ($_GET['action'] === "fail") {
        echo "<script>swal('Failed!', 'Try Again!', 'warning');</script>";        
    }elseif ($_GET['action'] === "delete") {
        echo "<script>swal('Updated!', 'Successfully Deleted!', 'success');</script>";        
    }
    // ?id=4&usd_amt=5&type=Transfer&user_id=4&r_acn=1234534289

}

?>


                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <!-- <div class="panel-heading">
                                    Pending Transactions
                                </div> -->
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>To</th>
                                                    <th>Trx ID</th>
                                                    <th>Type</th>
                                                    <th>Approve</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            	<?php 
                                            	$all_Pending = fetch_all_transfer();
                                            	if($all_Pending){
                                            		$i = 0;
                                            		foreach ($all_Pending as $pend) {
                                            			$i++;

                                            	 ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $i ?></td>
                                                    <td><a href="profile?user_id=<?= $pend['user_id'] ?>"><?= getUserById($pend['user_id']); ?></a></td>
                                                    <td>$<?= number_format($pend['usd_amt']); ?></td>
                                                    <td class="center"><?= $pend['r_acn']; ?></td>
                                                    <td class="center"><?= $pend['trans_id']; ?></td>
                                                    <td class="center"><?= $pend['type']; ?></td>
                                                    <td style="width: 100%" class="center btn btn-warning"><a href="trans_confirm?id=<?= $pend['t_id']; ?>&usd_amt=<?= $pend['usd_amt']?>&type=<?= $pend['type'] ?>&user_id=<?= $pend['user_id'] ?>&r_acn=<?= $pend['r_acn']; ?>" style="font-weight: bolder; text-decoration: none;">Approve</a></td>
                                                    <td class="center"><?= $pend['status']; ?></td>
                                                    <td class="center"><?= $pend['date']; ?></td>
                                                    <td style="width: 100%" class="center btn btn-danger"><a href="delete?id=<?= $pend['t_id']; ?>" style="font-weight: bolder; text-decoration: none;">Delete</a></td>
                                                </tr>


                                                <?php }
                                            	} ?>


                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>









<?php require 'req/footer.php'; ?>