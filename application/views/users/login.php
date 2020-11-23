<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="./login"></a><span class="splash-description">Please enter your user information.</span>

                <?php
                if($this->session->flashdata('login_failed'))  
                    echo '<div class="alert alert-danger" role="alert">'.$this->session->flashdata('login_failed').'</div>';

                if($this->session->flashdata('user_loggedout'))
                    echo '<div class="alert alert-dark" role="alert">'.$this->session->flashdata('user_loggedout').'</div>';
            ?>

            </div>

            <div class="card-body">
            <?php
                
                echo form_open('users/login');
            ?> 
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" id="username" type="text" placeholder="Username" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password" required="">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
            <?php echo form_close(); ?>
            </div>
            <div class="card-footer bg-white p-0  text-center">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="/adoption/users/register" class="footer-link">Create An Account</a>
                </div>
                <!--div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div-->
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>