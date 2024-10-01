<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the search query from the URL
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Connect to the database (update with your actual credentials)
include 'db_connect1.php';

// Prepare and execute the search query
$stmt = $conn->prepare("SELECT * FROM `alumni1` WHERE `COL 9` LIKE ?");
$searchQuery = "%" . $query . "%";
$stmt->bind_param("s", $searchQuery);
$stmt->execute();
$result = $stmt->get_result();

// Display the search results
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            width: 100%;
            background: url('JSS.jpeg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            color: #000;
        }
        h1 {
            color: #000000;
        }
        .result {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f1f1f1;
        }
        .no-results {
            color: #ffffff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.8);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #444;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <h1>Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>COL 1</th><th>COL 2</th><th>COL 3</th><th>COL 4</th><th>COL 5</th><th>COL 6</th><th>COL 7</th><th>COL 8</th><th>COL 9</th><th>COL 10</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['COL 3']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 4']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 5']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 6']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 7']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 8']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 9']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 10']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 11']) . "</td>";
            echo "<td>" . htmlspecialchars($row['COL 12']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='no-results'>No results found</p>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
    ?>
</body>
</html>
