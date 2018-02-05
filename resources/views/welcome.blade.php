@extends('layouts.layout')
@section('content')
<main class="container-fluid text-center">

<!-- Dishes  -->
<div id="dishes" class="container-fluid text-center bg-grey">
  <h2 class="text-center">Dishes</h2>

      @include('dishes.dishes_show')

</div>
<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <h2>About</h2><br>
      <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

    </div>
   </div>
</div>


<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Only Fresh meat</h2><br>
  <h4>Fresh meat</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="{{ asset('img/cow.png') }}" alt="Beef" width="400" height="300">
        <p><strong>Beef</strong></p>

      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="{{ asset('img/duck.jpg') }}" alt="Duck" width="400" height="300">
        <p><strong>Duck</strong></p>

      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="{{ asset('img/sheep.png') }}" alt="Sheep" width="400" height="300">
        <p><strong>Sheep</strong></p>

      </div>
    </div>
  </div><br>

</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-12">
      <p><span class="glyphicon glyphicon-map-marker"></span>Vilnius, Lithuania</p>
      <p><span class="glyphicon glyphicon-phone"></span>+3706123456</p>
      <p><span class="glyphicon glyphicon-envelope"></span> info@redmeatcafe.lt</p>
    </div>
  </div>
</div>

<!-- Add Google Maps -->
<div id="googleMap" style="height:400px;width:100%;"></div>
</main>
<script>
function myMap() {
var myCenter = new google.maps.LatLng(54.6791226, 25.2696239);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoPeRqxUrWjmrHkw-eHCISmFtOwlDT96A&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
@endsection
