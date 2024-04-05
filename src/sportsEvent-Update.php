<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the POST request
    $eventcat_ID = $_POST['eventcat_ID'];
    $event_name = $_POST['event_name'];
    $event_type = $_POST['event_type'];
    $event_category = $_POST['event_category'];

    // Update the event details in the database
    $sql = "UPDATE eventcategory SET event_name = ?, event_type = ?, event_category = ? WHERE eventcat_ID = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssi", $event_name, $event_type, $event_category, $eventcat_ID);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // If update is successful, return success message
            echo "<script>alert('Event added successfully');window.location='sportsEvent.php'</script>";
        } else {
            // If update fails, log the error
            echo "error: " . mysqli_error($conn);

            // Log the SQL query for debugging
            error_log("SQL Error: " . $sql);
            error_log("SQL Error: " . mysqli_error($conn));
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // If preparing the statement fails, log the error
        echo "error: Failed to prepare statement";

        // Log the error for debugging
        error_log("Statement preparation error: " . mysqli_error($conn));
    }

    // Close the database connection
    mysqli_close($conn);
    exit;
}