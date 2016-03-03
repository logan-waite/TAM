<html>
<?php    
    if (!empty($_SERVER['QUERY_STRING'])) {
        $invalid = "<p class='alert alert-danger'> Invalid username or password</p>";
    } else {
        $invalid = "";
    }
 ?>
    <head>
        <link rel='stylesheet' href='resources/bootstrap/css/bootstrap.min.css' type="text/css">
        <style>
        header {
            text-align: center;
            border-bottom: 1px solid #DADADA;
            width: 100%;
            font-family: fantasy, sans-serif;
            margin-bottom: 5%;
        }

        #page-organizer {
            width: 1000px;
            padding-left: 10px;
        }

        .sub {
            position: relative;
            width: 100%;
            border-bottom: 0;
            margin: 0px;
            padding-top: 12px;
            padding-bottom: 6px;
            font-size: 24px;
            margin-bottom: 15px;

        }

        .main-header {
            position: absolute;
            top: 50px;
            left: -50%;
            margin-left: 50%;
        }
        .interior {
            position: absolute;
            width: 50%;
            height: 100%;
            top: 125px;
            left: 50%;
            margin-left: -25%;
            padding: 10px;
        }

        .interior form {
            position: relative;
            left: 50%;
            margin-left: -102px;
            width: 205px;
            text-align: center;
            border: 1px solid #DDD;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 3px 3px 3px #AAA;
        }
        </style>
    </head>
    <body>
        <header class='main-header'>
            <h1>PAT</h1>
        </header>
        <div class='interior'>
            <header class='sub'>
                Login
            </header>

            <form action="controllers/user/login.php" method='post'>
                <?=$invalid?>
                <div class='form-group'>
                    <label for='username'>Username: </label> <input type="text" id="username" class='form-control' name='username'>
                </div>
                <div class='form-group'>
                    <label for='password'>Password: </label> <input type="password" id="password" class='form-control' name='password'>
                </div>
                <input type="submit" value="Submit" class='btn btn-default'> <br><br>
                Don't have an account yet? <a href="views/login/new_user.php">Click Here</a>

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
