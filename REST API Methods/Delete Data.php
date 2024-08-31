<?php
// API URL for deleting data
$url = 'https://api.example.com/delete/123'; // Replace 123 with the resource ID to be deleted
// Initialize cURL session
$ch = curl_init();
// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); // Set the request method to DELETE
// Execute cURL request
$response = curl_exec($ch);
// Check for cURL errors
if (curl_errno($ch)) {
    die('cURL error: ' . curl_error($ch));
}
// Check HTTP response code
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if ($httpCode != 200 && $httpCode != 204) { // Typically, a successful delete returns 200 or 204
    die('HTTP error: ' . $httpCode);
}
// Close cURL session
curl_close($ch);
// Process the response if needed
echo 'Data deleted successfully.';
?>
