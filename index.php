<?php
// Function to get current time in EST
function getCurrentTimeEST() {
    date_default_timezone_set('America/New_York');
    return date('Y-m-d H:i:s');
}

// Function to get user's IP address
function getUserIP() {
    // Check for shared Internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    // Check for IP from proxy or load balancer
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Check for the remote address
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// Function to get user's location based on IP address
function getUserLocation($ip) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://ipinfo.io/{$ip}/json");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    $details = json_decode($response);
    return $details->city ?? 'Unknown';
}


// Get current time in EST
$current_time_est = getCurrentTimeEST();

// Get user's IP address
$user_ip = getUserIP();

// Get user's location
$user_location = getUserLocation($user_ip);

// Display results
echo "Current Time in EST: $current_time_est<br>";
echo "Your IP Address: $user_ip<br>";
echo "Your Location: $user_location";

$response = file_get_contents("http://ipinfo.io/{$ip}/json");
$details = json_decode($response);

if ($details === null) {
    // JSON decoding failed
    $error_code = json_last_error();
    $error_message = json_last_error_msg();
    echo "JSON decoding error (code: $error_code): $error_message";
} else {
    // JSON decoding successful
    // Access JSON data as needed
}

?>

