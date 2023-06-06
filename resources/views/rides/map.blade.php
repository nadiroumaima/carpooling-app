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

    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.0/pusher.min.js"></script>
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

            // Create the markers for the source and destination (initially empty coordinates)
            const sourceMarker = new google.maps.Marker({
                position: { lat: 0, lng: 0 },
                map,
                label: "S" // Marker label for the source
            });

            const destinationMarker = new google.maps.Marker({
                position: { lat: 0, lng: 0 },
                map,
                label: "D" // Marker label for the destination
            });

            // Fit the map bounds to include all markers
            const bounds = new google.maps.LatLngBounds();
            bounds.extend(userMarker.getPosition());
            map.fitBounds(bounds);

            // Initialize Pusher
            const pusher = new Pusher('PUSHER_API_KEY', {
                cluster: 'PUSHER_CLUSTER',
                encrypted: true
            });

            // Subscribe to the channel where you will receive updates
            const channel = pusher.subscribe('location-channel');

            // Event listener for location updates
            channel.bind('location-updated', function(data) {
                // Update the source and destination coordinates from the database
                const sourceLatitude = data.source.latitude;
                const sourceLongitude = data.source.longitude;
                const destinationLatitude = data.destination.latitude;
                const destinationLongitude = data.destination.longitude;

                // Update the source and destination markers on the map
                sourceMarker.setPosition(new google.maps.LatLng(sourceLatitude, sourceLongitude));
                destinationMarker.setPosition(new google.maps.LatLng(destinationLatitude, destinationLongitude));

                // Fit the map bounds to include all markers
                bounds.extend(sourceMarker.getPosition());
                bounds.extend(destinationMarker.getPosition());
                map.fitBounds(bounds);
            });
        }

        function errorCallback(error) {
            console.log('Error occurred while retrieving the location:', error.message);
        }

        // Call the initMap function after the Google Maps API is loaded
        google.maps.event.addDomListener(window, "load", initMap);
    </script>
    <script>
        // Fetch the source and destination coordinates from the model
        const sourceLatitude = {{ $ride->source_latitude }};
        const sourceLongitude = {{ $ride->source_longitude }};
        const destinationLatitude = {{ $ride->destination_latitude }};
        const destinationLongitude = {{ $ride->destination_longitude }};

        // Trigger the location-updated event with the initial coordinates
        const pusher = new Pusher('PUSHER_API_KEY', {
            cluster: 'PUSHER_CLUSTER',
            encrypted: true
        });

        pusher.trigger('location-channel', 'location-updated', {
            source: {
                latitude: sourceLatitude,
                longitude: sourceLongitude
            },
            destination: {
                latitude: destinationLatitude,
                longitude: destinationLongitude
            }
        });
    </script>
</body>
</html>
