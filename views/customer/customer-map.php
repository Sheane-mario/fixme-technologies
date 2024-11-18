<?php

use app\core\Application;
use app\models\Customer;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Map</title>
    <link rel="stylesheet" href="/css/customer/customer-dashboard.css">
    <link rel="stylesheet" href="/css/customer/customer-map.css">
    <link rel="stylesheet" href="/css/customer/overlay.css">
    <script src="/js/customer/customer-map.js"></script>
</head>

<body>
<?php
include_once 'components/sidebar.php';
include_once 'components/header.php';
?>
<div class="container">
    <center>
        <!--        <h1>Geolocations of the technicians and service centres</h1>-->
    </center>
    <div class="map" id="map"></div>
    <?php
    //echo var_dump($data['results'][0]['geometry']['location']['lat']);
    ?>
</div>

<!-- Overlay for the confirmation message -->
<div id="signOutOverlay" class="overlay">
    <div class="overlay-content">
        <p>Are you sure you want to sign out?</p>
        <button id="confirmSignOut" class="btn"><a href="/customer-logout"></a> Yes</button>
        <button id="cancelSignOut" class="btn">No</button>
    </div>
</div>

<!--    Icons-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="/js/customer/customer-home.js"></script>
<script src="/js/customer/overlay.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCGNUZAUhEzeW8LeV_j3deW44jsA9hWY0&callback=loadMap&loading=async&libraries=marker&v=beta">
</script>
</body>

</html>