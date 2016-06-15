<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "security2";

if(!empty($_POST["emailadres"]) && !empty($_POST["wachtwoord"])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $emailadres = $conn->real_escape_string($_POST["emailadres"]);
    $wachtwoord = $conn->real_escape_string($_POST["wachtwoord"]);
    
    $saltWachtwoord = "Dit is een encryptie tekst voor het wachtwoord";
    $wachtwoord = md5($saltWachtwoord.$wachtwoord.$saltWachtwoord);
    $result = mysqli_query($conn, "SELECT CAST(AES_DECRYPT(bericht, '1234567890') AS CHAR(255)) bericht FROM encryptie WHERE emailadres = '$emailadres' AND wachtwoord='$wachtwoord'");
    $rows = mysqli_num_rows($result);
    if($rows > 0) {
        $row = $result->fetch_array();
        $_SESSION["ingelogd"] = true;
        $_SESSION["bericht"] = $row["bericht"];
        echo "Inloggen gelukt";
    }
    else {
        echo "Account gegevens bestaan niet";
    }
    $conn->close();
    echo "<hr>";
    echo '<a href="index.php">Index</a>';
}
?>