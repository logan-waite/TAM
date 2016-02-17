<?php
    include 'includes/header.php';
?>
<header class='main-header'>
    <h1>Clients and Projects</h1>
</header>
<div class="interior">
	<div id="clients">
		<header class="sub">
			Clients
		</header>
		<div class="sidebar list-group">
			<a href="#" class="list-group-item">First Client</a>
			<a href="#" class="list-group-item active">Another Client</a>
			<a href="#" class="list-group-item">A Third Client</a>
			<a href="#" class="list-group-item">An Important Client</a>
		</div>
	</div>
	<div id="projects">
		<header class="sub">
			Projects
		</header>
		<div class="list-group">
			<div class="list-group-item">
				An easy project
			</div>
		</div>
	</div>
    <div id='tools'>
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
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body client-panel">

              </div>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-controls="collapseTwo">
              <h4 class="panel-title">
                  New Project
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body client-panel">

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
              <div class="panel-body client-panel">

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
              <div class="panel-body client-panel">

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
              <div class="panel-body client-panel">

              </div>
            </div>
          </div>
        </div>
    </div>
</div>
