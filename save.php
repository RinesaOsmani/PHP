<?php

require('db.php');


$stmt = $pdo->prepare("INSERT INTO contact (first_name, last_name, email, phone_number, address)
                           VALUES (:first_name, :last_name, :email, :phone_number, :address)");


$stmt->execute([
    ':first_name' => $_POST['first_name'],
    ':last_name' => $_POST['last_name'],
    ':email' => $_POST['email'],
    ':phone_number' => $_POST['phone_number'],
    ':address' => $_POST['address'],
]);

echo "User saved successfully!";

require('index.php');
