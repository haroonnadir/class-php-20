<?php
// API URL for updating data
$url = 'https://api.example.com/update/123'; // Replace 123 with the resource ID
// Data to be updated
$data = array(
    'name' => 'Jane Doe',
    'email' => 'jane.doe@example.com',
    'age' => 31
);
// Convert data to JSON
$jsonData = json_encode($data);
// Initialize cURL session
$ch = curl_init()
// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT'); // Set the request method to PUT
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
if ($httpCode != 200) { // Typically, a successful update returns a 200 status code
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
