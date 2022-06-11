<?php
/**
 * Theme Customizer
 *
 * @package Hotelflix
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hotelflix_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title', 'hotelflix' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'hotelflix_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'hotelflix_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_section(
		'layout_section',
		array(
			'title'    => __( 'Layout (site width) ', 'hotelflix' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_section(
		'top_section',
		array(
			'title'    => __( 'Top bar', 'hotelflix' ),
			'priority' => 45,
		)
	);

	$wp_customize->add_section(
		'footer_section',
		array(
			'title' => __( 'Footer', 'hotelflix' ),
		)
	);

	$wp_customize->add_section(
		'social_options',
		array(
			'title' => __( 'Social Sharing', 'hotelflix' ),
		)
	);

	$wp_customize->add_section(
		'social_links',
		array(
			'title' => __( 'Social Links', 'hotelflix' ),
		)
	);

	$wp_customize->add_setting(
		'enable_mobile_logo',
		array(
			'sanitize_callback' => 'hotelflix_sanitize_checkbox',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		'enable_mobile_logo',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Enable mobile logo', 'hotelflix' ),
			'section'  => 'title_tagline',
			'priority' => 10,
		)
	);

	$wp_customize->add_setting(
		'mobile_logo',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'mobile_logo',
			array(
				'label'           => __( 'Upload a mobile logo', 'hotelflix' ),
				'section'         => 'title_tagline',
				'active_callback' => function() {
					return get_theme_mod( 'enable_mobile_logo', true );
				},

			)
		)
	);

	$wp_customize->add_setting(
		'display_tagline',
		array(
			'sanitize_callback' => 'hotelflix_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'display_tagline',
		array(
			'type'     => 'checkbox',
			'label'    => __( 'Display tagline', 'hotelflix' ),
			'section'  => 'title_tagline',
			'priority' => 40,
		)
	);

	$wp_customize->add_setting(
		'opening_hours',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'opening_hours',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter your opening hours:', 'hotelflix' ),
			'description' => __( 'Leave this setting blank to disable it.', 'hotelflix' ),
			'input_attrs' => array(
				'placeholder' => __( '09:00AM — 05:00PM', 'hotelflix' ),
			),
			'section'     => 'top_section',
		)
	);

	$wp_customize->add_setting(
		'phone',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'phone',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter your phone number:', 'hotelflix' ),
			'description' => __( 'Leave this setting blank to disable it.', 'hotelflix' ),
			'input_attrs' => array(
				'placeholder' => __( '+ 123 45 67 89', 'hotelflix' ),
			),
			'section'     => 'top_section',
		)
	);

	$wp_customize->add_setting(
		'top_button_link',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => '#',
		)
	);

	$wp_customize->add_control(
		'top_button_link',
		array(
			'type'    => 'url',
			'label'   => __( 'Enter a button link:', 'hotelflix' ),
			'section' => 'top_section',
		)
	);

	$wp_customize->add_setting(
		'top_button_text',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'top_button_text',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter a button text:', 'hotelflix' ),
			'description' => __( 'Leave this setting blank to disable it.', 'hotelflix' ),
			'input_attrs' => array(
				'placeholder' => __( 'GET IN TOUCH', 'hotelflix' ),
			),
			'section'     => 'top_section',
		)
	);

	$wp_customize->add_setting(
		'container_width',
		array(
			'default'           => 100,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'container_width',
		array(
			'type'        => 'range',
			'label'       => __( 'Container width', 'hotelflix' ),
			'description' => __( 'Select a custom width for the website on desktop.', 'hotelflix' ),
			'input_attrs' => array(
				'min' => 60,
				'max' => 100,
			),
			'section'     => 'layout_section',
		)
	);

	$wp_customize->add_setting(
		'show_footer_widget',
		array(
			'default'           => true,
			'sanitize_callback' => 'hotelflix_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'show_footer_widget',
		array(
			'type'    => 'checkbox',
			'label'   => __( 'Show footer widget area', 'hotelflix' ),
			'section' => 'footer_section',
		)
	);

	$wp_customize->add_setting(
		'copyright_text',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'copyright_text',
		array(
			'type'        => 'text',
			'label'       => __( 'Enter a copyright text:', 'hotelflix' ),
			'input_attrs' => array(
				'placeholder' => __( 'Copyright: ', 'hotelflix' ) . gmdate( 'Y' ),
			),
			'section'     => 'footer_section',
		)
	);

	$wp_customize->add_setting(
		'sharing_posts',
		array(
			'default'           => true,
			'sanitize_callback' => 'hotelflix_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'sharing_posts',
		array(
			'label'       => __( 'Show Social Sharing below posts', 'hotelflix' ),
			'description' => __( 'Enable the sharing section below posts.', 'hotelflix' ),
			'section'     => 'social_options',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'sharing_pages',
		array(
			'default'           => false,
			'sanitize_callback' => 'hotelflix_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'sharing_pages',
		array(
			'label'       => __( 'Show Social Sharing below pages', 'hotelflix' ),
			'description' => __( 'Enable the sharing section below pages.', 'hotelflix' ),
			'section'     => 'social_options',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'sharing_facebook',
		array(
			'default'           => true,
			'sanitize_callback' => 'hotelflix_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'sharing_facebook',
		array(
			'label'       => __( 'Facebook Social Sharing', 'hotelflix' ),
			'description' => __( 'Enable a Facebook sharing link.', 'hotelflix' ),
			'section'     => 'social_options',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'sharing_twitter',
		array(
			'default'           => true,
			'sanitize_callback' => 'hotelflix_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'sharing_twitter',
		array(
			'label'       => __( 'Twitter Social Sharing', 'hotelflix' ),
			'description' => __( 'Enable a Twitter sharing link.', 'hotelflix' ),
			'section'     => 'social_options',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'sharing_linkedin',
		array(
			'default'           => true,
			'sanitize_callback' => 'hotelflix_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'sharing_linkedin',
		array(
			'label'       => __( 'LinkedIn Social Sharing', 'hotelflix' ),
			'description' => __( 'Enable a LinkedIn sharing link.', 'hotelflix' ),
			'section'     => 'social_options',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'sharing_reddit',
		array(
			'default'           => true,
			'sanitize_callback' => 'hotelflix_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'sharing_reddit',
		array(
			'label'       => __( 'Reddit Social Sharing', 'hotelflix' ),
			'description' => __( 'Enable a Reddit sharing link.', 'hotelflix' ),
			'section'     => 'social_options',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'sharing_pinterest',
		array(
			'default'           => true,
			'sanitize_callback' => 'hotelflix_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'sharing_pinterest',
		array(
			'label'       => __( 'Pinterest Social Sharing', 'hotelflix' ),
			'description' => __( 'Enable a Pinterest sharing link.', 'hotelflix' ),
			'section'     => 'social_options',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'social_links_header',
		array(
			'default'           => true,
			'sanitize_callback' => 'hotelflix_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'social_links_header',
		array(
			'label'   => __( 'Show Social Links in the header', 'hotelflix' ),
			'section' => 'social_links',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'social_links_footer',
		array(
			'default'           => true,
			'sanitize_callback' => 'hotelflix_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'social_links_footer',
		array(
			'label'   => __( 'Show Social Links in the footer', 'hotelflix' ),
			'section' => 'social_links',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'facebook_link',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		'facebook_link',
		array(
			'type'        => 'url',
			'label'       => __( 'Enter your Facebook link:', 'hotelflix' ),
			'description' => __( 'Leave this setting blank to disable it.', 'hotelflix' ),
			'section'     => 'social_links',
		)
	);

	$wp_customize->add_setting(
		'twitter_link',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		'twitter_link',
		array(
			'type'        => 'url',
			'label'       => __( 'Enter your Twitter link:', 'hotelflix' ),
			'description' => __( 'Leave this setting blank to disable it.', 'hotelflix' ),
			'section'     => 'social_links',
		)
	);

	$wp_customize->add_setting(
		'instagram_link',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		'instagram_link',
		array(
			'type'        => 'url',
			'label'       => __( 'Enter your Instragram link:', 'hotelflix' ),
			'description' => __( 'Leave this setting blank to disable it.', 'hotelflix' ),
			'section'     => 'social_links',
		)
	);

	$wp_customize->add_setting(
		'linkedin_link',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		'linkedin_link',
		array(
			'type'        => 'url',
			'label'       => __( 'Enter your LinkedIn link:', 'hotelflix' ),
			'description' => __( 'Leave this setting blank to disable it.', 'hotelflix' ),
			'section'     => 'social_links',
		)
	);

	$wp_customize->add_setting(
		'youtube_link',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		'youtube_link',
		array(
			'type'        => 'url',
			'label'       => __( 'Enter your Youtube link:', 'hotelflix' ),
			'description' => __( 'Leave this setting blank to disable it.', 'hotelflix' ),
			'section'     => 'social_links',
		)
	);

	$wp_customize->add_setting(
		'pinterest_link',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		'pinterest_link',
		array(
			'type'        => 'url',
			'label'       => __( 'Enter your Pinterest link:', 'hotelflix' ),
			'description' => __( 'Leave this setting blank to disable it.', 'hotelflix' ),
			'section'     => 'social_links',
		)
	);

}
add_action( 'customize_register', 'hotelflix_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function hotelflix_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function hotelflix_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hotelflix_customize_preview_js() {
	wp_enqueue_script( '_s-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hotelflix_customize_preview_js' );

/**
 * Checkbox sanitization callback, from
 * https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function hotelflix_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Select sanitization callback example.
 *
 * - Sanitization: select
 * - Control: select, radio
 * Sanitization callback for 'select' and 'radio' type controls. This callback sanitizes `$input`
 * as a slug, and then validates `$input` against the choices defined for the control.
 *
 * @see sanitize_text_field()               https://developer.wordpress.org/reference/functions/sanitize_text_field/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
function hotelflix_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_text_field( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
