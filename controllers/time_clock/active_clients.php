<?php
    include "../../models/entry_model.php";
    include '../../models/client_model.php';

    $clients = get_all_clients();
    $i = 1;
        
    $results = get_entry_times();

    debug($results);
    foreach ($results as $client)
    {

    }
    
?>

<?php foreach ($clients as $row): ?>
    
    <?php $client = $row['name']; ?>

    <div class="panel panel-info">
        <div class="panel-heading" role="tab" id="heading<?=$i?>" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" aria-controls="collapse<?=$i?>">
          <h4 class="panel-title">
              <?=$client?>
          </h4>
        </div>
        <div id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$i?>">
          <div class="panel-body client-panel">
                    <div class='alert alert-project'>
                </div>
            </div>
        </div>
      </div>
    <?php
        $i++;
    ?>
<?php endforeach ?>