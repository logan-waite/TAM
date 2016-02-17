<?php
    include 'includes/header.php';
?>

<header class='main-header'>
    <h1>Billing</h1>
</header>
<div class='interior'>
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
    include 'includes/footer.php';
?>
