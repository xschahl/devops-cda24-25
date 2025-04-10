<?php
$dbhost = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$dbuser = getenv('DB_USER');
$dbpass = getenv('DB_PASSWORD');

// Create connection
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$mysqli || $mysqli->connect_errno) {
	die('<p><strong style="color:red;text-transform:uppercase;">Connection failed: ' . $conn->connect_error . '</strong></p>');
}
echo '<p><strong style="color:green;text-transform:uppercase;">Connected successfully</strong></p>';

// Run query
$query = "SELECT * FROM country LIMIT 10";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	   printf("<br><br>#=====================<br><pre>%s</pre>\n", var_export($row, true));               
	}
} else {
	printf('<p><strong style="color:red;text-transform:uppercase;">No record found.</strong></p>');
}
mysqli_free_result($result);
$mysqli->close();
   
