<?php

session_start();

// Check if the user is not logged in, redirect to admin_login.php
if (!isset($_SESSION['user'])) {
    header("Location: admin_login.php");
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
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

// Handle delete action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    $deleteSql = "DELETE FROM form_submissions WHERE id = $deleteId";
    if ($conn->query($deleteSql) === TRUE) {
        echo json_encode(['success' => true]);
        exit();
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
        exit();
    }
}

// Fetch contact form submissions
$sql = "SELECT * FROM form_submissions ORDER BY submission_date DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Contact Form Submissions</title>
    <!-- Add your styling if needed -->
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .container {
            padding-top: 30px;
        }
        .list-group-item {
            background-color: #333;
            border-color: #555;
        }
        .list-group-item:hover {
            background-color: #555;
        }
        .modal-content {
            background-color: #111;
            color: #fff;
        }
        .modal-header {
            border-bottom: 1px solid #555;
        }
        .delete-btn {
            margin-left: 10px;
        }
        .return-link {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .return-link a {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Contact Form Submissions</h2>
        <ul class="list-group">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li class="list-group-item">';
                    echo '<strong>' . $row['first_name'] . ' ' . $row['last_name'] . '</strong>';
                    echo '<br>';
                    echo 'Received at: ' . $row['submission_date'];
                    echo '<br>';
                    echo '<button class="btn btn-info" data-toggle="modal" data-target="#messageModal' . $row['id'] . '">Read Message</button>';
                    echo ' <button class="btn btn-danger delete-btn" data-id="' . $row['id'] . '"><i class="fas fa-trash"></i> Delete</button>';
                    echo '</li>';

                    // Add a modal for each submission
                    echo '<div class="modal fade" id="messageModal' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                    echo '<div class="modal-dialog" role="document">';
                    echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                    echo '<h5 class="modal-title" id="exampleModalLabel">' . $row['first_name'] . ' ' . $row['last_name'] . '\'s Message</h5>';
                    echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                    echo '</button>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                    echo '<p><strong>Email:</strong> ' . $row['email'] . '</p>';
                    echo '<p><strong>Contact Number:</strong> ' . $row['contact_number'] . '</p>';
                    echo '<p><strong>Address:</strong> ' . $row['address'] . '</p>';
                    echo '<p><strong>Message:</strong> ' . $row['message'] . '</p>';
                    echo '<p><strong>Submission Date:</strong> ' . $row['submission_date'] . '</p>';
                    echo '</div>';
                    echo '<div class="modal-footer">';
                    echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<li class="list-group-item">No submissions yet.</li>';
            }
            ?>
        </ul>
    </div>
    <div class="return-link">
        <a href="admin_panel.php">Return to Admin Panel</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script>
    // Delete button click event
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('delete-btn')) {
            var submissionId = event.target.dataset.id;
            if (confirm('Are you sure you want to delete this submission?')) {
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'delete_id=' + submissionId,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Reload the page or update the list if needed
                        location.reload();
                    } else {
                        // Handle errors
                        alert('Error deleting submission: ' + data.error);
                    }
                })
                .catch(error => {
                    // Handle errors
                    alert('Error deleting submission.');
                });
            }
        }
    });
</script>


</body>
</html>
