<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the latitude and longitude from the POST request
    $latitude = $_POST['latitude'] ?? null;
    $longitude = $_POST['longitude'] ?? null;

    // Perform validation and sanitization
    if (filter_var($latitude, FILTER_VALIDATE_FLOAT) !== false &&
        filter_var($longitude, FILTER_VALIDATE_FLOAT) !== false) {

        // Save to a file or database (example: save to a text file)
        $data = "Latitude: $latitude, Longitude: $longitude\n";
        file_put_contents('locations.txt', $data, FILE_APPEND);

        // Respond to the client
        echo 'Location saved successfully.';
    } else {
        echo 'Invalid latitude or longitude.';
    }
} else {
    echo 'Invalid request method.';
}
?>
