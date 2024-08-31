<?php
// API URL
$url = 'https://api.example.com/data';
// Initialize cURL session
$ch = curl_init();
// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPGET, true); // Set the request method to GET
// Execute cURL request
$response = curl_exec($ch);
// Check for cURL errors
if (curl_errno($ch)) {
    die('cURL error: ' . curl_error($ch));
}
// Close cURL session
curl_close($ch);
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
