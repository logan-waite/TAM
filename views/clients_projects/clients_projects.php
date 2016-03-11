<?php
    $title = "PAT: Clients and Projects";
    $response = '';

    if (!empty($_SERVER['QUERY_STRING'])) {
        $response = $_SERVER['QUERY_STRING'];
    } else {
        $nc_pane = "";
        $nc_alert = "";
        $np_pane = "";
        $np_alert = "";
    }

    switch ($response) {
        case "nc=n":
            $nc_pane = "in";
            $nc_alert = "<p class='alert alert-warning'> Please fill in the phone number and/or the address</p>";
            break;
        case "np=n":
            $np_pane = "in";
            $np_alert = "<p class='alert alert-warning'> All fields are required. </p>";
            break;
        default:
        $nc_pane = "";
        $nc_alert = "";
        $np_pane = "";
        $np_alert = "";
        $float_alert = $_SERVER['QUERY_STRING'];
    }


    include '../includes/header.php';
?>

<header class='main-header'>
    <h1>Clients and Projects</h1>
</header>
<div class="interior">
	<div id="clients">
		<header class="sub">
			Clients
		</header>
        <div id='client-sort' class='sort-tabs'>
            <div class='active'>All Clients <i class='fa fa-chevron-down'></i></div>
            <div>Recent <i class='fa fa-chevron-down'></i></div>
        </div>
		<div id='client-list' class="list-group">

		</div>
	</div>
	<div id="projects">
		<header class="sub">
			Projects
		</header>
        <div id='project-sort' class='sort-tabs'>
            <div  class='active'>All Projects <i class='fa fa-chevron-down'></i></div>
            <div>Recent <i class='fa fa-chevron-down'></i></div>
        </div>
		<div id='project-list' class="list-group">

		</div>
	</div>
    <div id='cp-tools'>
        <header class='sub'>
            Tools
        </header>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-controls="collapseOne">
              <h4 class="panel-title">
                  New Client
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse <?=$nc_pane?>" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body tool-panel">
                  <?php
                        include '../clients_projects/new_client_form.php';
                   ?>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-controls="collapseTwo">
              <h4 class="panel-title">
                  New Project
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse <?=$np_pane?>" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body tool-panel">
                  <?php
                        include '../clients_projects/new_project_form.php';
                   ?>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <h4 class="panel-title">
                  Assign Project to Client
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body tool-panel">
                  <?php
                        include '../clients_projects/project_to_client_form.php';
                   ?>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              <h4 class="panel-title">
                    Delete Project
              </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
              <div class="panel-body tool-panel">
                  <?php
                        include '../clients_projects/delete_project_form.php';
                   ?>
              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              <h4 class="panel-title">
                    Delete Client
              </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
              <div class="panel-body tool-panel">
                  <?php
                        include '../clients_projects/delete_client_form.php';
                   ?>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<?php
    include '../includes/footer.php';
?>
