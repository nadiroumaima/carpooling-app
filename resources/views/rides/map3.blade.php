<!DOCTYPE html>
<html>
<head>
    <title>Passenger View</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 100vh;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc3KPkQnsWeDevZxfQ4hwNKb98pb80Gbg&libraries=places"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('222bc424842ef6cc570b', {
          cluster: 'eu',
          encrypted: true
        });

        var channel = pusher.subscribe('carpooling-app');
        channel.bind('DriverLocationUpdated', function(data) {
          // Handle the received location update data
          console.log(data);
          // Update the markers on the map or perform any other actions
        });
    </script>
    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        } else {
            console.log('Geolocation is not supported by this browser.');
        }

        function successCallback(position) {
            const userLatitude = position.coords.latitude;
            const userLongitude = position.coords.longitude;

            // Send the user location data to the server or perform any other actions
            // You can use AJAX or fetch API to send an HTTP request to your server
            // with the user's latitude and longitude data

            // Initialize the map
            initMap(userLatitude, userLongitude);
        }

        function errorCallback(error) {
            console.log('Error occurred while retrieving the location:', error.message);
        }
    </script>
    <script>
        // Initialize the map
        function initMap(userLatitude, userLongitude) {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: userLatitude, lng: userLongitude },
                zoom: 12
            });

            // Add marker for the user's current location
            const userMarker = new google.maps.Marker({
                position: { lat: userLatitude, lng: userLongitude },
                map,
                label: "U" // Marker label for the user
            });

            // Get the driver's location from the server (Random location for testing)
            const driverLocation = { latitude: 33.5731, longitude: -7.5898 }; // Near Casablanca, Morocco
            const driverMarker = new google.maps.Marker({
                position: { lat: driverLocation.latitude, lng: driverLocation.longitude },
                map,
                label: "D" // Marker label for the driver
            });

            // Get the source and destination locations (Random locations for testing)
            const sourceLocation = { lat: 33.5922, lng: -7.6192 }; // Near Casablanca, Morocco
            const destinationLocation = { lat: 33.5520, lng: -7.6035 }; // Near Casablanca, Morocco

            // Create the markers for the source and destination
            const sourceMarker = new google.maps.Marker({
                position: sourceLocation,
                map,
                label: "S" // Marker label for the source
            });

            const destinationMarker = new google.maps.Marker({
                position: destinationLocation,
                map,
                label: "D" // Marker label for the destination
            });

            // Fit the map bounds to include all markers
            const bounds = new google.maps.LatLngBounds();
            bounds.extend(userMarker.getPosition());
            bounds.extend(driverMarker.getPosition());
            bounds.extend(sourceMarker.getPosition());
            bounds.extend(destinationMarker.getPosition());
            map.fitBounds(bounds);
        }

        // Call the initMap function after the Google Maps API is loaded
        google.maps.event.addDomListener(window, "load", initMap);
    </script>
</body>
</html>
