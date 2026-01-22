<?php

$apiKey = "YOUR_API_KEY"; // replace with your OpenWeatherMap API key
$city = "Berlin";
$url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&units=metric&appid={$apiKey}";

$response = file_get_contents($url);

if ($response === false) {
    die("Failed to fetch weather data.");
}

$data = json_decode($response, true);

if (!$data || $data['cod'] !== 200) {
    die("Invalid weather response.");
}

$temperature = $data['main']['temp'];
$description = $data['weather'][0]['description'];
$humidity = $data['main']['humidity'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Daily Weather</title>
</head>
<body>

<h2>Weather in <?= htmlspecialchars($city) ?></h2>

<ul>
    <li><strong>Temperature:</strong> <?= $temperature ?> °C</li>
    <li><strong>Condition:</strong> <?= ucfirst($description) ?></li>
    <li><strong>Humidity:</strong> <?= $humidity ?>%</li>
</ul>

</body>
</html>

