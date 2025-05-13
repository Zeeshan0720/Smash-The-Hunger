<?php
header("Content-Type: application/json");
session_start();
include('db_connectt.php');

// Check if 'id' parameter is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input to prevent SQL injection

    // Query to fetch donation details
    $stmt = $con->prepare("SELECT * FROM active_donations WHERE d_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $response = $result->fetch_assoc();
        http_response_code(200); // Success
    } else {
        http_response_code(404); // Not Found
        $response = ["error" => "No record found."];
    }

    $stmt->close();
} else {
    http_response_code(400); // Bad Request
    $response = ["error" => "Invalid request. Missing 'id' parameter."];
}

// Close the database connection
$con->close();

// Return JSON response
echo json_encode($response);
?>
