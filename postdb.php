<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "id22177123_db";
$password = "Aman@143";
$dbname = "id22177123_localhost";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array('success' => false, 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name-input"];
    $contact = $_POST["contact-input"];
    $email = $_POST["email-input"];
    $incidentDate = $_POST["date-input"];
    $postContent = $_POST["post-content"];

    $sql = "INSERT INTO report (name, contact, email, incident_date, post_content)
            VALUES ('$name', '$contact', '$email', '$incidentDate', '$postContent')";

    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Report submitted successfully!";
    } else {
        $response['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>

