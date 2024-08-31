<?php
// API URL for searching data
$baseUrl = 'https://api.example.com/search';
$queryParams = array(
    'name' => 'John Doe',
    'age' => 30
);
// Build query string
$queryString = http_build_query($queryParams);
$url = $baseUrl . '?' . $queryString;
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
// Check HTTP response code
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if ($httpCode != 200) { // Typically, a successful search returns a 200 status code
    die('HTTP error: ' . $httpCode);
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
