<?php
require '../site_name.php';
require_once 'inc/functions.inc.php';
if (isset($_SESSION['id'])){
    header("Location: dashboard");
    exit();

}




 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $site_title ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="../img/up_logo.png">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/sweetalert.min.js"></script>

    </head>
    <body>

        <div class="container">
            <div class="row">
            <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                <div class="col-md-4 col-md-offset-4">

                    <?php 
                    if (isset($_POST['sign-up'])) {
                        $register = register_user($_POST);
                        if ($register != false) {
                            $to = $_POST['email'];
                            $fname = $_POST['fname'];
                            // $name = "Uprising Investment Support";
                            $subject = "Account Verification";
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
                <a href='http://www.skyrocap.com/' style='text-decoration:none;'><img src='$site_url/img/up_logo.png' width='165' style='width:80%;max-width:165px;height:auto;border:none;text-decoration:none;color:#ffffff;'></a>
              </td>
            </tr>
            <!-- <tr>
              <td style='padding:30px;background-color:#ffffff;'>
                <h1 style='margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;'>Welcome to Skyro Capital!</h1>
                <p style='margin:0;'><b>Hi $fname,</b><br>Congratulations on making this Life Changing Decision. Our Team of Experienced Professionals are here to guide you every step of the Journey.</p>
              </td>
            </tr> -->
            
            <tr>
              <td style='padding:35px 30px 11px 30px;font-size:0;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);'>
                <!--[if mso]>
                <table role='presentation' width='100%'>
                <tr>
                <td style='width:145px;' align='left' valign='top'>
                <![endif]-->
                <div class='col-sml' style='display:inline-block;width:100%;max-width:145px;vertical-align:top;text-align:left;font-family:Arial,sans-serif;font-size:14px;color:#363636;'>
                  <img src='$site_url/img/raise.png' width='115' height='90' alt='' style='width:80%;max-width:115px;margin-bottom:20px;'>
                </div>
                <!--[if mso]>
                </td>
                <td style='width:395px;padding-bottom:20px;' valign='top'>
                <![endif]-->
                <div class='col-lge' style='display:inline-block;width:100%;max-width:395px;vertical-align:top;padding-bottom:20px;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;'>
                  <p style='margin-top:0;margin-bottom:12px;'>Investing with us is a very simplified process, and our 24/7 Customer Care Livechat is available to attend to your issues. Click the Button below to Verify your Email</p>

                  <p style='margin:0;'><a href='$site_url/user/activate?actc=$register' style='background: #ff3884; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#ff3884'><!--[if mso]><i style='letter-spacing: 25px;mso-font-width:-100%;mso-text-raise:20pt'>&nbsp;</i><![endif]--><span style='mso-text-raise:10pt;font-weight:bold;'>Verify your Email</span><!--[if mso]><i style='letter-spacing: 25px;mso-font-width:-100%'>&nbsp;</i><![endif]--></a></p>
                </div>
                <!--[if mso]>
                </td>
                </tr>
                </table>
                <![endif]-->
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
                            $welcome_mail = send_mail($to, $fname, $subject, $body);
                            if ($welcome_mail) {
                                echo "<script>swal('Successfully Registered!', 'Welcome to $site_title! Check your Email for Verification', 'success');</script>";    
                            }else{
                                echo "<script>swal('Successfully Registered!', 'Welcome to $site_title!', 'success');</script>";
                            }
                        }else{
                            echo "<script>swal('Failed!', 'Fill All Fields and Try Again!', 'warning');</script>";
                        }
                    }
                    if (isset($_POST['sign-in'])) {
                        $login = login_user($_POST);
                        if ($login === true) {
                            $user_id = $_SESSION['id'];
                            $user_id = sanitize($user_id);
                            $response = fetch_user($user_id);

                            if ($response) {
                                $user = $response;
                                $fchar = substr($user['name'], 0, 1);

                                header("Location: dashboard");
                            }
                        }else{
                            echo "<script>swal('Login Failed!', 'Try Again!', 'warning');</script>";
                            }
                    }

                     ?>
                    

                    <!-- Login page Start -->
                    <div class="login-panel panel panel-default sign-in">
                        <div class="panel-heading" align="center">
                            <img src="../img/up_logo.png" style="width: 150px; height: 150px;">
                            <br>
                            <br>
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button name="sign-in" type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                    <p style="margin-top: 20px;">
                                    Don't have an account?
                                        <b class="up-btn" style="cursor: pointer;" >Register</b>
                                    </p>
                                    <p style="margin-top: 20px;">
                                    Forgot Password?
                                        <a href="recover" style="text-decoration: none;" >Recover Account</a>
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <!-- Login Page End -->


                    <!-- Register page Start -->
                    <div class="login-panel panel panel-default sign-up hide">
                        <div class="panel-heading" align="center">
                            <img src="../img/up_logo.png" style="width: 150px; height: 150px; margin-left: 25%;margin-right: 25%;">
                            <br>
                            <br>
                            <h3 class="panel-title">Registration Form</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="First Name" name="fname" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Last Name" name="lname" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender :  </label>
                                        <input name="gender" type="radio" value="Male" autofocus>
                                        <label>Male</label>
                                        <input name="gender" type="radio" value="Female" autofocus>
                                        <label>Female</label>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Referrer ID(Optional)" name="ref" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Confirm Password" name="password2" type="password" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="plan" class="form-control" required>
                                            <option>Select Investment Plan</option>
                                            <option value="STARTER">STARTER PLAN</option>
                                            <option value="HIGH FREQUENCY">HIGH FREQUENCY PLAN</option>
                                            <option value="CONTRACT">CONTRACT PLAN</option>
                                            <option value="LEVERAGE">LEVERAGE PLAN</option>
                                        </select>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me" required><a href="../tnc">Accept Terms and Conditions</a>
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button name="sign-up" type="submit" class="btn btn-lg btn-success btn-block">Register</button>
                                    <p style="margin-top: 20px;">
                                    Already have account?
                                        <b class="in-btn" style="cursor: pointer;" >Sign In</b>
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <!-- Register Page End -->


                    <script type="text/javascript">
                        $(document).ready(function() {
                            $(".up-btn").click(function(){
                                $(".sign-up").removeClass("hide");
                                $(".sign-in").addClass("hide");
                            });
                            $(".in-btn").click(function(){
                                $(".sign-in").removeClass("hide");
                                $(".sign-up").addClass("hide");
                            });
                        });
                                                    

                    </script>



                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>
