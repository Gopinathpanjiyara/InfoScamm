<?php
// Connect to your MySQL database
$servername = "localhost";
$username = "id22177123_db";
$password = "Aman@143";
$dbname = "id22177123_localhost";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize and validate user input
function sanitizeInput($input) {
    // Implement your sanitization/validation logic here
    return $input;
}

// Function to get the most searched words and their counts
function getMostSearchedWords($conn, $limit = 5) {
    $query = "SELECT query, search_count FROM search_queries ORDER BY search_count DESC LIMIT $limit";
    $result = $conn->query($query);

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[$row['query']] = $row['search_count'];
    }

    return $data;
}

// Handle search query logging
if (isset($_GET['search_query'])) {
    $searchQuery = sanitizeInput($_GET['search_query']);

    // Check if the query exists in the database
    $checkQuery = "SELECT * FROM search_queries WHERE query = '$searchQuery'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        // Query exists, update search count
        $updateQuery = "UPDATE search_queries SET search_count = search_count + 1 WHERE query = '$searchQuery'";
        $conn->query($updateQuery);
    } else {
        // Query does not exist, insert into the database
        $insertQuery = "INSERT INTO search_queries (query, search_count) VALUES ('$searchQuery', 1)";
        $conn->query($insertQuery);
    }
}

// Close the database connection
$conn->close();
?>
