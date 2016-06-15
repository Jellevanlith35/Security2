<?php
session_start();
?>
<html>
<head>
    <title>Security 2</title>
</head>
<body>
<h1>Login</h1>
<form method="POST" action="verwerk_login.php">
    <label>E-mailadres</label><br/>
    <input type="email" placeholder="E-mailadres..." name="emailadres" required/><br/>
    <label>Wachtwoord</label><br/>
    <input type="password" placeholder="Wachtwoord..." name="wachtwoord" required/><br/>
    <input type="submit" value="login"/>
</form>
<hr>
<?php

    if(isset($_SESSION["ingelogd"]) && $_SESSION["ingelogd"]) {
        echo '<a href="toon_bericht.php">Toon bericht</a><br/>';
        echo '<a href="verwerk_uitloggen.php">Uitloggen</a><br/>';
    }
    else 
        echo '<a href="login.php">Login</a><br/>';
?>
</body>
</html>