<?php 
$title = "Withdrawals";

require 'req/header.php';

if (!empty($_GET['status'])) {
    $status = $_GET['status'];
    if ($status === "success") {
        echo "<script>swal('Successful!', 'Wait for Approval!', 'success');</script>";
    }
}

?>




					<div class="row">
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Withdrawal Instructions
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="alert alert-success">
                                        Enter Amount in USD in the Input below.
                                    </div>
                                    <div class="alert alert-info">
                                        Select Preferred Payment Method.
                                    </div>
                                    <div class="alert alert-warning">
                                        Click Confirm Withdrawal.
                                    </div>
                                    <div class="alert alert-danger">
                                        You will be credited after Confirmation.
                                    </div>
                                    
                                </div>
                                <!-- .panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        <!-- /.col-lg-6 -->
                    </div>


                    <?php if (isset($_POST['submit']) && !empty($_POST['amt']) && ($_POST['currency'] != "Select Currency Preference")) {
                      
                    	if ($_POST['amt'] >= 20) {
                          if ($_POST['amt'] <= $user['usd_bal']) {
                            
                              
                            // if ($_POST['pin'] === $_POST['pin_value']) {
                            $pin = random_int(10000, 99999);
                            $email = $user['email'];
                            $name = $user['name'];
                            $subject = "Withdrawal Confirmation Code";
                            
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
                                            <h1 style='margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;'>Confirmation Code!</h1>
                                            <p style='margin:0;'>Dear $name,<br> Your Confirmation Code is <h1>$pin</h1></p>
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
                            global $link;
                              $sql = "UPDATE users SET act_code = '$pin' WHERE email = '$email'";
                              $query = mysqli_query($link, $sql);
                              if ($query) {
                                    $send_mail = send_mail($email, $name, $subject, $body);
                                    if ($send_mail) {
                                      $register = withdraw($_POST, $user_id);
                                        if ($register === true) {
                                            echo "<script>window.location.href = 'wdrl_hlpr?user_id=$user_id'</script>";
                                        }else{
                                            echo "<script>swal('Failed!', 'Fill All Fields and Try Again!', 'warning');</script>";
                                        }
                                    }else{
                                      echo "<script>swal('Failed!', 'Try Again!', 'warning');</script>";
                                    }
                                        
                                    // }else{
                                    //         echo "<script>swal('Wrong Code!', 'Restart Withdrawal Process to get a new Code!', 'warning');</script>";
                                    //     }
                                        
                                }


                          }else{
                            echo "<script>swal('Insufficient Funds!', 'Try Again!', 'warning');</script>"; 
                          }
						    
            				}else{
                          echo "<script>swal('Invalid Amount!', 'Try Again!', 'warning');</script>";
                    }



                } ?>

				<!-- /.row -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                	<form role="form" action="" method="post">
                                                   	
						                                <fieldset>
                                                            
						                                    <div class="form-group">
						                                    	<label>Amount($)</label>
						                                        <input id="amtp" class="form-control" name="amt" type="text" autofocus>
                                                                <br>
                                                                <p style="color: red; font-weight: bolder;">Minimum Withdrawal $20</p>
                                                                <!-- <br> -->
						                                    </div>
						                                    <label>Select Payment Method</label>
						                                    <select required class="form-control" name="currency">
						                                		<option>Select Payment Method</option>
						                                		<option value="BTC">Bitcoin(BTC)</option>
                                                                <option value="ETH">Ethereum(ETH)</option>
                                                                <option value="TRX">Tronix(TRX)</option>
                                                                <option value="LTC">Litecoin(LTC)</option>
                                                                <option value="DOGE">Dogecoin(DOGE)</option>
                                                                <option value="BNB">Binance Coin(BNB)</option>
                                                                <option value="Perfect Money">Perfect Money</option>
                                                                <option value="PayPal">PayPal</option>
						                                	</select>
						                                	<br>
						                                    
                                              <?php if (!isset($lavey)): ?>
						                                    <!-- Change this to a button or input when using this as a form -->
						                                    <button name="submit" type="submit" class="btn btn-lg btn-success btn-block">Process Withdrawal</button>
						                                  <?php endif ?>
                                              <?php if (isset($lavey)): ?>
                                              <h2><b style="font-size: 20px;"><i class="fa fa-circle" style="color: <?= $color ?>; font-size: 20px;"></i> <?= $lavey ?></b></h2>
                                              <?php endif ?>
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