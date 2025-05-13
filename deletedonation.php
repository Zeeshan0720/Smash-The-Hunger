<?php
session_start();
include('db_connectt.php');

if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = intval($_POST['id']); // Sanitize the input
    $sql = "DELETE FROM active_donations WHERE d_id = $id"; // Replace 'users' with your table name

    if ($con->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $con->error;
    }

    // Redirect back to the main page
    header("Location: admin_activedonation.php");
    exit();
} else {
    echo "Invalid request.";
    exit();
}
?>