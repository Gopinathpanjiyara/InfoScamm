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

        /* Added styles for search bar */
        .search-container {
            text-align: center;
            margin-top: 20px;
        }

        .search-bar {
            border: 2px solid #3498db;
            border-radius: 8px;
            padding: 10px;
            width: 70%;
            font-size: 16px;
            outline: none;
            margin-bottom: 20px;
        }

        .search-bar::placeholder {
            color: #3498db;
        }

        /* Styles for the result area */
        #search-results {
            text-align: center;
            position: relative;
            width: 70%;
            margin: auto;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display:none;
        }

        #search-results ul {
            list-style-type: none;
            padding: 0;
        }

        #search-results li {
            margin: 5px 0;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
            cursor: pointer;
        }

        #search-results li:hover {
            background-color: #e0e0e0;
        }
        .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination a {
    color: #3498db;
    padding: 8px 16px;
    text-decoration: none;
    border: 1px solid #ddd;
    margin: 0 4px;
    border-radius: 5px;
}

.pagination a:hover {
    background-color: #f0f0f0;
}
    </style>
</head>
<body>

<header>
    <h1>All Scams</h1>
</header>

<!-- Added a container for the search bar -->
<div class="search-container">
    <input id="search-bar" class="search-bar" type="search" name="search" placeholder="Search Scam" onfocus="showResults()" oninput="performSearch()">
    <div id="search-results"></div>
</div>

<script src="searchjs.js"></script>

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

// Pagination settings
$resultsPerPage = 8;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $resultsPerPage;

// Replace the following query with your actual query to fetch scams with full content with pagination
$sql = "SELECT * FROM scams ORDER BY scamId DESC LIMIT $offset, $resultsPerPage";
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

    // Pagination links
    $sqlCount = "SELECT COUNT(*) AS total FROM scams";
    $resultCount = $conn->query($sqlCount);
    $rowCount = $resultCount->fetch_assoc()['total'];
    $totalPages = ceil($rowCount / $resultsPerPage);

    echo "<div class='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='?page=$i'>$i</a>";
    }
    echo "</div>";
} else {
    echo "0 results";
}


// Assume you have a variable $scamId containing the scam ID
$scamId = isset($_GET['scamId']) ? $_GET['scamId'] : null;

// Fetch the scam details
$selectQuery = "SELECT * FROM scams WHERE scamId = '$scamId'";
$result = $conn->query($selectQuery);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Increment the view count only when the scam link is clicked
    $updateQuery = "UPDATE scams SET views = views + 1 WHERE scamId = '$scamId'";
    $conn->query($updateQuery);

    // Display the scam details, including the updated view count
    echo "Scam Title: " . $row['name'] . "<br>";
    echo "Views: " . $row['views'] . "<br>";
    // Display other scam details as needed
}

$conn->close();
?>

<script>
    function showResults() {
        var searchResults = document.getElementById("search-results");
        searchResults.style.display = "block";
    }

    document.addEventListener("DOMContentLoaded", function() {
        var searchResults = document.getElementById("search-results");
        var searchBar = document.getElementById("search-bar");

        document.addEventListener("click", function(event) {
            if (event.target !== searchBar && !searchResults.contains(event.target)) {
                // Clicked outside the search bar and result area
                searchResults.style.display = "none";
            }
        });

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
<script>
  var typingTimer;
var doneTypingInterval = 1000;  // 3 seconds

function performSearch() {
    clearTimeout(typingTimer);

    var searchInput = document.getElementById("search-bar");
    var query = searchInput.value;

    // Check if the query is not empty
    if (query.trim() !== "") {
        // Start the timer for the doneTypingInterval
        typingTimer = setTimeout(function () {
            // Implement your search logic here
            // For simplicity, let's assume the search is unsuccessful
            displaySearchResults("No results found for '" + query + "'. Try another search.");

            // Send the query to the server for logging after the user stops typing
            logSearchQuery(query);
        }, doneTypingInterval);
    } else {
        // Clear the search results if the query is empty
        clearSearchResults();
    }
}

function displaySearchResults(message) {
    var resultsContainer = document.getElementById("search-results");
    resultsContainer.innerHTML = "<p>" + message + "</p>";
}

function clearSearchResults() {
    var resultsContainer = document.getElementById("search-results");
    resultsContainer.innerHTML = "";
}

function logSearchQuery(query) {
    // Send the query to the server for logging
    var xhr = new XMLHttpRequest();
    var url = "log_search_query.php"; // Replace with the actual server-side script URL
    var params = "search_query=" + encodeURIComponent(query);

    xhr.open("GET", url + "?" + params, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Log successful, do any additional client-side handling if needed
            console.log("Search query logged successfully");
        }
    };

    xhr.send();
}

    </script>

</body>
</html>