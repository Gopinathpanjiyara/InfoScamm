<?php
// Replace these values with your actual database credentials
$servername = "localhost";
$username = "id22177123_db";
$password = "Aman@143";
$dbname = "id22177123_localhost";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $message = $_POST['message'];

    $sql = "INSERT INTO form_submissions(first_name, last_name, email, contact_number, address, message) 
            VALUES ('$first_name', '$last_name', '$email', '$contact_number', '$address', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
