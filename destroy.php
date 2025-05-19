<?php

require('index.php');

$host = "localhost";
$dbname = "myapp";
$user = "root";
$pass = "";

$destroy_id = $_POST["id"];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "DELETE FROM contact WHERE id=" . $destroy_id . ";";



    $pdo->exec($sql);
    echo "Record deleted successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}