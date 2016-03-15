<?php
    include '../../models/client_model.php';
    include '../../models/project_model.php';
    
    $action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING));

    if($action == "load") 
    {
        $data = trim(filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING));
        
        if ($data == "clients")
        {
            $clients = get_all_clients();
            $id_string = "";
            $name_string = "";
            
            foreach($clients as $item)
            {
                $id_string .= $item['id'] . ",";
                $name_string .= $item['name'] . ",";
            }
            
            $info = $id_string . "/" . $name_string;
            echo $info;
        }
        else if ($data == "projects")
        {
            $projects = get_all_projects();
            
            $id_string = "";
            $name_string = "";
            
            foreach($projects as $item)
            {
                $id_string .= $item['id'] . ",";
                $name_string .= $item['name'] . ",";
            }
            
            $info = $id_string . "/" . $name_string;
            echo $info;
        }
    }
    else if ($action == 'choose-client')
    {
        $client_id = trim(filter_input(INPUT_POST, 'client_id', FILTER_SANITIZE_NUMBER_INT));
                
        $projects = get_client_projects($client_id);
        
        $project_string = "";
        $id_string = "";
        
        foreach($projects as $item)
        {  
            $id_string .= $item['id'] . ",";
            $project_string .= $item['name'] . ",";
        }
        $result = $id_string."/".$project_string;
        echo $result;
    }
 ?>
