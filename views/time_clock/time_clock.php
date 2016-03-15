<?php
    $title = "TAM: Time Clock";

    include '../includes/header.php';
?>

<header class='main-header'>
    <h1>Time Clock</h1>
</header>

<div class='interior'>
    <form id='clock-out' action='../controllers/clock_out.php' method='post'>
        <input type="submit" id="clock-button" class="btn btn-danger" value='Clock Out'></iinput>
        <input type='hidden' value='23:59:59' name='time'>
        <div id="clock"> 0:00:00 </div>
    </form>
    <form id='clock-in' action='../controllers/time_clock/clock_in.php' method='post'>
        <select id='choose-client' name='choose-client' class="btn btn-info btn-select"><span class="caret"></span>
            <option value='0'>Select Client</option>
        </select> <br>
        <select id="choose-project" name='choose-project' class="btn btn-info btn-select">
            <option value='0'>Select Project</option>
        </select> <br>
        <input type="submit" value="Clock In" class="btn btn-success" style='margin-top: 0;'>
    </form>
    <div id="current-project">
        Sample Project goes here
    </div>
    <div id='project-wrapper'>
        <header class='sub' id='total-hours'>
            Total Hours Accumulated
        </header>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
                include "../../controllers/time_clock/active_clients.php";
            ?>
        </div>
    </div>
</div>

<?php
    include '../includes/footer.php';
?>
