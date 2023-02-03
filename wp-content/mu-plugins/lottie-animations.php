<?php

$animations = [
	1 => 'foundation-icon.json',
	2 => 'capture-demand-icon.json',
	3 => 'new-demand-icon.json',
	4 => 'scale-icon.json',
];

add_action( 'init', static function () {
    wp_register_script( 'lottie-player', 'https://unpkg.com/@lottiefiles/lottie-player@1.5.7/dist/lottie-player.js', null, '1.5.7' );
} );

add_action( 'wp_enqueue_scripts', static function () {
	if ( ! has_filter( 'services-growth-process-img' ) || ! is_page_template( 'service-page.blade.php' ) ) {
		return;
	}

        wp_enqueue_script( 'lottie-player' );
} );

add_filter( 'services-growth-process-img', static function ( $img, $index ) use ( $animations ) : string {
	if ( ! wp_script_is( 'lottie-player', 'enqueued' ) && ! wp_script_is( 'lottie-player', 'done' ) ) {
		return $img;
	}

	$url = sprintf( 'images/lottie/%s', $animations[ $index ] );
	$url = get_theme_file_uri( $url );

	return sprintf( '<lottie-player src="%s" background="transparent"></lottie-player>', esc_url( $url ) );
}, 10, 2 );

add_action( 'wp_print_footer_scripts', static function () {
	if ( ! has_filter( 'services-growth-process-img' ) || ! is_page_template( 'service-page.blade.php' ) ) {
		return;
	}
	?>

	<script>
		( function () {

			var intersecting = [];
			const selector = '.services-media-main lottie-player';
			const animate_time = 1130;
			const animate_delay = 1000;

			const init = function () {

				document.querySelectorAll( selector ).forEach( function ( el ) {
					if ( ! el ) {
						return;
					}

					observer.observe( el );
				} );

			};

			const observer = new IntersectionObserver( function ( entries, observer ) {

				intersecting = entries.filter( function ( entry ) {
					return entry.isIntersecting;
				} );

				if ( entries.length !== intersecting.length ) {
					return;
				}

				animate();

				observer.disconnect();

			}, { threshold: 1.0 } );

			const animate = function () {

				var timeout_length = 0;

				document.querySelectorAll( selector ).forEach( function ( player, i ) {
					timeout_length = i * ( animate_time + animate_delay );

					setTimeout( function () {
						player.play();
					}, timeout_length );
				} );

			};

			if ( 'lottie-player' in window ) {
				init();
			} else {
				document.querySelector( 'lottie-player-js' ).addEventListener( 'load', init );
			}

		} () );
	</script>

	<?php
} );
