
        <div class='footer'>
        </div>
<script>
    $(document).ready(function() {
        var alert = "<?=$float_alert?>";
        var type = "";
        var message = "";
        
        if (alert.length != 0)
        {
            switch (alert)
            {
                // Successful Add client
                case "ac=y":
                    type = 'success';
                    message = 'Client added successfully';
                    break;
                // Unsuccessful add client
                case "ac=n":
                    type = 'danger';
                    message = 'Unable to add client';
                    break;
                // Succesful add project
                case "ap=y":
                    type = 'success';
                    message = 'Project added successfully';
                    break;
                // Unsuccessful add project
                case "ap=n":
                    type = 'danger';
                    message = 'Unable to add project';
                    break;
                // Successful assign project to client
                case "cp=y":
                    type = 'success';
                    message = 'Project successfully assigned';
                    break;
                // Unsuccessful assign project to client
                case "cp=n":
                    type = 'danger';
                    message = 'Unable to assign project';
                    break;
                // Successful delete client
                case "dc=y":
                    type = 'success';
                    message = 'Client successfully deleted';
                    break;
                // Unsuccessful delete client
                case "dc=n":
                    type = 'danger';
                    message = 'Unable to delete client';
                    break;
                // Successful delete client
                case "dp=y":
                    type = 'success';
                    message = 'Project successfully deleted';
                    break;
                // Unsuccessful delete client
                case "dp=n":
                    type = 'danger';
                    message = 'Unable to delete project';
                    break;
                default:
                    type = 'warning';
                    message = 'An unknown error occurred';
                    break;
            }
         $('#alert-box').append("<p class='alert alert-" + type + "'>" + message + "</p>");
            
        setTimeout(function() {
          $('#alert-box p').fadeOut(600);  
        }, 1000);
        }
    });
</script>
    </body>
</html>
