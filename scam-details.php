<?php
// Connect to your database
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "id22177123_db";
$password = "Aman@143";
$dbname = "id22177123_localhost";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch detailed information based on the scam name
$scamName = isset($_GET['name']) ? mysqli_real_escape_string($conn, $_GET['name']) : '';
if ($scamName !== '') {
    $sql = "SELECT * FROM scams WHERE name = '$scamName'";
    $result = mysqli_query($conn, $sql);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // You can customize the data structure based on your needs
        $entry = array(
            'name' => $row['name'],
            'scamId' => $row['scamId'],
            'description' => $row['description'],
            'howPerformed' => $row['howPerformed'],
            'preventiveMeasure' => $row['preventiveMeasure'],
            'summary' => $row['summary'],
            'created_at' => $row['created_at'],
        );

        $data[] = $entry;
    }

    // Return the data as JSON
    echo json_encode($data);
    exit; // Stop script execution here
} else {
    // Handle the case when no name parameter is provided
    echo json_encode(array('error' => 'No name parameter provided'));
    exit; // Stop script execution here
}

// Close the database connection
mysqli_close($conn);
?>
