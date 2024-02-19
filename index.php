<?php
$ip = $_SERVER['REMOTE_ADDR'];

// Make a cURL request to ipinfo.io to retrieve the location information
$ch = curl_init("https://ipinfo.io/{$ip}/json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Decode the JSON response and display the location information
$details = json_decode($response);
echo "<h2>Your Location: " . $details->city . ", " . $details->country . "</h2>";
?>