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
                    if (isset($_POST['recover'])) {
                        $reset_pass = reset_password($_POST);
                        if ($reset_pass != false) {
                                echo "<script>swal('Password Reset Successfully!', 'Log in with your new Password', 'success');</script>";    
                            }else{
                            echo "<script>swal('Failed!', 'Passwords do not Match!', 'warning');</script>";
                        }
                    }
                    
                     ?>
                    

                    <!-- Login page Start -->
                    <div class="login-panel panel panel-default sign-in">
                        <div class="panel-heading" align="center">
                            <img src="../img/up_logo.png" style="width: 150px; height: 150px; margin-left: 25%;margin-right: 25%;">
                            <br>
                            <br>
                            <h3 class="panel-title">Account Recovery</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input id="email" class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div id="rb" class="form-group">
                                        <a onclick="sendPin(document.getElementById('email').value)" class="btn btn-lg btn-success">Send Reset Code</a>
                                    </div>
                                    
                                </fieldset>

                                <fieldset id="pinField" class="hide">
                                    <div class="form-group">
                                        <input onkeyup="validatePin()" id="pin" class="form-control" placeholder="Enter Pin sent to your mail" name="pin" type="number" value="">
                                        <input id="pinTemp" class="form-control" name="pinTemp" type="number" value="">
                                    </div>
                                </fieldset>

                                <script type="text/javascript">
                                    function validatePin() {
                                        var pin = document.getElementById('pin').value;
                                        var pinTemp = document.getElementById('pinTemp').value;
                                        if (pin === pinTemp) {
                                            $("#pwField").removeClass("hide");
                                            $("#pinField").addClass("hide");
                                            $("#rb").addClass("hide");
                                        }
                                    }
                                </script>

                                <fieldset id="pwField" class="hide">
                                    <b style="color: #44ee00;">Enter new Password</b>
                                    <br>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Emter new Password" name="password1" type="password" value="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Confirm new Password" name="password2" type="password" value="">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button name="recover" type="submit" class="btn btn-lg btn-success btn-block">Reset Password</button>
                                </fieldset>
                                    
                                    <p style="margin-top: 20px;">
                                    Remembered your Password?
                                        <a href="index" style="cursor: pointer;" >Login</a>
                                    </p>
                            </form>
                            <script type="text/javascript">

                    function sendPin(email) {
                        var pin = Math.floor(Math.random() * (99999 - 10001) + 10001);
                        // swal(`${pin}`, 'Code!', 'success');
                        $.ajax(`recover_ajax.php?pin=${pin}&email=${email}`,
                            {
                            success : function(data){
                                        let jData = JSON.parse(data);
                                        if (jData.success == 1) {
                                            $("#pinField").removeClass("hide");
                                            $("#pinTemp").val(pin);
                                            // $("#type").html("Type : " + jData.type);
                                        }else{
                                            $("#pinPack").addClass("hide");
                                        }
                                                           
                                    },
                            error : function(){
                                    swal('Failed!', 'Link Failed!', 'success')
                                    }
                        });

                    }

                    
                </script>
                        </div>
                    </div>
                    <!-- Login Page End -->



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
