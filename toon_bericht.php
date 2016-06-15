<?php
session_start();
?>
<html>
    <head>
        <title>Security 2</title>
    </head>
    <body>
        <?php
        if(isset($_SESSION["ingelogd"]) && $_SESSION["ingelogd"])
        {
            echo "<h1>Bericht</h1>";
            echo "<p>". $_SESSION["bericht"] . "</p>";
        }
        ?>
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