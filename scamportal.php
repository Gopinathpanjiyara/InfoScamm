<?php
// Replace these database connection details with your own
$servername = "localhost";
$username = "id22177123_db";
$password = "Aman@143";
$dbname = "id22177123_localhost";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $scamId = $_POST["scamId"];
    $description = $_POST["description"];
    $howPerformed = $_POST["howPerformed"];
    $preventiveMeasure = $_POST["preventiveMeasure"];
    $summary = $_POST["summary"];

    $sql = "INSERT INTO scams (name, scamId, description, howPerformed, preventiveMeasure, summary) VALUES ('$name', '$scamId', '$description', '$howPerformed', '$preventiveMeasure', '$summary')";

    if ($conn->query($sql) === TRUE) {
        http_response_code(200); // OK
        exit();
    } else {
        http_response_code(500); // Internal Server Error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>