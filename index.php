<!DOCTYPE html>
<html>
<head>
    <title>My Information</title>
</head>
<body>
    <h1>Current Time: <?php echo date("Y-m-d H:i:s"); ?></h1>
    <h2>Your IP: <?php echo $_SERVER['REMOTE_ADDR']; ?></h2>
    <?php
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        echo "<h2>Your Location: " . $details->city . ", " . $details->country . "</h2>";
    ?>
</body>
</html>
