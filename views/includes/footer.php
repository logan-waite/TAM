
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
                // Successfull Add client
                case "ac=y":
                    type = 'success';
                    message = 'Client added successfully';
                    break;
                // Unsuccessfull add client
                case "ac=n":
                    type = 'danger';
                    message = 'Unable to add client';
                    break;
                // Succesfull add project
                case "ap=y":
                    type = 'success';
                    message = 'Project added successfully';
                    break;
                // Unsuccessfull add project
                case "ap=n":
                    type = 'danger';
                    message = 'Unable to add project';
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
