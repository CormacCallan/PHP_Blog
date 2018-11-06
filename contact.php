<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact Us</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3GNUNqilg3CdYIedKxEY5zgCl4p7xp-4"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
<!-- Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3GNUNqilg3CdYIedKxEY5zgCl4p7xp-4"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script>
var currentLocationMap;
var directionsDisplay;
var directionsService;
var currentLocationMap;

function init()
{
    directionsService = new google.maps.DirectionsService();
    // route planner
    directionsDisplay = new google.maps.DirectionsRenderer();
    var currentLocationMap = new google.maps.LatLng(54, -6.3);  // DkIT

    var mapOptions = {zoom: 10, center: currentLocationMap};
    currentLocationMap = new google.maps.Map(document.getElementById('mapDiv'), mapOptions);
    directionsDisplay.setMap(currentLocationMap);

    // add directions to the route
    directionsDisplay.setPanel(document.getElementById('directions'));
}

var travelMode = "DRIVING";
function calculateRoute()
{
	
    var start = document.getElementById('start').value;
    var end = document.getElementById('end').value;

    var request = {origin: start,
        destination: end,
        travelMode: google.maps.TravelMode[travelMode]};

    directionsService.route(request, function (response, status)
    {
if (status == google.maps.DirectionsStatus.OK)
        {
            directionsDisplay.setDirections(response);
        }
});
}
</script>

<style>
#controlPanel 
{
    float:left;
    width:49%;
}

#mapDiv 
{
    width:100%;
    height:600px;
  

}

#directions
{
    float:left;
    width:100%;
    margin:0px;
}
</style>
  </head>

  <body onload='init()'>
<div id="fb-root"></div>

    <!-- Navigation -->
    
 <?php include'includes/nav.php';?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Contact Us
      </h1>
        
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Contact Details</h3>
          <p>
            Wallaces Road,
            <br>Blackrock,
            <br>Co. Louth,
            <br>Ireland
            <br>
          </p>
          <p>
              Estella O'Brien<br>  
            P: 087 9619649
          </p>
          <hr>
        </div>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>
      
<div id="controlPanel">
<b>Start:</b>
<input  class="form-control" type="text" id="start" placeholder="Enter your location..">


<br>
<b>End: </b>
<input  class="form-control" type="text" id="end" value="Wallace's Road,
Blackrock,
Co. Louth,
Ireland.">
&nbsp;
<button class="btn btn-default" onclick='calculateRoute()'>Submit</button>
<br><br>
<button><i class="material-icons" onclick="travelMode= 'DRIVING';calculateRoute()">directions_car</i></button>
<button><i class="material-icons" onclick="travelMode= 'TRANSIT';calculateRoute()">directions_bus</i></button>
<button><i class="material-icons" onclick="travelMode= 'BICYCLING';calculateRoute()">directions_bike</i></button>
<button><i class="material-icons" onclick="travelMode= 'WALKING';calculateRoute()">directions_walk</i></button>


<br>
<br>
<br>
<details><summary>Directions</summary>
<div id="directions"></div>
</details>
</div>
      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
                <div id="mapDiv" sty>


        </div>

      </div>
      <!-- /.row -->

      


<div id="mapDiv"></div> 
      
      
      
      
      
      
      
      
      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Send us a Message</h3>
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message:</label>
                <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include"includes/footer.php" ?>;

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

  </body>

</html>
