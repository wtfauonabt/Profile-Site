<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Hotelflix
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses hotelflix_header_style()
 */
function hotelflix_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'hotelflix_custom_header_args',
			array(
				'default-image'      => get_template_directory_uri() . '/images/404.png',
				'default-text-color' => '131935',
				'width'              => 2000,
				'height'             => 400,
				'flex-height'        => true,
				'wp-head-callback'   => 'hotelflix_header_style',
			)
		)
	);

	register_default_headers(
		array(
			'tablet' => array(
				'url'           => '%s/images/header.jpg',
				'thumbnail_url' => '%s/images/header.jpg',
				'description'   => __( 'Tablet', 'hotelflix' ),
			),
			'building' => array(
				'url'           => '%s/images/header2.jpg',
				'thumbnail_url' => '%s/images/header2.jpg',
				'description'   => __( 'Building', 'hotelflix' ),
			),
			'room' => array(
				'url'           => '%s/images/404.png',
				'thumbnail_url' => '%s/images/404.png',
				'description'   => __( 'Hotel room', 'hotelflix' ),
			),
		)
	);
}

add_action( 'after_setup_theme', 'hotelflix_custom_header_setup' );

if ( ! function_exists( 'hotelflix_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see hotelflix_custom_header_setup().
	 */
	function hotelflix_header_style() {
		$header_text_color = get_header_textcolor();
		$header_image      = get_header_image();

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) {
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
			<?php
			// If the user has set a custom color for the text use that.
		} else {
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			<?php
		};

		if ( ! empty( $header_image ) ) {
			?>
				.page-title {
					background: url(<?php header_image(); ?>) no-repeat center center;
					background-size: cover;
				}
			<?php
		}
		?>
		</style>
		<?php
	}
endif;
