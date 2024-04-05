<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_event'])) {
    $eventcat_ID = $_POST['eventcat_ID'];

    // Delete the event category from the database
    $sql = "DELETE FROM eventcategory WHERE eventcat_ID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $eventcat_ID);
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
