<?php
// API URL
$url = 'https://api.example.com/data';
// Make the GET request
$response = file_get_contents($url);
// Check for errors
if ($response === FALSE) {
    die('Error occurred while fetching data.');
}
// Decode JSON response
$data = json_decode($response, true);
// Check for JSON decode errors
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON: ' . json_last_error_msg());
}

// Process the data
echo '<pre>';
print_r($data);
echo '</pre>';
?>
