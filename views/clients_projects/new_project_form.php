<form action='../../controllers/clients_projects/new_project.php' method='post'>
    <?=$np_alert?>
    <label for='project_title'>Project Title: </label><br>
    <input type='text' placeholder='Project Title' name='project_title' id='project_title'><br>
    <label for='description'>Description: </label><br>
    <textarea placeholder='Description' name='description' id='description'></textarea><br>
    <label for='pay_rate'>Pay Rate ($): </label><br>
    <input type='text' placeholder="00.00" name='pay_rate' id='pay_rate'><br>
    <label for='recurring'>Recurring: </label>
    <input type='checkbox' id='recurring' name='recurring'>
    <select id='interval' name='interval'>
        <option value='w'>Weekly</option>
        <option value='b'>Bi-Weekly</option>
        <option value='m'>Monthly</option>
        <option value='q'>Quarterly</option>
        <option value='y'>Yearly</option>
    </select><br>
    <input type='submit' class='btn btn-primary'value="Submit">
</form>
