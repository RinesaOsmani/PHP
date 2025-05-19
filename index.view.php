<?php

require('index.php');


$stmt = $pdo->prepare("INSERT INTO contact (first_name, last_name, email, phone_number, address, notes)
                           VALUES (:first_name, :last_name, :email, :phone_number, :address, :notes)");


$stmt->execute([
    ':first_name' => $_POST['first_name'],
    ':last_name' => $_POST['last_name'],
    ':email' => $_POST['email'],
    ':phone_number' => $_POST['phone_number'],
    ':address' => $_POST['address'],
    ':notes' => $_POST['notes']
]);

$stmt = $pdo->query("SELECT * FROM contact");
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "User saved successfully!";


foreach ($contacts as $contact): ?>
    <li>
        <a href="/index<?= $contact['id'] ?>" class="text-blue-500 hover:underline">
            <?= htmlspecialchars($contact['first_name']) ?>
            <form id="delete-form" class="hidden" method="POST" action="/destroy">
                <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                <button type="submit" style="color:red;">X</button>
            </form>

        </a>
    </li>
<?php endforeach; ?>
</ul>