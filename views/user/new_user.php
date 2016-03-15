<html>
    <head>
        <?php
            
        $response = '';
        
        if (!empty($_SERVER['QUERY_STRING'])) {
            $response = $_SERVER['QUERY_STRING'];
        } else {
            $email_alert = "";
            $password_alert = "";
        }
        
        $alert_array = [
            'name'                  => "<p class='alert alert-warning'>Please enter your full name.</p>",
            'email'                 => "<p class='alert alert-warning'>Please enter a valid email address.</p>",
            'username'              => "<p class='alert alert-warning'>Please enter a username.</p>",
            'password'              => "<p class='alert alert-warning'>Please enter a valid password.</p>",
            'confirm-password'      => "<p class='alert alert-warning'>Please confirm your password.</p>",
            'matching'              => "<p class='alert alert-warning'>Passwords must match.</p>",
            'duplicate-username'    => "<p class='alert alert-warning'>Username already exists!</p>"
        ];
        
        $alert_codes = str_split($response);
        $email_alert = '';
        $name_alert = '';
        $username_alert = '';
        $password_alert = '';
        $password2_alert = '';
        $confirm_alert = '';
        
        array_splice($alert_codes, 0, 2);
                
        if (in_array("n", $alert_codes))
        {
            $name_alert = $alert_array['name'];
        }
        
        if (in_array("e", $alert_codes))
        {
            $email_alert = $alert_array['email'];
        }
        
        if (in_array("u", $alert_codes))
        {
            $username_alert = $alert_array['username'];
        }
        
        if (in_array("p", $alert_codes))
        {
            $password_alert = $alert_array['password'];
        }
        
        if (in_array("2", $alert_codes))
        {
            $password2_alert = $alert_array['confirm-password'];
        }
        
        if (in_array("c", $alert_codes))
        {
            $confirm_alert = $alert_array['matching'];
        }
        
        
            
        
        ?>
        <link rel='stylesheet' href='../../resources/bootstrap/css/bootstrap.min.css' type="text/css">
        <link rel='stylesheet' href='../../resources/css/stylesheet.css' type="text/css">
        <script src='../../resources/jquery/jquery-2.1.4.min.js'></script>
        <script>
        $(document).ready(function() {
            alerts = [
                <?php
                    foreach ($alert_array as $alert) {
                        echo "\"" . $alert . "\",";
                    }
                ?>
            ];
            $('#new-user').submit(function(event) {
                event.preventDefault();

                $('#new-user p').remove();

                var name = $('#name').val().trim();
                var email = $('#email').val().trim();
                var company = $('#company').val().trim();
                var username = $('#username').val().trim();
                var password = $('#password').val().trim();
                var password2 = $('#confirm-password').val().trim();
                var emailReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                
                if (name && email && username && password && password2)
                {
                    var submitEmail = true; 
                    var submitPassword = true;
                    if (!emailReg.test(email)) 
                    {
                        $('#email').before(alerts[1]);
                        submitEmail = false;
                    } 
                    
                    if (password != password2) 
                    {
                        $('#username').after(alerts[5]);
                        submitPassword = false;
                    } 
                    
                    if (submitEmail == true && submitPassword == true)
                    {
                        var data = $('#new-user').serialize();
                        $.post('../../controllers/user/new_user.php', data, function(result) {
                            if (result == 'true') {
                                window.location.href='../../index.php?y';
                            }
                            else
                            {
                                if (result == '1062') {
                                    $('#username').before(alerts[6]);
                                } else {
                                    console.log(result);
                                }
                            }
                        });
                    }
                } else {
                    if (name.length == 0) {
                        $('#name').before(alerts[0]); 
                    } 
                
                    if (email.length == 0) {
                        $('#email').before(alerts[1]);
                    }
                
                    if (username.length == 0) {
                        $('#username').before(alerts[2]);
                    } 
                
                    if (password.length == 0) {
                        $('#password').before(alerts[3]);
                    } 
                
                    if (password2.length == 0) {
                        $('#confirm-password').before(alerts[4]);
                    } 
                }
                });
            });
        </script>
        <style>
        .sub {
            border: none;
            margin-bottom: 15px;
        }

        form {
            position: relative;
            left: 50%;
            margin-left: -150px;
            width: 300px;
            text-align: center;
            border: 1px solid #DDD;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 3px 3px 3px #AAA;
        }
        input {
            margin: 0;
            border: none;
        }
        </style>
    </head>
    <body>
        <header class='main-header'>
            <h1>TAM</h1>
        </header>
        <div class='interior'>
            <header class='sub'>
                New User
            </header>

            <form action="../../controllers/user/new_user.php" method='post' id='new-user'>
				<div class='form-group'>
                    <label for='username'>Full Name: </label><?=$name_alert?> <input type="text" id="name" class='form-control' name='name'>
                </div>
				<div class='form-group'>
					<label for='username'>Email: </label><?=$email_alert?> <input type="text" id="email" class='form-control' name='email'>
				</div>
				<div class='form-group'>
					<label for='username'>Company (Optional): </label> <input type="text" id="company" class='form-control' name='company'>
				</div>
				<div class='form-group'>
					<label for='username'>Username: </label><?=$username_alert?> <input type="text" id="username" class='form-control' name='username'>
				</div>
                <div class='form-group'>
                     <?=$confirm_alert?><label for='password'>Password: </label><?=$password_alert?><input type="password" id="password" class='form-control' name='password'>
                </div>
				<div class='form-group'>
					<label for='password'> Confirm Password: </label> <?=$password2_alert?><input type="password" id="confirm-password" name='confirm-password' class='form-control'>
				</div>
                <input type="submit" value="Submit" class='btn btn-default'> <br><br>
            </form>
        </div>
    </body>
</html>
<?php
    /*
        LOGIN PAGE

        have login script

        after logging in, go to time-clock PAGE

        */

?>
