<?php
require('db.php');

$user_id = $_GET['user_id'] ?? '';
$contact_note = $_POST['contact_notes'] ?? '';

if ($user_id && $contact_note) {
    $stmt = $pdo->prepare("INSERT INTO contact_notes (user_id, contact_notes) VALUES (:user_id, :contact_notes)");
    $stmt->execute([
        ':user_id' => $user_id,
        ':contact_notes' => $contact_note
    ]);
    echo "<p style='color: green;'>Note saved successfully.</p>";
}


$notes = [];
if ($user_id) {
    $stmt = $pdo->prepare("SELECT * FROM contact_notes WHERE user_id = :user_id ORDER BY id DESC");
    $stmt->execute(['user_id' => $user_id]);
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>


<form method="POST" action="?user_id=<?= htmlspecialchars($user_id) ?>">
    <label>Note:</label>
    <input type="text" name="contact_notes" placeholder="Enter note" required>
    <button type="submit">Add Note</button>
</form>


<h3>Contact Notes</h3>
<ul>
    <?php foreach ($notes as $note): ?>
        <li><?= htmlspecialchars($note['contact_notes']) ?></li>
    <?php endforeach; ?>
</ul>