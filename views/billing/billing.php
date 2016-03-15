<?php
    $title = "TAM: Billing";

    include '../includes/header.php';
?>

<header class='main-header'>
    <h1>Billing</h1>
</header>
<div class='interior'>
    <div id="clients">
        <header class="sub">
            Clients
        </header>
        <div id='client-list' class="list-group">
            
        </div>
    </div>
    <div id="time-report">
		<header class="sub">
			Report
		</header>
		<div class="list-group">
			<div class="list-group-item report-item">
				An easy project
			</div>
		</div>
	</div>
    <div id='b-tools'>
        <header class='sub'>
            Tools
        </header>
        <button type='button' class='tool-btn btn btn-info'> Print </button> <br>
        <button type='button' class='tool-btn btn btn-info'> Email </button> <br>
        <button type='button' class='tool-btn btn btn-info'> Edit </button> <br>
        <button type='button' class='tool-btn btn btn-info'> Record Payment </button> <br>
    </div>
</div>
<?php
    include '../includes/footer.php';
?>
