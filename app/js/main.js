jQuery(document).ready(function($){
    // Anchor link
    var ROOT = $('html, body');

    $('.goTo').click(function() {
      var nav = $('.menu');
      if(nav.length){
        ROOT.animate({
            scrollTop: $( $(this).children('a').attr('href')).offset().top-130
        }, 1100);
        return false;
      }
    });

    //Toggle mobile-menu
    $('.nav-links').find('li').click(function(){
      $('.nav-links').removeClass('collapse-menu');
    });

    function new_map( $el ) {
    	var $markers = $el.find('.marker');
    	var args = {
    		zoom		: 14,
    		center		: new google.maps.LatLng(0, 0),
    		mapTypeId	: google.maps.MapTypeId.ROADMAP
    	};

    	var map = new google.maps.Map( $el[0], args);
    	map.markers = [];
    	$markers.each(function(){
        	add_marker( $(this), map );
    	});

    	center_map( map );
    	return map;
    }

    function add_marker( $marker, map ) {
    	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
    	var marker = new google.maps.Marker({
    		position	: latlng,
    		map			: map
    	});

    	map.markers.push( marker );
    	if( $marker.html() ) {
    		var infowindow = new google.maps.InfoWindow({
    			content		: $marker.html()
    		});

    		google.maps.event.addListener(marker, 'click', function() {
    			infowindow.open( map, marker );
    		});
    	}
    }

    function center_map( map ) {
    	var bounds = new google.maps.LatLngBounds();
    	$.each( map.markers, function( i, marker ){
    		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
    		bounds.extend( latlng );
    	});

    	if( map.markers.length == 1 ) {
    	    map.setCenter( bounds.getCenter() );
    	    map.setZoom( 14 );
    	} else {
    		map.fitBounds( bounds );
    	}
    }

    var map = null;

    $(document).ready(function(){
    	$('.acf-map').each(function(){
    		map = new_map( $(this) );
    	});
      google.maps.event.trigger(map, 'resize');
    });

});

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slider-item");
  if (n > slides.length) {
    slideIndex = 1
  }
  if (n < 1) {
    slideIndex = slides.length
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slides[slideIndex-1].style.display = "block";
}


filterEmplyee("team");
function filterEmplyee(c) {
  var x = document.getElementsByClassName("employee");
  for (var i = 0; i < x.length; i++) { // for all elements
    removesClass(x[i], "show"); // remove class show
    if (x[i].className.indexOf(c) > -1) { // if index of element classname "whatever" is bigger than -1
      addsClass(x[i], "show") // add class SHOW
    };
  }
}

// Show filtered elements
function addsClass(element, name) {
  var arr1 = element.className.split(" "); // split all element classnames by "," at " " into array
  var arr2 = name.split(" "); // split "show" into array
  for (var i = 0; i < arr2.length; i++) { // for
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function removesClass(element, name) {
  var arr1 = element.className.split(" ");
  var arr2 = name.split(" ");
  for (var i = 0; i < arr1.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

var lis = document.getElementsByClassName("filter-li");
for (var i = 0; i < lis.length; i++) {
  lis[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
