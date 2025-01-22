<?php

$data = [
    ["name" => "tribak ayoub", "age" => 24],
    ["name" => "Jane Smith", "age" => 25],
    ["name" => "Emily Johnson", "age" => 35]
];

// Set the HTTP response header to indicate the content type is JSON
// This ensures that the client interprets the response as JSON data
header('Content-Type: application/json');

// Convert the PHP array into a JSON string and send it to the client
echo json_encode($data);

/*
Explanation:
- `json_encode($data)` converts the PHP array `$data` into a JSON-formatted string.
- `echo` sends the JSON string as the response body.
- This combination is commonly used to send data from a server to a client
  (e.g., to be consumed by a JavaScript application).
*/
?>