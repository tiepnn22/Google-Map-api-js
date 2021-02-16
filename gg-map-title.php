<!DOCTYPE html>
<html>

<head>
    <title>gg-map-title</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=  &callback=initMap&libraries=&v=weekly" defer></script>
    
    <style type="text/css">
        #map {height: 100%;}
        html,body {height: 100%;margin: 0;padding: 0;}
    </style>

    <script>
        function initMap() {
            const uluru = { lat: 21.0168864, lng: 105.7855574 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: uluru,
            });

            const contentString =
                '<div id="content">' +
                '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
                '<div id="bodyContent">' +
                "<b>Uluru</b>" +
                "</div>" +
                "</div>";
            const infowindow = new google.maps.InfoWindow({
                content: contentString,
            });
            
            const marker = new google.maps.Marker({
                position: uluru,
                map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                title: "",
            });
            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
    </script>

</head>

<body>
    <div id="map"></div>
</body>

</html>