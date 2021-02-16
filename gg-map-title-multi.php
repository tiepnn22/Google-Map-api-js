<!DOCTYPE html>
<html>

<head>
    <title>gg-map-title multi</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=  &callback=initMap&libraries=&v=weekly" defer></script>
    
    <style type="text/css">
        #map {height: 100%;}
        html,body {height: 100%;margin: 0;padding: 0;}
    </style>

    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: { lat: -33.9, lng: 151.2 },
            });
            setMarkers(map);
        }

        const beaches = [
            ["Bondi Beach", -33.890542, 151.274856, 4, "Bondi"],
            ["Cronulla Beach", -34.028249, 151.157507, 3, "Cronu"],
            ["Manly Beach", -33.80010128657071, 151.28747820854187, 2, "Manly"],
        ];

        function setMarkers(map) {
            for (let i = 0; i < beaches.length; i++) {
                
                const beach = beaches[i];

                const marker = new google.maps.Marker({
                    position: { lat: beach[1], lng: beach[2] },
                    map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    title: beach[0],
                    zIndex: beach[3],
                });

                const contentString = beach[4];
                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                });
                marker.addListener("click", () => {
                    infowindow.open(map, marker);
                });
                infowindow.open(map, marker);

            }
        }
    </script>

</head>

<body>
    <div id="map"></div>
</body>

</html>