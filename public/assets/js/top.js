$(window).on('load', function() {
	new Splide('#splide', {
			type: 'loop',
			perPage: 6,
			focus: 'center',
			autoplay: true,
			interval: 3000,
			flickMaxPages: 3,
			updateOnMove: true,
			pagination: false,
			padding: '10%',
			throttle: 300,
			breakpoints: {
				640: {
				perPage: 1,
				padding: '10%'
			}
		}
	}).mount();

	var main = new Splide( '#main-slider', {
		type       : 'fade',
		heightRatio: 0.5,
		pagination : false,
		arrows     : false,
		cover      : true,
	  } );
	  
	  var thumbnails = new Splide( '#thumbnail-slider', {
		rewind          : true,
		fixedWidth      : 250,
		fixedHeight     : 150,
		isNavigation    : true,
		gap             : 10,
		focus           : 'center',
		pagination      : false,
		cover           : true,
		dragMinThreshold: {
		  mouse: 4,
		  touch: 10,
		},
		breakpoints : {
		  640: {
			fixedWidth  : 90,
			fixedHeight : 45,
		  },
		},
	  } );
	  
	main.sync( thumbnails );
	main.mount();
	thumbnails.mount();

});