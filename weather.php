<?php
$apiKey = "353a1ad951d150708edf841ee1b4a8ce";
$city = "Dhaka";
$url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

// Fetch data from API
$response = file_get_contents($url);
if ($response === FALSE) {
    die("Error fetching weather data.");
}

$data = json_decode($response, true);

// Extract details
$location = $data['name'] . ", " . $data['sys']['country'];
$temp = $data['main']['temp'] . " °C";
$condition = ucfirst($data['weather'][0]['description']);
?>

<div id="weather-container">
  <h3>🌤️ Current Weather</h3>
  <p>📍 <?php echo $location; ?></p>
  <p>🌡️ <?php echo $temp; ?></p>
  <p>☁️ <?php echo $condition; ?></p>
</div>

<style>
  #weather-container {
    background: #e8f5ff;
    padding: 15px;
    border-radius: 10px;
    width: 250px;
    font-family: Arial, sans-serif;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  }
  #weather-container h3 {
    margin-top: 0;
    color: #0077b6;
  }
</style>
