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

// Fetch data based on the user's query
$query = isset($_GET['query']) ? mysqli_real_escape_string($conn, $_GET['query']) : '';
if ($query !== '') {
    $sql = "SELECT * FROM scams WHERE 
            description LIKE '%$query%' OR
            name LIKE '%$query%' OR
            scamId LIKE '%$query%' OR
            created_at LIKE '%$query%'";
    $result = mysqli_query($conn, $sql);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $entry = array(
            'id' => $row['id'],
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
    // Handle the case when no query parameter is provided
    echo json_encode(array('error' => 'No query parameter provided'));
    exit; // Stop script execution here
}

// Close the database connection
mysqli_close($conn);
?>
