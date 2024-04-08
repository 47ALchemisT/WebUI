<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the POST request
    $ID = $_POST['ID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $job = $_POST['job'];
    $password = $_POST['password'];

    // Update the venue details in the database
    $sql = "UPDATE user SET firstname = ?, lastname = ?, username = ?, email = ?, job = ?, password = ? WHERE ID = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssi", $ID, $firstname, $lastname, $username, $email, $job, $password);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // If update is successful, return success message
            echo "<script>alert('Venue updated successfully');window.location='sportsAccount.php'</script>";
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
s
                                                