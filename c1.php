<?php
function getUserCountry() {
    // Use ipinfo.io API to get location data
    $ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address
    $access_key = 'YOUR_API_TOKEN'; // Replace with your actual token
    $url = "https://ipinfo.io/{$ip}?token={$access_key}";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    return isset($data['country']) ? $data['country'] : null;
}

$countryCode = getUserCountry();

// Map country codes to country names
$countryMap = [
    'US' => 'United States',
    'GB' => 'United Kingdom',
    'FR' => 'France',
    'DE' => 'Germany',
    'CA' => 'Canada',
    'AU' => 'Australia',
    'IN' => 'India',
    // Add more mappings as needed
];

$countryName = isset($countryMap[$countryCode]) ? $countryMap[$countryCode] : 'Unknown Country';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detect Your Country</title>
</head>
<body>

    <h1>Country Detection</h1>
    <p>Your country is: <?php echo htmlspecialchars($countryName); ?></p>

</body>
</html>
