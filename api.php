<?php
  include_once 'header.php'; //linking to header.php
?>
<?php
require 'users/users.php';

$users = getUsers();

include 'partials/ptheader.php';
?>

<body style='background-color:lightblue'>

<div class="container">
    <p>
        <a class="btn btn-dark" href="create.php">Create new Recommendations</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Recommendations</th>
            <th>Name</th>
            <th>Location</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Modify Recomendations<th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php if (isset($user['extension'])): ?>
                    <?php endif; ?>
                </td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['location'] ?></td>
                <td><?php echo $user['lat'] ?></td>
                <td><?php echo $user['lng'] ?></td>
                <td>
                   
                </td>
                <td>
                    <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-info">View</a>
                    <a href="update.php?id=<?php echo $user['id'] ?>"
                       class="btn btn-success">Update</a>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
</div>
<!DOCTYPE html>
<html>
  <head>
  <body style='background-color:lightblue'>

    <title>Add Map</title>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBo2956yEuMvK_9iPE6TSf6mVPRxwzgY4g&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
    </style>
    <script>
      function initMap() {

        var options = {
          zoom:9,
          center:{lat: 53.245424, lng: -6.598288 }
        }

      var map = new google.maps.Map(document.getElementById("map"), options);


      var markers = [];
      addMarker(
        {coords:{lat: 53.349202,  lng: -6.270070 },
        content:'<h3>ABS Gym Dublin</h3>'
      })
      addMarker(
        {coords:{lat: 53.155199,  lng: -6.912407},
        content:'<h3>First Step Fitness Kildare</h3>'
      })

      addMarker(
        {coords:{lat: 53.354615,  lng:  -6.402843},
        content:'<h3>Flyefit Liffey Valley (Jordan)</h3>'
      })

      addMarker(
        {coords:{lat: 53.282974,   lng:  -6.422996},
        content:'<h3>Citywest gym (Ben)</h3>'
      })

      addMarker(
        {coords:{lat: 53.272932, lng:  -6.203933 }, 
        content:'<h3>Raw gym</h3>'
      })
      function addMarker(props){

        var marker = new google.maps.Marker({
          position: props.coords,
          map:map
        });

        if(props.content){
        var infoWindow = new google.maps.InfoWindow({
        content: props.content
      });

      marker.addListener('click', function(){
        infoWindow.open(map,marker);
      });

        }
      }

      }
    </script>
  </head>
  <body>
    <h3>Google Maps Gyms Near you</h3>
    <!--The div element for the map -->
    <div id="map"></div>
  </body>
</html>
