function init_map(){
	var myOptions = {zoom:6,center:new google.maps.LatLng(22.356851,91.78318190000005),mapTypeId: google.maps.MapTypeId.ROADMAP};
	map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
	marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(22.356851,91.78318190000005)});
	infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>Chittagong<br>'});
	google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
	infowindow.open(map,marker);
}

google.maps.event.addDomListener(window, 'load', init_map);