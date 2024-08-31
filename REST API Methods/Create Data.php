<?php
// API URL for creating data
$url = 'https://api.example.com/create';
// Data to be sent in the POST request
$data = array(
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'age' => 30
);
// Convert data to JSON
$jsonData = json_encode($data);
// Initialize cURL session
$ch = curl_init();
// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true); // Set the request method to POST
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); // Attach the JSON data
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
));
// Execute cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    die('cURL error: ' . curl_error($ch));
}
// Check HTTP response code
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if ($httpCode != 201) { // Typically, a successful creation returns a 201 status code
    die('HTTP error: ' . $httpCode);
}
// Close cURL session
curl_close($ch);
// Decode JSON response
$responseData = json_decode($response, true);
// Check for JSON decode errors
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON: ' . json_last_error_msg());
}
// Process the response
echo '<pre>';
print_r($responseData);
echo '</pre>';
?>
