<!DOCTYPE html>
<html>
<head>
    <title>Location</title>
</head>
<body>

<h2>Get Current Location</h2>

<button onclick="getLocation()">Get Location</button>

<p id="demo"></p>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition();
        {
            document.getElementById("demo").innerHTML ="Latitude: " + position.coords.latitude +"<br>Longitude: " + position.coords.longitude;
        };
    } else {
        document.getElementById("demo").innerHTML ="Location not supported";
    }
}
</script>
</body>
</html>