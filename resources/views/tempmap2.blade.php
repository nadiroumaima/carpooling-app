<!doctype html>
<html>

<head>
  <title>Google Maps Example</title>
  <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.19.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
</head>

<body>
  <div class="container">
    <h1>PubNub Google Maps Tutorial - Live Flight Path</h1>
    <div id="map-canvas" style="width:600px;height:400px"></div>
  </div>

  <script>
    window.lat = 37.7850;
    window.lng = -122.4383;
    var map;
    var mark;
    var lineCoords = [];
    var initialize = function() {
      map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {
          lat: lat,
          lng: lng
        },
        zoom: 12
      });
      mark = new google.maps.Marker({
        position: {
          lat: lat,
          lng: lng
        },
        map: map
      });
    };
    window.initialize = initialize;
    var redraw = function(payload) {
      lat = payload.message.lat;
      lng = payload.message.lng;
      map.setCenter({
        lat: lat,
        lng: lng,
        alt: 0
      });
      mark.setPosition({
        lat: lat,
        lng: lng,
        alt: 0
      });
      lineCoords.push(new google.maps.LatLng(lat, lng));
      var lineCoordinatesPath = new google.maps.Polyline({
        path: lineCoords,
        geodesic: true,
        strokeColor: '#2E10FF'
      });
      lineCoordinatesPath.setMap(map);
    };
    var GEOchannel = getParameterByName('channel'); // Get channel or make a new channel
    if (!GEOchannel) {
        GEOchannel = makeid(5);
    }
    var pnChannel = GEOchannel;
    var pubnub = new PubNub({
      publishKey: 'Ypub-c-82aa683a-d03b-42f6-a30b-cf5fa8dea602',
      subscribeKey: 'sub-c-85b84d98-7970-4768-bdda-d88672e03c32'
    });
    pubnub.subscribe({
      channels: [pnChannel]
    });
    pubnub.addListener({
      message: redraw
    });
    setInterval(function() {
      pubnub.publish({
        channel: pnChannel,
        message: {
          lat: window.lat + 0.001,
          lng: window.lng + 0.01
        }
      });
    }, 500);
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAc3KPkQnsWeDevZxfQ4hwNKb98pb80Gbg&callback=initialize"></script>
</body>

</html>
