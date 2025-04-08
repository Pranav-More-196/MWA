<?php
// admin_dashboard.php

$host = "localhost";
$user = "root";
$password = ""; // Change this if your DB has a password
$database = "event_registration";

// Connect to the database
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM registrations ORDER BY registered_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Registrations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f3;
            padding: 40px;
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #0a3d62;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #2980b9;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h2>Admin Dashboard - Event Registrations</h2>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Event</th>
            <th>Type</th>
            <th>Uploaded ID</th>
            <th>Registered At</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['event_name'] ?></td>
            <td><?= $row['attendee_type'] ?></td>
            <td><a href="uploads/<?= $row['upload_id'] ?>" target="_blank">View ID</a></td>
            <td><?= $row['registered_at'] ?></td>
        </tr>
        <?php } ?>

    </table>

</body>
</html>

<?php $conn->close(); ?>