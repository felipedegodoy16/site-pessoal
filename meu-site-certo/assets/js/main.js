(function($) {

	var	$window = $(window),
		$body = $('body'),
		$nav = $('#nav');

	// Breakpoints.
		breakpoints({
			xlarge:  [ '1281px',  '1680px' ],
			large:   [ '981px',   '1280px' ],
			medium:  [ '737px',   '980px'  ],
			small:   [ null,      '736px'  ]
		});

	// Play initial animations on page load.
		$window.on('load', function() {
			window.setTimeout(function() {
				$body.removeClass('is-preload');
			}, 100);
		});

	// Scrolly.
		$('#nav a, .scrolly').scrolly({
			speed: 1000,
			offset: function() { return $nav.height(); }
		});

})(jQuery);

// Carrossel
const controls = document.querySelectorAll('.control');
let currentItem = 0;
const items = document.querySelectorAll('.item');
const maxItems = items.length;

controls.forEach(control => {
	control.addEventListener('click', () => {
		const isLeft = control.classList.contains('arrow-left');

		if (isLeft) {
			currentItem	 -= 1;
		} else {
			currentItem += 1;
		}

		if (currentItem >= maxItems) {
			currentItem = 0;
		}

		if (currentItem < 0) {
			currentItem = maxItems - 1;
		}

		console.log("control", isLeft, currentItem);

		items[currentItem].scrollIntoView({
			inline: "center"
		})
	})
});