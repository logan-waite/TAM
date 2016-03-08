$(document).ready(function() {
    /*
    *   Gets information from project_client controller;
    *   inserts options into appropriate select elements;
    *   creates client list;
    */
    var clients;
    var projects;
    $.post('../controllers/clients_projects/project_client.php', {action:'load', data:'projects'}, function(result) {
        var allResults = result.split('/');
        var values = allResults[0].split(',');
        var names = allResults[1].split(',');
        names.splice(-1,1);
        values.splice(-1,1);
        
        for(var i = 0; i < values.length; i++)
            {
                $('#project-select').append($('<option>', {
                    value: values[i],
                    text: names[i]
                }));
                
                $('#delete_p').append($('<option>', {
                    value: values[i],
                    text: names[i]
                }));
            }
    });
    
    $.post('../controllers/clients_projects/project_client.php', 
           {action:'load', data:'clients'}, 
           function(result) {
                var allResults = result.split('/');
                var values = allResults[0].split(',');
                var names = allResults[1].split(',');
                names.splice(-1,1);
                values.splice(-1,1);
        
                for(var i = 0; i < values.length; i++)
                    {
                        $('#client-select').append($('<option>', {
                            value: values[i],
                            text: names[i]
                        }));
                        
                        $('#delete_c').append($('<option>', {
                            value: values[i],
                            text: names[i]
                        }));
                        
                        $('#client-list').append($(
                            "<a class='list-group-item' value='"+values[i]+"'>" + 
                            names[i] +
                            '</a>')
                        );
                    }    
            });
    
    /*
    *   Alternates between clock-in and clock-out, sends data to controller
    */
    // When "clock-in" button is clicked, submits data to form and changes to the clock-out button with timer
    $("#clock-in").submit(function (event) {
        event.preventDefault();
        
        var data = $('#clock-in').serialize();
        $.post('../controllers/time_clock/clock_in.php', data, function (result) {
            $('.alert-warning').remove();
            console.log(result);
            if (result == -1)
            {
                $('#client-select').before("<p class='alert alert-warning'>Please choose both a client and a project</p>");        
            }
            else
            {
                $('#clock-in').css('display', 'none');
                $('#clock-out').css('display', 'block');
                $('#current-project').css('display', 'block');                
            }

        });
    });
    
    // When "clock-out" button is clicked, submit time to form and change to clock-in
    $('#clock-out').submit(function (event) {
        event.preventDefault();
        
        $.post("../controllers/time_clock/clock_out.php", function () {
            $('#clock-out').css('display', 'none');
            $('#current-project').css('display', 'none');
            $('#clock-in').css('display', 'block');
        });
    });
    
    /*
    *   When forms are submitted, make sure they actually chose something.
    */
    $('#project-to-client').submit(function(event) {
        $('.in p').remove();
        if ($('#client-select').val() == 0)
            {
                event.preventDefault();
                $('#project-to-client').before(
                    "<p class='alert alert-warning'>Please select a client.</p>");
            }
        else if ($('#project-select').val() == 0)
            {
                event.preventDefault();
                $('#project-to-client').before(
                    "<p class='alert alert-warning'>Please select a project.</p>");
            }
    });
    
    $('#delete-project').submit(function(event) {
        $('.in p').remove();
        if ($('#delete_p').val() == 0)
            {
                event.preventDefault();
                $('#delete-project').before(
                    "<p class='alert alert-warning'>Please select a project.</p>");
            }
    });
    
    $('#delete-client').submit(function(event) {
        $('.in p').remove();
        if ($('#delete_c').val() == 0)
            {
                event.preventDefault();
                $('#delete-client').before(
                    "<p class='alert alert-warning'>Please select a client.</p>");
            }
    });
    
    /*
    *   On click, changes active client
    *   Sends request for project associated with client
    *   Displays selected projects
    */
    $("#client-list").on("click", ".list-group-item:not(.active)", "", function (event) {
        // Shows which list-group-item (client) is currently active, and changes on click
        $(".active", event.delegateTarget).removeClass("active");
        $(this).addClass("active");
        var client_id = $(this).attr('value');
        $.post("../controllers/clients_projects/project_client.php", 
               {action:'choose-client', client_id:client_id}, 
               function(result) {
                $('#project-list .list-group-item').remove();
            
                var names = result.split(',');
                names.splice(-1,1);
        
                for(var i = 0; i < names.length; i++)
                    {
                        $('#project-list').append($(
                            "<div class='list-group-item'>" + 
                            names[i] +
                            '</a>')
                        );
                    }            
                $('#project-sort div').removeClass('active')
        });
    });
    
});