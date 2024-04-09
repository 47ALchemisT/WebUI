<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the POST request
    $depart_ID = $_POST['depart_ID'];
    $departmentname = $_POST['departmentname'];
    $teamname = $_POST['teamname'];
    $description = $_POST['description'];

    // Update the event details in the database
    $sql = "UPDATE department SET departmentname = ?, teamname = ?, description = ? WHERE depart_ID = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssi", $departmentname, $teamname, $description, $depart_ID);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // If update is successful, return success message
            echo "<script>alert('Venue updated successfully');window.location='sportsDepartment.php'</script>";
        } else {
            // If update fails, log the error
            echo "error: " . mysqli_error($conn);
            error_log("SQL Error: " . $sql);
            error_log("SQL Error: " . mysqli_error($conn));
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // If preparing the statement fails, log the error
        echo "error: Failed to prepare statement";
        error_log("Statement preparation error: " . mysqli_error($conn));
    }

    // Close the database connection
    mysqli_close($conn);
    exit;
}
?> 