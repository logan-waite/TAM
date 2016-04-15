<?php
    require_once "../../resources/db_connect.php";
    include "client_model.php";
    include "entry_model.php";
    session_start();

    function create_invoice($client_id) // Creates a new invoice for the client
    {
        global $db;
        
        try     // Create new invoice entry
        {
            $query = "INSERT INTO `invoices`
                    (`client_id`, `status_id`, `user_id`) 
                    VALUES (:client_id, 1, :user_id)";
            $result = $db->prepare($query);
            $result->execute(
                array(
                    "client_id" => $client_id,
                    "user_id" => $_SESSION['user_id']
                )
            );
        }
        catch (Exception $e)
        {
            error_log("Insertion Database Exception: $e");
            return 0;
        }
        
        try     // Get id from created invoice
        {
            // invoice entry table: id | invoice_id | entry_id
            $get_query = "SELECT id, created_date
                            FROM invoices
                            WHERE status_id = 1
                            AND user_id = :user_id
                            AND client_id = :client_id
                            ORDER BY id DESC
                            LIMIT 1";
            $get_result = $db->prepare($get_query);
            $get_result->execute(
                array(
                    "client_id" => $client_id, 
                    "user_id" => $_SESSION['user_id']
                )
            );
            $invoice = $get_result->fetch();
        }
        catch (Exception $e)
        {
            error_log("Invoice Retrieval Database Exception: $e");
            return 0;
        }

        $month = date("m", strtotime($invoice['created_date']));
        try     // Get entries from invoice month
        {
            $entry_query = "SELECT entries.id
                            FROM entries
                            JOIN client_project
                                ON client_project.id = entries.cp_id
                            WHERE MONTH(start_time) = :month
                            AND client_project.client_id = :client_id";
            $entry_result = $db->prepare($entry_query);
            $entry_result->execute(
                array(
                    "month" => $month,
                    "client_id" => $client_id
                )
            );
                $entries = $entry_result->fetchAll();
        }
        catch (Exception $e)
        {
            error_log("Entry retrieval error: $e");
        }
        try     // Insert entry and invoice ids into invoice_entry table
        {
            $insert_query = "INSERT INTO invoice_entry
                            (invoice_id, entry_id)
                            VALUES
                            (:invoice_id, :entry_id)";
            $insert_result = $db->prepare($insert_query);
            
            foreach ($entries as $entry)
            {
                $insert_result->execute(
                    array(
                        "invoice_id" => $invoice['id'], 
                        "entry_id" => $entry['id']
                    )
                );
            }
        }
        catch (Exception $e)
        {
            error_log("insertion error: $e");
        }
        
    }

    function delete_invoice()
    {
        
        
    }

    function get_active_invoice($client_id)   // Returns an array containing client id, name, hours worked, and amount billed
    {
        global $db;
        
        $data['client'] = get_specific_client($client_id);
        $projects = get_project_entry_times($client_id);
        $data['projects'] = $projects;
        
        $query = "SELECT pay_rate
                    FROM projects
                    JOIN client_project
                        ON client_project.project_id = projects.id
                    WHERE name = :project_name
                    AND client_project.client_id = :client_id";
        $result = $db->prepare($query);
        
        $total_pay = 0.00;
        foreach($projects as $key => $value)
        {
            $result->execute(
                array(
                    "project_name" => $key,
                    "client_id" => $client_id
                )
            );
            $pay_rate = ($result->fetch())['pay_rate'];
            $value = number_format(time_to_decimal($value), 2);
            $pay = $value * $pay_rate;
            $total_pay += $pay;
            $project_pay[$key] = money_format('%!i', $pay);
            
        }
        $data['pay'] = $project_pay;
        $data['total_pay'] = money_format('%!i', $total_pay);
        return $data;
    }

    function update_invoice()
    {
        
    }

?>