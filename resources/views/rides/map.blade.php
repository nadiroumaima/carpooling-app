<!DOCTYPE html>
<html>
<head>
    <title>Carpoolers</title>
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
    <script>
        function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            } else {
                console.log('Geolocation is not supported by this browser.');
            }
        }

        function successCallback(position) {
            const userLatitude = position.coords.latitude;
            const userLongitude = position.coords.longitude;

            const sourceLatitude = 33.5951; // Casablanca, Morocco latitude
            const sourceLongitude = -7.6188; // Casablanca, Morocco longitude
            const destinationLatitude = 34.0209; // Rabat, Morocco latitude
            const destinationLongitude = -6.8416; // Rabat, Morocco longitude

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

            // Create the markers for the source and destination
            const sourceMarker = new google.maps.Marker({
                position: { lat: sourceLatitude, lng: sourceLongitude },
                map,
                label: "S" // Marker label for the source
            });

            const destinationMarker = new google.maps.Marker({
                position: { lat: destinationLatitude, lng: destinationLongitude },
                map,
                label: "D" // Marker label for the destination
            });

            // Fit the map bounds to include all markers
            const bounds = new google.maps.LatLngBounds();
            bounds.extend(userMarker.getPosition());
            bounds.extend(sourceMarker.getPosition());
            bounds.extend(destinationMarker.getPosition());
            map.fitBounds(bounds);
        }

        function errorCallback(error) {
            console.log('Error occurred while retrieving the location:', error.message);
        }

        // Call the initMap function after the Google Maps API is loaded
        google.maps.event.addDomListener(window, "load", initMap);
    </script>
</body>
</html>
