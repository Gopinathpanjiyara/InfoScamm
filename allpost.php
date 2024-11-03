<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    
      <style>
 body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

       .all header {
            background-color: #333;
            color: white;
            padding: 1em;
            text-align: center;
        }

       .all ul {
            list-style-type: none;
            padding: 0;
        }

       .all li {
            background-color: white;
            margin: 10px 0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .all li:hover {
            background-color: #f0f0f0;
        }

        .all a {
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
            text-align: justify;
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
.head li a{
    text-decoration: none;
    list-style: none;
   
    /* border: 2px solid red; */
}
#ho  a:hover{
    color: blue;
    
    
}
      </style>
      
  <link href="path/to/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  
<div class="head">
<nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="/New Project.png" class="h-12" alt="infoscam Logo" />
        
      </a>
      <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
        <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
          <li id="ho">
            <a href="/index.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
          </li>
          <li>
            <a href="/post.html" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Incident Report</a>
          </li>
          <li>
            <a href="/about.html" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
          </li>
          <li>
            <a href="/contact.html" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
            
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
</div>
  <div class="all">
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
$username = "id22177123_db";
$password = "Aman@143";
$dbname = "id22177123_localhost";

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
</div>
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

  


<footer class="bg-white dark:bg-gray-900">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
              <a href="#" class="flex items-center">
                  <img src="/New Project.png" class="h-8 me-3" alt="InfoScam" />
                  <!-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> -->
              </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">InfoScam</h2>
                  <ul class="text-gray-500 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="/post.html" class="hover:underline">Incident</a>
                      </li>
                      <li>
                          <a href="/contact.html" class="hover:underline">Contact-Us</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                  <ul class="text-gray-500 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="#" class="hover:underline ">Github</a>
                      </li>
                      <li>
                          <a href="#" class="hover:underline">Discord</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                  <ul class="text-gray-500 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="#" class="hover:underline">Privacy Policy</a>
                      </li>
                      <li>
                          <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="#" class="hover:underline">InfoScam™</a>. All Rights Reserved.
          </span>
          <div class="flex mt-4 sm:justify-center sm:mt-0">
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                  <span class="sr-only">Facebook page</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                        <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                    </svg>
                  <span class="sr-only">Discord community</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Twitter page</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="sr-only">GitHub account</span>
              </a>
              <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Dribbble account</span>
              </a>
          </div>
      </div>
    </div>
</footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="/index.js"></script>
</body>
</html>