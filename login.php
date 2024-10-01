<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection script
include 'db_connect.php';

// Start session to manage user login state
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email and password from the form submission
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM REGISTRATION WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);

        // Execute the statement
        $stmt->execute();

        // Store the result
        $stmt->store_result();

        // Check if email exists
        if ($stmt->num_rows > 0) {
            // Bind result variables
            $stmt->bind_result($hashed_password);

            // Fetch the result
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, redirect to the new page
                header("Location: main.html");
                exit;
            } else {
                // Password is incorrect
                
                header("Location: main.html");
            }
        } else {
            // Email not found
            echo "Email not found!";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error in preparing statement: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
