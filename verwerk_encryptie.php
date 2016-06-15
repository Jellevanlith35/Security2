<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "security2";

if(!empty($_POST["naam"]) && !empty($_POST["emailadres"]) && !empty($_POST["wachtwoord"]) && !empty($_POST["bericht"])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $naam = $conn->real_escape_string($_POST["naam"]);
    $emailadres = $conn->real_escape_string($_POST["emailadres"]);
    $wachtwoord = $conn->real_escape_string($_POST["wachtwoord"]);
    $bericht = $conn->real_escape_string($_POST["bericht"]);
    
    $result = mysqli_query($conn, "SELECT * FROM encryptie WHERE emailadres = '$emailadres'");
    $rows = mysqli_num_rows($result);
    if($rows == 0) {
        $saltWachtwoord = "Dit is een encryptie tekst voor het wachtwoord";
        $saltBericht = "1234567891234567";
        
        $wachtwoord = md5($saltWachtwoord.$wachtwoord.$saltWachtwoord);
       
        $sql = "INSERT INTO encryptie (naam,emailadres, wachtwoord, bericht)
        VALUES ('$naam', '$emailadres', '$wachtwoord',AES_ENCRYPT('$bericht','1234567890'))";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {
        echo "Emailadres already exists";
    }
    $conn->close();
    echo "<hr>";
    echo '<a href="index.php">Index</a>';
}
?>