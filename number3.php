<?php
require 'vendor/autoload.php'; // Load Faker

$faker = Faker\Factory::create();
$faker->seed(123); // Optional: Ensures consistent results for testing

// Generate 10 fake user accounts
$users = [];
for ($i = 0; $i < 10; $i++) {
    $fullName = $faker->name();
    $email = $faker->unique()->email();
    $username = strtolower(explode('@', $email)[0]); // First part of email as username
    $password = hash('sha256', $faker->password()); // Encrypt password using SHA-256
    $accountCreated = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s');

    $users[] = [
        'user_id' => $faker->uuid(),
        'full_name' => $fullName,
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'account_created' => $accountCreated
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake User Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4"> Fake User Accounts</h2>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password (SHA-256 Encrypted)</th>
                <th>Account Created</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $index => $user): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $user['user_id'] ?></td>
                    <td><?= htmlspecialchars($user['full_name']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td class="text-truncate" style="max-width: 200px;"><?= $user['password'] ?></td>
                    <td><?= $user['account_created'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>