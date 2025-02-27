<?php

require_once 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH');

$people = [];

for ($i = 0; $i < 5; $i++) {
    $firstName = $faker->firstName;  
    $lastName = $faker->lastName;    
    $middleName = $faker->lastName; 

    $fullName = $firstName . ' ' . $middleName . ' ' . $lastName;

    $email = $faker->email;
    $phoneNumber = '+63' . $faker->randomNumber(9, true); 
    $address = $faker->address;
    $birthDate = $faker->date('Y-m-d');
    $jobTitle = $faker->jobTitle;  

    $people[] = [
        'fullName' => $fullName,
        'email' => $email,
        'phoneNumber' => $phoneNumber,
        'address' => $address,
        'birthDate' => $birthDate,
        'jobTitle' => $jobTitle
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filipino Full Names and Details</title>
</head>
<body>

<h2>Filipino Full Names and Details</h2>

<table border="1">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Birthdate</th>
            <th>Job Title</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($people as $person): ?>
        <tr>
            <td><?php echo htmlspecialchars($person['fullName']); ?></td>
            <td><?php echo htmlspecialchars($person['email']); ?></td>
            <td><?php echo htmlspecialchars($person['phoneNumber']); ?></td>
            <td><?php echo htmlspecialchars($person['address']); ?></td>
            <td><?php echo htmlspecialchars($person['birthDate']); ?></td>
            <td><?php echo htmlspecialchars($person['jobTitle']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>