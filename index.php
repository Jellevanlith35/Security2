<?php
session_start();
?>
<html>
<head>
    <title>Security 2</title>
</head>
<body>
<h1>Versleutel bericht</h1>
<form method="POST" action="verwerk_encryptie.php">
    <label>E-mailadres</label><br/>
    <input type="email" placeholder="E-mailadres..." name="emailadres" required/><br/>
    <label>Naam</label><br/>
    <input type="text" placeholder="Naam..." name="naam" required/><br/>
    <label>Bericht</label><br/>
    <textarea rows="5" name="bericht"></textarea><br/>
    <label>Wachtwoord</label><br/>
    <input type="password" placeholder="Wachtwoord..." name="wachtwoord" required/><br/>
    <input type="submit" value="verstuur"/>
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