<?php
$ip = $_SERVER['REMOTE_ADDR'];
$details = file_get_contents("https://ipinfo.io/{$ip}/json");
$details = json_decode($details);
echo "<h2>Your Location: " . $details->city . ", " . $details->country . "</h2>";
?>