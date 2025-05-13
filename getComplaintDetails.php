<?php
include('db_connectt.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM complaints WHERE c_id = $id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Return the data as JSON
        echo json_encode($row);
    } else {
        // If no record found, return an error
        echo json_encode(['error' => 'No record found.']);
    }
} else {
    // Invalid request if id is not passed
    echo json_encode(['error' => 'Invalid request.']);
}

$con->close();
?>
