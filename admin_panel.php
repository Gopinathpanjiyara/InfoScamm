<?php
session_start();

// Check if the user is not logged in, redirect to admin_login.php
if (!isset($_SESSION['user'])) {
    header("Location: admin_login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: rgb(33, 32, 32);
            color: #fff;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
        }
        .admin-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .admin-logo {
            /* width: 100px; /* Adjust the size as needed */
             height: 100px; 
            margin-bottom: 20px;
        }
        .admin-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .card h3{
            /* color: black; */
        }
        .card {
            flex: 0 0 auto;
            width: 300px;
            margin: 10px;
            background-color: rgb(49, 47, 47);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
       
        .btn-primary {
            background-color: #3498db;
            border-radius: 10px;
        }
        .btn-primary{
            transition: all 0.3s ease 0s;     
           }
        .btn-primary:hover {
            background-color: #d3fc4c;
            border-color: white;
            color: black;
           
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <img class="admin-logo" src="1705489137782.png" alt="Logo">
        <h1>Admin Panel</h1>
        <p>Welcome to the admin panel. Manage posts, incident reports, and contacts.</p>
    </div>
<!-- Add the Chart.js library -->
    

<div class="pie">
    <!-- Your existing HTML content -->

    <!-- Add this canvas element where you want to display the pie chart -->
    <canvas id="queryChart"></canvas>
</div>
    <!-- Add this script tag at the end of your HTML body -->
    <script>
        // Fetch most searched data from the server
        fetch('get_most_searched.php')
            .then(response => response.json())
            .then(data => {
                // Create a pie chart using Chart.js
                var ctx = document.getElementById('queryChart').getContext('2d');
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: Object.keys(data),
                        datasets: [{
                            data: Object.values(data),
                            backgroundColor: getRandomColors(Object.keys(data).length),
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                });
            })
            .catch(error => console.error('Error fetching most searched data:', error));

        // Function to generate random colors for the pie chart
        function getRandomColors(count) {
            var colors = [];
            for (var i = 0; i < count; i++) {
                colors.push('#' + Math.floor(Math.random()*16777215).toString(16));
            }
            return colors;
        }
    </script>
    <div class="admin-cards">
        <div class="card">
            <h3>Post</h3>
            <p>Manage and create posts for your platform.</p>
            <a href="scampost.php" class="btn btn-primary">View</a>
        </div>
        <div class="card">
            <h3>Incident Report</h3>
            <p>Review and respond to incident reports.</p>
            <a href="report.php" class="btn btn-primary">View</a>
        </div>
        <div class="card">
            <h3>Contact</h3>
            <p>View and manage user contact details.</p>
            <a href="viewcon.php" class="btn btn-primary">View</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
