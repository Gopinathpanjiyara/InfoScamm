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

// Fetch all search queries from the database
$query = "SELECT query FROM search_queries";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $data = array();
    
    while($row = $result->fetch_assoc()) {
        // Tokenize the query into words
        $words = explode(" ", $row['query']);

        // Count occurrences of each word
        foreach ($words as $word) {
            $word = strtolower($word);
            if (!isset($data[$word])) {
                $data[$word] = 1;
            } else {
                $data[$word]++;
            }
        }
    }

    // Sort the array by word count in descending order
    arsort($data);

    // Return the top 10 most common words as JSON
    $data = array_slice($data, 0, 10);
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "No data found";
}

// Close the database connection
$conn->close();
?>