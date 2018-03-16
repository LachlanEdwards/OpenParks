var my_location = [];


//item input only for front end! - to draw one vs all for pages
function drawMap(coords_array) {
	var mymap = L.map('mapid').setView(coords_array[0], 15);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
			'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);
	
	for (var i = 0; i < coords_array.length; i++) {
		marker = new L.marker(coords_array[i])
			.bindPopup("<b>"+ coords_array[i][2] +"</b>")
			.addTo(mymap);
	}
	
	if (my_location.length > 0) {
		marker = new L.marker([my_location[0], my_location[1]])
			.bindPopup("<b>This is you</b><br />.")
			.addTo(mymap);
	}
	


	
	if (coords_array.length > 1) {
		max_south = coords_array[0][0];
		max_north = coords_array[0][0];
		for (var j = 1; j < coords_array.length; j++) {
			if (coords_array[j][0] < max_south) {
				max_south = coords_array[j][0];
			}
			else if (coords_array[j][0] > max_north) {
				max_north = coords_array[j][0];
			}
		}
		max_east = coords_array[0][1];
		max_west = coords_array[0][1];
		for (var k = 1; k < coords_array.length; k++) {
			if (coords_array[k][1] < max_east) {
				max_east = coords_array[k][1];
			}
			else if (coords_array[k][1] > max_west) {
				max_west = coords_array[k][1];
			}
		}
		//Southwest --> Northeast
		mymap.fitBounds([
			[max_south, max_west],
			[max_north, max_east]
		], {padding: [15, 15]});
	}
}

function getLocation() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition, showError);} 
	else {
		document.getElementById("status").innerHTML="Geolocation is not supported by this browser.";}
}
function showPosition(position) {
	document.getElementById("status").innerHTML = "Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude;	
	var latlon = position.coords.latitude + "," + position.coords.longitude;
	my_location[0] = position.coords.latitude;
	my_location[1] = position.coords.longitude;
}
function showError(error) {
	var msg = "";
	switch(error.code) {
		case error.PERMISSION_DENIED:
			msg = "User denied the request for Geolocation."
			break;
		case error.POSITION_UNAVAILABLE:
			msg = "Location information is unavailable."
			break;
		case error.TIMEOUT:
			msg = "The request to get user location timed out."
			break;
		case error.UNKNOWN_ERROR:
			msg = "An unknown error occurred."
			break;
	}
	document.getElementById("status").innerHTML = msg;
}





















