<?php
    $title = "PAT: Time Clock";

    include 'includes/header.php';
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
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-controls="collapseOne">
              <h4 class="panel-title">
                  Some Client
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body client-panel">
                  <div class='alert alert-project'>
                    Some Client's project 1
                  </div>
                  <div class='alert alert-project'>
                    Some Client's project 2
                  </div>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <h4 class="panel-title">
                  Some Other Client
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body client-panel">
                  <div class='alert alert-project'>
                    Some Other Client's project 1
                  </div>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <h4 class="panel-title">
                    That Client
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body client-panel">
                  <div class='alert alert-project'>
                    That Client's project 1
                  </div>
                  <div class='alert alert-project'>
                    That Client's project 2
                  </div>
                  <div class='alert alert-project'>
                    That Client's project 3
                  </div>
                  <div class='alert alert-project'>
                    That Client's project 4
                  </div>
                  <div class='alert alert-project'>
                    That Client's project 5
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<?php
    include 'includes/footer.php';
?>
