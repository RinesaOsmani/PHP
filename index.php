<form action="index.view.php" method="POST">
    <div>
        <label for="first name">First name:</label>
        <input type="text" name="first_name" placeholder="First Name" required>
    </div>
    <div>
        <label for="last name">Last name:</label>
        <input type="text" name="last_name" placeholder="Last Name" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" placeholder="Email" required>
    </div>
    <div>
        <label>Phone number:</label>
        <input type="tel" name="phone_number" placeholder="Phone Number">
    </div>
    <div>
        <label>Address:</label>
        <input type="text" name="address" placeholder="Address">
    </div>
    <div>
        <label>Notes:</label>
        <textarea name="notes" placeholder="Notes"></textarea>
    </div>

    <button type="submit">Save Contact</button>
</form>

<?php

$host = "localhost";
$dbname = "myapp";
$user = "root";
$pass = "";


$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$stmt = $pdo->query("SELECT * FROM contact");
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "User saved successfully!";


foreach ($contacts as $contact): ?>
    <li>
        <a href="/index<?= $contact['id'] ?>" class="text-blue-500 hover:underline">
            <?= htmlspecialchars($contact['first_name']) ?>
            <form id="delete-form" class="hidden" method="POST" action="/destroy">
                <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                <button type="submit" style="color:red;">delete</button>
            </form>

        </a>
    </li>
<?php endforeach; ?>

<!-- <form id="delete-form" class="hidden" method="POST" action="/destroy.php">

    <input type="hidden" name="id" value="">
    <button type="submit">Delete</button>
</form>
<form id="delete-form" class="hidden" method="POST" action="/destroy.php">
    <p>Filan Fistekja</p>
    <input type="hidden" name="id" value="3">
    <button type="submit">Delete</button>
</form> -->