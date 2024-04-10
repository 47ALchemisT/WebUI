<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the POST request
    $depart_ID = $_POST['depart_ID'];
    $departmentname = $_POST['departmentname'];
    $teamname = $_POST['teamname'];
    $description = $_POST['description'];

    // Check if file is uploaded
    if ($_FILES['department_image']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES["department_image"]["name"];
        $file_size = $_FILES["department_image"]["size"];
        $file_tmp = $_FILES["department_image"]["tmp_name"];
        $file_type = $_FILES["department_image"]["type"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid Image');</script>";
            exit;
        } else if ($file_size > 10000000) {
            echo "<script>alert('Image too large');</script>";
            exit;
        } else {
            // Move uploaded file to a directory
            $imageExtension .= ',' . $imageExtension;
            $upload_directory = 'img/';

            if (!file_exists($upload_directory)) {
                mkdir($upload_directory, 0777, true); // Create the directory if it doesn't exist
            }

            $file_path = $upload_directory . $file_name;
            if (move_uploaded_file($file_tmp, $file_path)) {
                // Update department with new image 
                $stmt = $conn->prepare("UPDATE department SET department_image=?, departmentname=?, teamname=?, description=? WHERE depart_ID=?");

                if ($stmt) {
                    $stmt->bind_param("ssssi", $file_path, $departmentname, $teamname, $description, $depart_ID);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        echo "<script>alert('Successfully Updated');window.location='departmentFinal.php'</script>";
                    } else {
                        echo "<script>alert('Update Failed: No rows affected');window.location='departmentFinal.php'</script>";
                    }

                    $stmt->close();
                } else {
                    echo "<script>alert('Error in prepared statement: " . $conn->error . "');window.location='departmentFinal.php'</script>";
                }
            } else {
                echo "<script>alert('Failed to upload file');</script>";
                exit;
            }
        }
    } else {// Update the event details in the database
    $sql = "UPDATE department SET departmentname = ?, teamname = ?, description = ? WHERE depart_ID = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssi", $departmentname, $teamname, $description, $depart_ID);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // If update is successful, return success message
            echo "<script>alert('Department updated successfully');window.location='sportsDepartment.php'</script>";
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
    }
    // Close the database connection
    mysqli_close($conn);
    exit;
}
?> 