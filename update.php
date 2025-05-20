<?php

require('db.php');

$stmt = $pdo->prepare("UPDATE contact SET 
    first_name = :first_name, 
    last_name = :last_name, 
    email = :email, 
    phone_number = :phone_number, 
    address = :address");

$stmt->execute([
    ':first_name' => $_POST['first_name'],
    ':last_name' => $_POST['last_name'],
    ':email' => $_POST['email'],
    ':phone_number' => $_POST['phone_number'],
    ':address' => $_POST['address']
]);

require('index.php');
?>