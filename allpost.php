<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Scams</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1em;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: white;
            margin: 10px 0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        li:hover {
            background-color: #f0f0f0;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .scam-details {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
            margin: 20px;
            border-radius: 8px;
            background-color: white;
        }
    </style>
</head>
<body>

<header>
    <h1>All Scams</h1>
</header>

<?php
// Replace the following with your database connection code
$servername = "localhost";
$username = "id21480896_msrit";
$password = "Aman@143";
$dbname = "id21480896_msritproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Replace the following query with your actual query to fetch all scams with full content
$sql = "SELECT * FROM scams";
$result = $conn->query($sql);

// Display all information
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li>";
        echo "<a class='scam-link'>" . $row["name"] . "</a>";
        echo "<div class='scam-details'>";
        echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
        echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
        echo "<p><strong>How Performed:</strong> " . $row["howPerformed"] . "</p>";
        echo "<p><strong>Preventive Measure:</strong> " . $row["preventiveMeasure"] . "</p>";
        echo "<p><strong>Summary:</strong> " . $row["summary"] . "</p>";
        echo "<p><strong>Created At:</strong> " . $row["created_at"] . "</p>";
        echo "</div>";
        echo "</li>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var scamLinks = document.querySelectorAll(".scam-link");

        scamLinks.forEach(function(link) {
            link.addEventListener("click", function() {
                var details = this.nextElementSibling;
                toggleVisibility(details);
            });
        });

        function toggleVisibility(element) {
            element.style.display = (element.style.display === "none" || element.style.display === "") ? "block" : "none";
        }
    });
</script>

</body>
</html>
