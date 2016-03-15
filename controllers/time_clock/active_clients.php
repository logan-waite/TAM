<?php
    include "../../models/entry_model.php";
    include '../../models/client_model.php';

    $clients = get_active_clients();
    $i = 1;
        
    
?>

<?php foreach ($clients as $row): ?>
    
    <?php $client = $row['name']; ?>

    <?php
        $results = get_project_entry_times($row['id']);
        //debug($results);
    ?>

    <div class="panel panel-info">
        <div class="panel-heading" role="tab" id="heading<?=$i?>" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" aria-controls="collapse<?=$i?>">
          <h4 class="panel-title">
              <?=$client?>
        </div>
        <div id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$i?>">
          <div class="panel-body client-panel">
            <?php foreach($results as $key => $value): ?>
              <div class='alert alert-project'>
                    <?=$key?> -- <?=$value?>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    <?php
        $i++;
    ?>
<?php endforeach ?>