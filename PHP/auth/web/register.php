<?php

require_once 'header.php';

?>

<main>

    <h1>Register</h1>

    <form method="post" action="login.php">

        <label for="login">Login</label>
        <input type="text" name="login" autocomplete="off">
        <label for="password">Password</label>
        <input type="password" name="password" autocomplete="off">

        <button type="submit">Register</button>

    </form>

</main>

<?php require_once 'footer.php';?>