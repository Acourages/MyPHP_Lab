<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Arshan's Weather App</h1>
        <form action="index.php" method="GET">
            <input type="text" name="city" placeholder="Enter city name" required>
            <button type="submit">Get Weather</button>
        </form>

        <?php
            if (isset($_GET['city'])) {
                // Sanitize and encode the city name
                $city = urlencode(htmlspecialchars($_GET['city']));
                $apiKey = "";  // Replace with your API key
                $url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

                // Get weather data from the API
                $weatherData = file_get_contents($url);
                $weather = json_decode($weatherData, true);

                if ($weather['cod'] == 200) {
                    $temp = $weather['main']['temp'];
                    $humidity = $weather['main']['humidity'];
                    $weatherCondition = $weather['weather'][0]['description'];
                    $windSpeed = $weather['wind']['speed'];

                    
                    $cityName = urldecode($city);

                    echo "<h3>Weather in $cityName:</h3>";
                    echo "<p>Temperature: $temp °C</p>";
                    echo "<p>Humidity: $humidity%</p>";
                    echo "<p>Condition: $weatherCondition</p>";
                    echo "<p>Wind Speed: $windSpeed m/s</p>";
                } else {
                    echo "<p>City not found. Please try again.</p>";
                }
            }
        ?>
    </div>
</body>
</html>
