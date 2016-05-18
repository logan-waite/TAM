<?php

    include "../../models/invoice_model.php";
    $client_id = trim(filter_input(INPUT_POST, 'client_id', FILTER_SANITIZE_NUMBER_INT));

    $invoice = get_active_invoice($client_id);
    //debug($invoice);
    if (empty($invoice['projects']))
    {
        $has_entries = FALSE;
    }
    else
    {
        $has_entries = TRUE;
    }
?>

<header class="sub">
	Report
</header>
<div class="list-group">
    <?php if ($has_entries): ?>
        <?php foreach($invoice["projects"] as $project_name => $time):?>
            <div class="list-group-item report-item">
                <?php echo $project_name . " -- " . $time . " -- $" . $invoice['pay'][$project_name]; ?>
            </div>
        <?php endforeach; ?>
        <div class="list-group-item list-group-item-info" id='pay-total'>
            Total: $ <?php echo $invoice['total_pay']; ?>
        </div>
    <?php else: ?>
        <div class="list-group-item list-group-item-warning">
            No work has been done for this client yet!
        </div>
    <?php endif; ?>
</div>
