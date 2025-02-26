<?php
require_once '../Controller/salleC.php';

$salleC = new salleC();
$list_salles = $salleC->afficherSalle();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />

  <?php
  $title = "Cinemap";
  ?>
  <?php
  // include header partial
  require_once '../film/partials/_includehead.php';
  ?>
</head>

<body style='border:0; margin: 0'>
  <div class="container">
    <?php
    // include header partial
    require_once '../film/partials/_navbar.php';
    ?>


    <div id="cinemap"></div>
    <div class="formBlock">
      <form id="form">
        <input type="text" name="start" class="input" id="start" placeholder="Choose starting point" />
        <input type="text" name="end" class="input" id="destination" placeholder="Choose destination" />
        <button type="submit">Get Directions</button>
      </form>
    </div>
    <div id="mainContainer">
      <div id="mapDiv">
        <div id="map">
          <button id="cpos">
            <img src="images/icon.jpg">
          </button>
        </div>
      </div>
      <div id="bars"></div>
    </div>


    <style>
      #map {
        height: 100vh;
        width: 100%;
        position: relative;
      }

      .formBlock {
        max-width: 400px;
        background-color: #FFF;
        border: 1px solid #ddd;
        position: absolute;
        top: 110px;
        left: 10px;
        padding: 10px;
        z-index: 999;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.65);
        border-radius: 5px;
        width: 90%;
      }

      .leaflet-top .leaflet-control {
        margin-top: 180px;
      }

      .input {
        padding: 10px;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 15px;
        border-radius: 3px;
      }

      #form {
        padding: 0;
        margin: 0;
      }

      input:nth-child(1) {
        margin-bottom: 10px;
      }

      #cpos {
        display: flex;
        align-items: center;
        position: absolute;
        top: 240px;
        left: 17px;
        width: 40px;
        height: 40px;
        background-color: white;
        border-radius: 5px;
        border-color: gray;
        border-style: solid;
        border-width: 1px 1px 1px 1px;
        opacity: 1;
        text-align: center;
        z-index: 500;
      }
    </style>
    <!-- <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
    <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=S8d7L47mdyAG5nHG09dUnSPJjreUVPeC"></script>
    <script
      src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=S8d7L47mdyAG5nHG09dUnSPJjreUVPeC"></script>
    <script>

      let map = L.map('map', {
        layers: MQ.mapLayer(),
        center: [36.81897, 10.16579],
        zoom: 12
      });


      function runDirection(start, end) {

        // recreating new map layer after removal
        map = L.map('map', {
          layers: MQ.mapLayer(),
          center: [36.81897, 10.16579],
          zoom: 12
        });

        var dir = MQ.routing.directions();

        dir.route({
          locations: [
            start,
            end
          ]
        });


        CustomRouteLayer = MQ.Routing.RouteLayer.extend({
          createStartMarker: (location) => {
            var custom_icon;
            var marker;

            custom_icon = L.icon({
              iconUrl: 'images/red.png',
              iconSize: [20, 29],
              iconAnchor: [10, 29],
              popupAnchor: [0, -29]
            });

            marker = L.marker(location.latLng, { icon: custom_icon }).addTo(map);

            return marker;
          },

          createEndMarker: (location) => {
            var custom_icon;
            var marker;

            custom_icon = L.icon({
              iconUrl: 'images/blue.png',
              iconSize: [20, 29],
              iconAnchor: [10, 29],
              popupAnchor: [0, -29]
            });

            marker = L.marker(location.latLng, { icon: custom_icon }).addTo(map);

            return marker;
          }
        });

        map.addLayer(new CustomRouteLayer({
          directions: dir,
          fitBounds: true
        }));
      }
      var button = document.getElementById('cpos');
      button.addEventListener('click', () => map.locate({ setView: true, maxZoom: 16 }));


      // function that runs when form submitted
      function submitForm(event) {
        event.preventDefault();

        // delete current map layer
        map.remove();

        // getting form data
        start = document.getElementById("start").value;
        end = document.getElementById("destination").value;
console.log(document.getElementById("destination").value);
        // run directions function
        runDirection(start, end);
mark_salles();
        // reset form
        document.getElementById("form").reset();
      }

      // asign the form to form variable
      const form = document.getElementById('form');

      // call the submitForm() function when submitting the form
      form.addEventListener('submit', submitForm);
      function mark_salles()
      {
      <?php
      foreach ($list_salles as $row) { ?>
          var marker = L.marker([<?= $row['latitude']; ?>, <?= $row['longitude']; ?>]).addTo(map);
          var popup = L.popup()
            .setLatLng([<?= $row['latitude']; ?>, <?= $row['longitude']; ?>])
            .setContent('<?php echo $row['nom_salle']; ?>')
            .addTo(map);
          <?php

        }
        ?>
      }
      mark_salles();
    </script>


    <?php
    // include header partial
    require_once '../film/partials/_footer.html';
    ?>

  </div>

  <?php
  // include header partial
  require_once '../film/partials/_includeend.html';
  ?>
  <!-- <script src="../Controller/scriptmap.php"></script>-->
</body>

</html>