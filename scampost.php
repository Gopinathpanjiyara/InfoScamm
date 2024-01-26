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
    <title>Post Scam Details</title>
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
            height: 100px;
            margin-bottom: 20px;
        }
        form {
            max-width: 600px;
            width: 80%;
            padding: 20px;
            background-color: #1c1b1b;
            border: 1px solid #333;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #333;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #444;
            color: #fff;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .return-link {
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        .return-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <img class="admin-logo" src="/Screenshot 2024-01-17 161419.png" alt="Logo">
        <h1>New Scam</h1>
        <p>Publish New Scam To Main portal.</p>
    </div>

    <form id="scamForm" action="scamportal.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="scamId">Scam ID (Unique):</label>
        <input type="text" id="scamId" name="scamId" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="howPerformed">How the Scam is Performed:</label>
        <textarea id="howPerformed" name="howPerformed" rows="4" required></textarea>

        <label for="preventiveMeasure">Preventive Measures:</label>
        <textarea id="preventiveMeasure" name="preventiveMeasure" rows="4" required></textarea>

        <label for="summary">Summary:</label>
        <textarea id="summary" name="summary" rows="4" required></textarea>

        <button type="submit">Post</button>
    </form>

    <a class="return-link" href="admin_panel.php">Return to Admin Panel</a>
    <a class="return-link" href="postedscam.php">Posted Posts</a>

    <script>
        const form = document.getElementById('scamForm');
        form.addEventListener('submit', async function(event) {
            event.preventDefault();
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: form.method,
                body: formData
            });

            if (response.ok) {
                alert("Scam details posted successfully.");
                location.reload(); // Reload the page after successful submission
            } else {
                const errorMessage = await response.text();
                alert("Error posting scam details: " + errorMessage);
                console.error('Error:', errorMessage);
            }
        });
    </script>
</body>
</html>
