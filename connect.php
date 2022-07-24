<?php 
try {
    $databaseconnection = new PDO("mysql:host=localhost;dbname=databasen;charset=UTF8", "root", "");
} catch (PDOException $error) {
    echo "Connection error <br/>", $error->getMessage();
}

?>