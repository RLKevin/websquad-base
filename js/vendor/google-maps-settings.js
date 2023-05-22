// style with https://mapstyle.withgoogle.com/

(function ($) {
	var sw = Math.max(
		document.documentElement.clientWidth,
		window.innerWidth || 0
	);

	function render_map($el) {
		var $markers = $el.find('.marker');
		var isDraggable = sw < 800 ? false : true;
		var args = {
			zoom: 12,
			center: new google.maps.LatLng(0, 0),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			disableDefaultUI: true, // a way to quickly hide all controls
			scaleControl: false,
			zoomControl: false,
			draggable: isDraggable,
			styles: [
				{
					elementType: 'geometry',
					stylers: [
						{
							color: '#f5f5f5',
						},
					],
				},
				{
					elementType: 'labels.icon',
					stylers: [
						{
							visibility: 'off',
						},
					],
				},
				{
					elementType: 'labels.text.fill',
					stylers: [
						{
							color: '#616161',
						},
					],
				},
				{
					elementType: 'labels.text.stroke',
					stylers: [
						{
							color: '#f5f5f5',
						},
					],
				},
				{
					featureType: 'administrative.land_parcel',
					elementType: 'labels',
					stylers: [
						{
							visibility: 'off',
						},
					],
				},
				{
					featureType: 'administrative.land_parcel',
					elementType: 'labels.text.fill',
					stylers: [
						{
							color: '#bdbdbd',
						},
					],
				},
				{
					featureType: 'poi',
					elementType: 'geometry',
					stylers: [
						{
							color: '#eeeeee',
						},
					],
				},
				{
					featureType: 'poi',
					elementType: 'labels.text',
					stylers: [
						{
							visibility: 'off',
						},
					],
				},
				{
					featureType: 'poi',
					elementType: 'labels.text.fill',
					stylers: [
						{
							color: '#757575',
						},
					],
				},
				{
					featureType: 'poi.business',
					stylers: [
						{
							visibility: 'off',
						},
					],
				},
				{
					featureType: 'poi.park',
					elementType: 'geometry',
					stylers: [
						{
							color: '#e5e5e5',
						},
					],
				},
				{
					featureType: 'poi.park',
					elementType: 'labels.text',
					stylers: [
						{
							visibility: 'off',
						},
					],
				},
				{
					featureType: 'poi.park',
					elementType: 'labels.text.fill',
					stylers: [
						{
							color: '#9e9e9e',
						},
					],
				},
				{
					featureType: 'road',
					elementType: 'geometry',
					stylers: [
						{
							color: '#ffffff',
						},
					],
				},
				{
					featureType: 'road.arterial',
					elementType: 'labels.text.fill',
					stylers: [
						{
							color: '#757575',
						},
					],
				},
				{
					featureType: 'road.highway',
					elementType: 'geometry',
					stylers: [
						{
							color: '#dadada',
						},
					],
				},
				{
					featureType: 'road.highway',
					elementType: 'labels.text.fill',
					stylers: [
						{
							color: '#616161',
						},
					],
				},
				{
					featureType: 'road.local',
					elementType: 'labels',
					stylers: [
						{
							visibility: 'off',
						},
					],
				},
				{
					featureType: 'road.local',
					elementType: 'labels.text.fill',
					stylers: [
						{
							color: '#9e9e9e',
						},
					],
				},
				{
					featureType: 'transit.line',
					elementType: 'geometry',
					stylers: [
						{
							color: '#e5e5e5',
						},
					],
				},
				{
					featureType: 'transit.station',
					elementType: 'geometry',
					stylers: [
						{
							color: '#eeeeee',
						},
					],
				},
				{
					featureType: 'water',
					elementType: 'geometry',
					stylers: [
						{
							color: '#c9c9c9',
						},
					],
				},
				{
					featureType: 'water',
					elementType: 'labels.text.fill',
					stylers: [
						{
							color: '#9e9e9e',
						},
					],
				},
			],
		};
		let map = new google.maps.Map($el[0], args);
		map.markers = [];
		$markers.each(function () {
			add_marker($(this), map);
		});
		center_map(map);

		// wait 1 second to pan to center
		setTimeout(function () {
			// pan view to right on desktop
			var mobilePan = sw < 800 ? -100 : sw / -4;
			map.panBy(mobilePan, 40);
		}, 1000);
	}

	function add_marker($marker, map) {
		var latlng = new google.maps.LatLng(
			$marker.attr('data-lat'),
			$marker.attr('data-lng')
		);
		var primaryColor = getComputedStyle(
			document.documentElement
		).getPropertyValue('--cl-primary');

		let svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path fill="${primaryColor}" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>`;

		var markerSVG = {
			url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(svg),
			size: new google.maps.Size(64, 64),
			scaledSize: new google.maps.Size(64, 64),
			optimized: false,
		};

		var marker = new google.maps.Marker({
			position: latlng,
			map: map,
			icon: markerSVG,
		});

		map.markers.push(marker);
		if ($marker.html()) {
			var infowindow = new google.maps.InfoWindow({
				content: $marker.html(),
			});
			google.maps.event.addListener(marker, 'click', function () {
				infowindow.open(map, marker);
			});
		}
	}
	function center_map(map) {
		var bounds = new google.maps.LatLngBounds();
		$.each(map.markers, function (i, marker) {
			var latlng = new google.maps.LatLng(
				marker.position.lat(),
				marker.position.lng()
			);
			bounds.extend(latlng);
		});
		if (map.markers.length == 1) {
			map.setCenter(bounds.getCenter());
			// Deze zoom!
			// map.setZoom( 20 );
		} else {
			map.fitBounds(bounds);
		}
	}
	$(document).ready(function () {
		$('.map__map').each(function () {
			render_map($(this));
		});
	});
})(jQuery);
