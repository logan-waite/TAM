<?php
    //require_once ('../../controllers/db_connect.php');
    $page = trim(substr($title, 4));
    $tc_active = "";
    $cp_active = "";
    $b_active = "";

    if ($page === "Time Clock")
    {
        $tc_active = "class='active'";
        $cp_active = "";
        $b_active = "";
    }
    elseif ($page == "Clients and Projects")
    {
        $tc_active = "";
        $cp_active = "class='active'";
        $b_active = "";
    }
    elseif ($page == "Billing")
    {
        $tc_active = "";
        $cp_active = "";
        $b_active = "class='active'";
    }

?>
<html>
    <head>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
        <link rel='stylesheet' href='../resources/bootstrap/css/bootstrap.min.css' type="text/css">
        <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap-theme.min.css" type="text/css">
        <link rel="stylesheet" href="../resources/font-awesome-4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../resources/css/stylesheet.css">
        <script src="../resources/jquery/jquery-2.1.4.min.js"></script>
        <script src="../resources/jquery/jquery-ui-1.11.4/jquery-ui.min.js"></script>
        <script src="../resources/bootstrap/js/jquery.min.js"></script>
        <script src="../resources/bootstrap/js/bootstrap.min.js"></script>
        <script src="../resources/js/jquery.maskedinput.js" type="text/javascript"></script>
        <script type="text/javascript" src="../controllers/views.js"></script>
        <title><?=$title?></title>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">PAT</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li id='time_clock' <?=$tc_active?>><a href="time_clock.php">Time Clock</a></li>
                        <li id='clients_projects'<?=$cp_active?>><a href="clients_projects.php">Clients and Projects</a></li>
                        <li id='billing'<?=$b_active?>><a href="billing.php">Billing</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
