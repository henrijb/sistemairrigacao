<?php
$host = "db";
$username = "root";
$password = "102030";
$db = "sistemairrigacao";
try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, 
    $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION);
echo '<h2>Conectado com sucesso.<h2>';
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>