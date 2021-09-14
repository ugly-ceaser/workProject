<?php
$title = "Admin Login";
 require 'inc/functions.inc.php'; 

if (isset($_SESSION['admin-id'])) {
        header("Location: dashboard");
        exit();
    }
    // $response = add_default();
    // var_dump($response);
    if (isset($_POST['submit'])) {
       // var_dump($_POST);
        $response = login_admin($_POST);
        if ($response === true) {
                header("Location: dashboard");
                exit();
        }else{
            $errors = $response;
            echo "<script>alert('Failed! Enter correct Login Details');</script>";
        }
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

        <title>Uprising Investment</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="../img/favicon.png">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="js/jquery.min.js"></script>

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    

                    <!-- Login page Start -->
                    <div class="login-panel panel panel-default sign-in">
                        <div class="panel-heading">
                            <h3 class="panel-title">Admin Login</h3>
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
                                    <button name="submit" type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                    
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <!-- Login Page End -->


                    <!-- Register page Start -->
                    <div class="login-panel panel panel-default sign-up hide">
                        <div class="panel-heading">
                            <h3 class="panel-title">Registration Form</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Full Name" name="name" type="text" autofocus>
                                    </div>
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
                                    <button name="sign-up" type="submit" class="btn btn-lg btn-success btn-block">Login</button>
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
