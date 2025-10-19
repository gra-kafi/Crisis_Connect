<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            color: #333;
            padding: 20px;
        }
        h2 {
            color: #0066cc;
        }
        .card {
            background: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .forecast {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 10px;
        }
        .forecast .card {
            text-align: center;
        }
    </style>
</head>
<body>

<?php
$city = "Dhaka";  // You can change this
$apiKey = "353a1ad951d150708edf841ee1b4a8ce"; // 🔑 Replace with your real OpenWeatherMap API key

// Current weather API
$currentUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";
// Forecast API (5-day, 3-hour intervals)
$forecastUrl = "https://api.openweathermap.org/data/2.5/forecast?q={$city}&appid={$apiKey}&units=metric";

// Fetch data
$currentResponse = @file_get_contents($currentUrl);
$forecastResponse = @file_get_contents($forecastUrl);

if ($currentResponse === FALSE || $forecastResponse === FALSE) {
    die("<p>Error fetching weather data. Check API key or internet connection.</p>");
}

$currentData = json_decode($currentResponse, true);
$forecastData = json_decode($forecastResponse, true);

// ---------------------- CURRENT WEATHER ----------------------
if (isset($currentData['cod']) && $currentData['cod'] == 200) {
    echo "<div class='card'>";
    echo "<h2>Current Weather in {$currentData['name']}</h2>";
    echo "<p><b>Temperature:</b> {$currentData['main']['temp']}°C</p>";
    echo "<p><b>Weather:</b> {$currentData['weather'][0]['description']}</p>";
    echo "<p><b>Humidity:</b> {$currentData['main']['humidity']}%</p>";
    echo "<p><b>Wind Speed:</b> {$currentData['wind']['speed']} m/s</p>";
    echo "</div>";
} else {
    echo "<p>API Error: " . $currentData['message'] . "</p>";
}

// ---------------------- FORECAST ----------------------
if (isset($forecastData['cod']) && $forecastData['cod'] == "200") {
    echo "<h2>5-Day / 3-Hour Forecast for {$forecastData['city']['name']}</h2>";
    echo "<div class='forecast'>";
    foreach ($forecastData['list'] as $forecast) {
        $date = $forecast['dt_txt'];
        $temp = $forecast['main']['temp'];
        $desc = $forecast['weather'][0]['description'];

        echo "<div class='card'>";
        echo "<p><b>{$date}</b></p>";
        echo "<p>{$temp}°C</p>";
        echo "<p>{$desc}</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p>API Error: " . $forecastData['message'] . "</p>";
}
?>

</body>
</html>
