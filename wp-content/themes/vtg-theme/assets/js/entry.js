
// Fire it up
var Site = {
	challengeElement: null,
	context: null,

	/**
	 * Initialize site
	 */
	init: function() {
		/**
		 * Set the initial breakpoint context
		 */
		Site.challengeElement = document.querySelector('.breakpoint-context');
		Site.challengeContext();
		// Site.slick();
		Site.imageGallery();

		/**
		 * Check breakpoint context on window resizing
		 * Throttled/debounced for better performance
		 */
		$(window).resize(Site.debounce(function() {
			Site.challengeContext();
		}, 250));
	},

	/**
	 * Device targeting should be based on media queries in CSS,
	 * we do not define this in scripts
	 * Modified from http://davidwalsh.name/device-state-detection-css-media-queries-javascript
	 */
	challengeContext: function() {
		var styles = window.getComputedStyle(Site.challengeElement),
			index = parseInt(styles.getPropertyValue('z-index'), 10),
			states = {
				1: 'mobile',
				2: 'tablet'
			};

		Site.context = states[index] || 'desktop';
	},

	/**
	 * Throttle/debounce helper
	 * Modified from http://remysharp.com/2010/07/21/throttling-function-calls/
	 */
	debounce: function(fn, delay) {
		var timer = null;

		return function() {
			var context = this,
				args = arguments;

			clearTimeout(timer);

			timer = setTimeout(function() {
				fn.apply(context, args);
			}, delay);
		};
	},

	slick: function() {
		$('.js-hero-slider').slick({
			dots: false,
			arrows: false,
  			infinite: false,
  			autoplay: true,
  			autoplaySpeed: 5000,
		});
	},

	imageGallery: function() {
		if ( $('.image-gallery').children().length > 1 ) {
		    $('.js-image-gallery').slick({
				dots: false,
				infinite: true,
				speed: 300,
				slidesToShow: 1,
				adaptiveHeight: true,
				nextArrow: '<img class="slick-next" src="/wp-content/themes/vtg-theme/assets/img/slider_arrow_next.png">',
  				prevArrow: '<img class="slick-prev" src="/wp-content/themes/vtg-theme/assets/img/slider_arrow_prev.png">',
			});
		}
	}
};

$(document).ready(function() {
	Site.init();
});
// Chain any click events here
