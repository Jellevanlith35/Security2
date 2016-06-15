<?php
session_start();
if(isset($_SESSION["ingelogd"]) && $_SESSION["ingelogd"]) {
    session_destroy();
    echo "uitloggen gelukt";
}
else 
    echo "uitloggen mislukt";
    
echo "<hr>";
echo '<a href="index.php">Index</a>';
?>