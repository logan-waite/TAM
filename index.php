<?php
    include 'views/includes/header.php';
 ?>
<header class='main-header'>
    <h1>PAT</h1>
</header>
    <div class='interior'>
        <div class='sub'>
            Login
        </div>

        <form action="login.php" method='post'>
            <label for='username'>Username: </label> <input type="text" id="username" name='username'><br>
            <label for='password'>Password: </label> <input type="password" id="password" name='password'><br><br>
            <input type="submit" value="Submit">
        </form>
        Don't have an account yet? <a href="new_user.html">Click Here</a>
    </div>
</body>
</html>
<?php
    /*
        LOGIN PAGE

        have login script

        after logging in, go to time-clock PAGE

        */

?>
