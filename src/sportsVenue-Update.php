<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the POST request
    $venue_id = $_POST['venue_id'];
    $venue_name = $_POST['venue_name'];
    $venue_description = $_POST['venue_description'];

    // Update the venue details in the database
    $sql = "UPDATE venue SET venue_name = ?, venue_description = ? WHERE venue_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssi", $venue_name, $venue_description, $venue_id);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // If update is successful, return success message
            echo "<script>alert('Venue updated successfully');window.location='sportsVenue.php'</script>";
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
?>
