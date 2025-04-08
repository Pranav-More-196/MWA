<?php
$servername = "localhost";
$username = "root";  // Change if necessary
$password = "";      // Change if necessary
$dbname = "event_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$target_file = $target_dir . basename($_FILES["upload_id"]["name"]);
move_uploaded_file($_FILES["upload_id"]["tmp_name"], $target_file);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO registrations (first_name, last_name, email, phone, event_name, attendee_type, upload_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $first_name, $last_name, $email, $phone, $event_name, $attendee_type, $upload_id);

// Get form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$event_name = $_POST['event_name'];
$attendee_type = $_POST['attendee_type'];
$upload_id = $target_file;

if ($stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>