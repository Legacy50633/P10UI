<?php
// Include the database connection file
require('connection.php');
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve and sanitize the form data
    $line = mysqli_real_escape_string($con, $_POST["line"]);
    $message = mysqli_real_escape_string($con, $_POST["message"]);
    $type = mysqli_real_escape_string($con, $_POST["effect"]);
    $owner = $_SESSION["user_id"];

    // Prepare the SQL query with proper column names
    $sql = "INSERT INTO data (line, message, effect, owner) VALUES ('$line', '$message', '$type', '$owner')";

    // Execute the query and check for success
    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
        // Redirect to another page if needed
        header("Location: add.php"); // Adjust the location as needed
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>
