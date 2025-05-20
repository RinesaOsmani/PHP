<?php

require('db.php');

$destroy_id = $_POST["id"];

try {
    $stmt = $pdo->prepare("DELETE FROM contact WHERE id = :id");
    $stmt->execute(['id' => $destroy_id]);
    echo "Record deleted successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

require('index.php');