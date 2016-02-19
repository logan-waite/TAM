<?php
    $response = $_SERVER[QUERY_STRING];
    switch ($response) {
        case "nc=n":
            $nc_pane = "in";
            $nc_alert = "<p class='alert alert-warning'> Please fill in the phone number and/or the address</p>";
        break;
        default:
            $nc_pane = "";
            $nc_alert = "";

    }


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
		<div class="list-group">
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
                  <form action='../controllers/new_client.php' method='post'>
                      <p>Please enter the client's name, and their phone number and/or mailing address.</p>
                      <?=$nc_alert?>
                      <label for='client_name'>Name: </label><br>
                      <input type='text' id='client_name' placeholder='Google; John Smith' name='client_name' required></input><br>
                      <label for='phone_number'>Phone Number: </label><br>
                      <input type='text' id='phone_number' placeholder='Phone Number' name='phone_number'></input><br>
                     <!-- <label for='address'>Mailing Address: </label><br>
                      <input type='text' placeholder='Address' name='address'></input><br>-->
                      <label for='email'>Email: </label><br>
                      <input <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder='Email' name='email'></input><br>
                      <input type='submit' class='btn btn-primary'value="Submit">
                  </form>
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
              <div class="panel-body tool-panel">
                  <form>
                      <input type='text' placeholder='Project Title' name='project_title'>
                      <textarea placeholder='Description' name='description'></textarea>
                      <input type='text' placeholder="Pay Rate" name='pay_rate'>
                      <input type='submit' class='btn btn-primary'value="Submit">
                  </form>
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

              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<?php
    include 'includes/footer.php';
?>
