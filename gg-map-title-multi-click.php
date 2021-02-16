<!DOCTYPE html>
<html>

<head>
    <title>gg-map-title-multi-click</title>
    <script type="text/javascript" src="jquery.js"></script>
</head>

<body>

    <style type="text/css">
        html,body {height: 100%;margin: 0;padding: 0;}
    </style>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=  &libraries=&v=weekly" defer></script>

    <div class="lstChinhanh">
        <ul>
            <li data-lat="21.034249" data-lng="105.753381" data-title="Hà Nội">
                <i class="fa fa-map-marker" aria-hidden="true"></i>Hà Nội
            </li>
            <li data-lat="20.831747" data-lng="106.706289" data-title="Hải Phòng">
                <i class="fa fa-map-marker" aria-hidden="true"></i>Hải Phòng
            </li>
            <li data-lat="10.828894" data-lng="106.637761" data-title="Tp. HCM">
                <i class="fa fa-map-marker" aria-hidden="true"></i>Tp. HCM
            </li>
            <li data-lat="13.987263" data-lng="108.021836" data-title="Pleiku">
                <i class="fa fa-map-marker" aria-hidden="true"></i>Pleiku
            </li>
            <li data-lat="18.663009" data-lng="105.664972" data-title="Vinh">
                <i class="fa fa-map-marker" aria-hidden="true"></i>Vinh
            </li>
            <li data-lat="16.095466" data-lng="108.228578" data-title="Đà Nẵng">
                <i class="fa fa-map-marker" aria-hidden="true"></i>Đà Nẵng
            </li>
            <li data-lat="17.975706" data-lng="102.633104" data-title="Vientiane">
                <i class="fa fa-map-marker" aria-hidden="true"></i>Vientiane
            </li>
            <li data-lat="11.626662" data-lng="104.905926" data-title="Phnom Penh">
                <i class="fa fa-map-marker" aria-hidden="true"></i>Phnom Penh
            </li>
        </ul>
    </div>
    <div id="map" style="height: 100%;"></div>

    <script>
        // const map_array2 = [
        //     ["title", 21.0237808237879, 105.81825448556758]
        // ];

        function initMap(map_array) {
            console.log(map_array);
            
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: { lat: parseFloat(map_array[0][1]), lng: parseFloat(map_array[0][2]) },
            });
            setMarkers(map,map_array);
        }
        function setMarkers(map,map_array) {
            for (let i = 0; i < map_array.length; i++) {
                
                const map_array_row = map_array[i];

                const marker = new google.maps.Marker({
                    position: { lat: parseFloat(map_array_row[1]), lng: parseFloat(map_array_row[2]) },
                    map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    title: map_array_row[0]
                });

                // Dòng text
                const contentString = map_array_row[0];
                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                });
                marker.addListener("click", () => {
                    infowindow.open(map, marker);
                });
                infowindow.open(map, marker);

            }
        }

        $(document).ready(function(){
            //init
            const map_array_init = [
                ["title", 21.0237808237879, 105.81825448556758]
            ];
            initMap(map_array_init);

            //click
            $('.lstChinhanh li').on('click', function(){
                var title = $(this).data("title");
                var lat = $(this).data("lat");
                var lng = $(this).data("lng");

                const map_array = [
                    [title, lat, lng],
                ];
                // console.log(map_array);
                initMap(map_array);
            });
        });
    </script>

</body>

</html>