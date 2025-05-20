<?php
require('db.php');

$stmt = $pdo->query("SELECT * FROM contact");
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$edit_id = $_GET['id'] ?? '';
$contact = false;

if ($edit_id) {
    $stmt = $pdo->prepare("SELECT * FROM contact WHERE id = :id");
    $stmt->execute(['id' => $edit_id]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
<div style="display: flex; gap: 2rem; align-items: flex-start;">
    <div style="flex: 1;">
        <form action=<?php echo $contact ? "update.php" : "save.php"; ?> method="POST">
            <div>
                <label for="first name">First name:</label>
                <input type="text" name="first_name" value="<?= $contact['first_name'] ?? '' ?>"
                    placeholder="First Name" required>
            </div>
            <div>
                <label for="last name">Last name:</label>
                <input type="text" name="last_name" value="<?= $contact['last_name'] ?? '' ?>" placeholder="Last Name"
                    required>
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name="email" value="<?= $contact['email'] ?? '' ?>" placeholder="Email" required>
            </div>
            <div>
                <label>Phone number:</label>
                <input type="tel" name="phone_number" value="<?= $contact['phone_number'] ?? '' ?>"
                    placeholder="Phone Number">
            </div>
            <div>
                <label>Address:</label>
                <input type="text" name="address" value="<?= $contact['address'] ?? '' ?>" placeholder="Address">
            </div>
            <button type="submit"><?php echo $contact ? "Update" : "Save"; ?></button>
        </form>
    </div>
</div>

<h2>All Contacts</h2>
<?php foreach ($contacts as $contact): ?>
    <li>
        <a href="index.php?id=<?= $contact['id'] ?>" class="text-blue-500 hover:underline"> </a>
        <?= htmlspecialchars($contact['first_name']) . ' ' . htmlspecialchars($contact['last_name']) ?>
        <form id="delete-form" class="hidden" method="POST" action="/destroy.php">
            <input type="hidden" name="id" value="<?= $contact['id'] ?>">
            <button type="submit" style="color:red;">Delete</button>
        </form>
        <form method="GET" action="notes.php" style="display: inline;">
            <input type="hidden" name="user_id" value="<?= $contact['id'] ?>">
            <button type="submit" style="color:green;">Notes</button>
        </form>

    </li>
<?php endforeach; ?>