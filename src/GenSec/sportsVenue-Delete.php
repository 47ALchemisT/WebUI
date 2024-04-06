<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_venue'])) {
    $venue_id = $_POST['venue_id'];

    // Delete the venue from the database
    $sql = "DELETE FROM venue WHERE venue_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $venue_id);
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            echo "success";
        } else {
            echo "error";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "error";
    }
    
    mysqli_close($conn);
    exit;
}
?>
