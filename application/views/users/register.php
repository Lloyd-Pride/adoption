<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
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
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
        <?php
            //echo '<div class="alert alert-danger" role="alert">'.  validation_errors() .'</div>';
        //'onsubmit'=>'javascript:return validateEmail(\'validationform\', \'email\', \'contact_num\', \'first_name\', \'last_name\', \'name\', \'surname\', \'id_num\');'
            $attributes = array("class"=>"splash-container", "novalidate" => "", "id"=>"form_id", "onsubmit"=>"javascript:return validateRegistry('form_id', 'username', 'email', 'password');"); 
            echo form_open('users/register', $attributes);
        ?> 


        <div class="card">
            <div class="card-header text-center">
                <h3 class="mb-1">Registrations Form</h3>
                <p>Please enter your user information.</p>

                <?php 
                    if(!empty(validation_errors()))
                        echo '<div class="alert alert-danger" role="alert">'.  validation_errors() .'</div>'; 
                ?>

            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" name="password" type="password" required="" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" required="" name="password2" placeholder="Confirm">
                </div>
  
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                </div>
                
                <!--div class="form-group row pt-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                        <button class="btn btn-block btn-social btn-facebook " type="button">Facebook</button>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn  btn-block btn-social btn-twitter" type="button">Twitter</button>
                    </div>
                </div-->
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="/adoption/users/login" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>
 
</html>

<script type="text/javascript">
    
function validateRegistry(form_id, username, email, password)
{
    var usernameReg = /^[a-zA-Z0-9]+$/;
    var passw=  /^[A-Za-z]\w{4,14}$/;
    var reg = /^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z]{2,4})$/;

    var address = document.forms[form_id].elements[email].value;
    var name = document.forms[form_id].elements[username].value;
    var pwd = document.forms[form_id].elements[password].value;

    if(reg.test(address) == false)
    {
        alert('Provide proper email.');
        document.forms[form_id].elements[email].focus();
        return false;
    }

    if(usernameReg.test(name) == false)
    {
        alert('Provide proper username.');
        document.forms[form_id].elements[email].focus();
        return false;
    }
    else if(name.length < 3 || name.trim() == "")
    {
        alert('Your username must have at least 3 or more characters and not empty spaces.');
        document.forms[form_id].elements[email].focus();
        return false;  
    }

    if(passw.test(pwd) == false)
    {
        alert('Check if your password has between 4 to 14 characters which contain only characters, numeric digits and underscore and first character must be a letter.');
        document.forms[form_id].elements[password].focus();
        return false;
    }

}

</script>