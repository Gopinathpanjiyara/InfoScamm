<?php
// Database Connection Configuration
$servername = "localhost";
$username = "id22177123_db";
$password = "Aman@143";
$dbname = "id22177123_localhost";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all searched queries from the database
$query = "SELECT * FROM search_queries";
$result = $conn->query($query);

// Check if there are searched queries
if ($result && $result->num_rows > 0) {
    $searchQueries = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $searchQueries = [];
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>View Searched Queries</title>
    <style>
        body {
            background-color: rgb(33, 32, 32);
            color: #fff;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            color: #fff;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #333;
        }
    </style>
</head>
<body>
    <h1>Searched Queries</h1>
    <?php if (!empty($searchQueries)): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Query</th>
                <th>Search Count</th>
            </tr>
            <?php foreach ($searchQueries as $query): ?>
                <tr>
                    <td><?php echo $query['id']; ?></td>
                    <td><?php echo $query['query']; ?></td>
                    <td><?php echo $query['search_count']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No searched queries found.</p>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
