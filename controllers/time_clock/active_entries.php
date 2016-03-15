<?php
    date_default_timezone_set("America/Denver");

    include "../../models/entry_model.php";

    $success = get_active_entries();

    if ($success)
    {
        $now = new DateTime();
        $id = $success['id'];
        $start_time = new DateTime($success['start_time']);
        $project_title = $success['name'];

        $diff = $start_time->diff($now);

        $time_string = $diff->h.":".$diff->i.":".$diff->s;
        $result = $id.",".$time_string.",".$project_title;
        error_log($result);
        echo $result;
    }
    else
    {
        echo 0;
    }
?>