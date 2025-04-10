<?php
$dbhost = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$dbuser = getenv('DB_USER');
$dbpass = getenv('DB_PASSWORD');

// Create connection
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

function getConnectionStatus() {
    global $mysqli;
    // Check connection
    if (!$mysqli || $mysqli->connect_errno) {
        return [
            'status' => 'error',
            'message' => 'Connection failed: ' . $mysqli->connect_error
        ];
    }
    return [
        'status' => 'success',
        'message' => 'Connected successfully'
    ];
}

function getCountries($limit = 10) {
    global $mysqli;
    $countries = [];
    $connection = getConnectionStatus();
    
    if ($connection['status'] === 'error') {
        return [
            'status' => 'error',
            'data' => [],
            'message' => $connection['message']
        ];
    }

    // Run query
    $query = "SELECT * FROM country LIMIT $limit";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $countries[] = $row;
        }
        mysqli_free_result($result);
        return [
            'status' => 'success',
            'data' => $countries,
            'message' => 'Data retrieved successfully'
        ];
    } else {
        return [
            'status' => 'error',
            'data' => [],
            'message' => 'No record found'
        ];
    }
}

function closeConnection() {
    global $mysqli;
    if ($mysqli) {
        $mysqli->close();
    }
}
?>

