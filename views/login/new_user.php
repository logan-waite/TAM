<html>
    <head>
        <link rel='stylesheet' href='../../resources/bootstrap/css/bootstrap.min.css' type="text/css">
        <link rel='stylesheet' href='../../resources/css/stylesheet.css' type="text/css">
        <script src='../../resources/jquery/jquery-2.1.4.min.js'></script>
        <script>
        $(document).ready(function() {
            $('#confirm-password').blur(function() {
                var password = $('#password').val();
                var password2 = $('#confirm-password').val();

                if (password != password2) {
                    $('#confirm-alert').html(
                        "<p class='alert alert-warning'>Passwords must match</p>"
                    );
                } else {
                    $('#confirm-alert').html(
                        ""
                    );
                }

            });
        })
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
            <h1>PAT</h1>
        </header>
        <div class='interior'>
            <header class='sub'>
                New User
            </header>

            <form action="../../controllers/new_user.php" method='post'>
				<div class='form-group'>
                    <label for='username'>Name: </label> <input type="text" id="name" class='form-control' name='name'>
                </div>
				<div class='form-group'>
					<label for='username'>Email: </label> <input type="text" id="email" class='form-control' name='email'>
				</div>
				<div class='form-group'>
					<label for='username'>Company (Optional): </label> <input type="text" id="company" class='form-control' name='company'>
				</div>
				<div class='form-group'>
					<label for='username'>Username: </label> <input type="text" id="username" class='form-control' name='username'>
				</div>
                <div id='confirm-alert'></div>
                <div class='form-group'>
                    <label for='password'>Password: </label> <input type="password" id="password" class='form-control' name='password'>
                </div>
				<div class='form-group'>
					<label for='password'> Confirm Password: </label> <input type="password" id="confirm-password" class='form-control'>
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
