<form action='../controllers/clients_projects/new_client.php' method='post'>
    <p>Please enter the client's name, and their phone number and/or mailing address.</p>
    <?=$nc_alert?>
    <label for='client_name'>Name: </label><br>
    <input type='text' id='client_name' placeholder='Google; John Smith' name='client_name' required></input><br>
    <label for='phone_number'>Phone Number: </label><br>
    <input type='text' id='phone_number' placeholder='Phone Number' name='phone_number'></input><br>
   <!-- <label for='address'>Mailing Address: </label><br>
    <input type='text' placeholder='Address' name='address'></input><br>-->
    <label for='email'>Email: </label><br>
    <input <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder='Email' name='email'></input><br>
    <input type='submit' class='btn btn-primary'value="Submit">
</form>
