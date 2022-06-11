<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hotelflix
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'hotelflix' ); ?></a>

	<header class="navigation">
		<div class="top_bar container ">
			<div class="d-flex align-items-center justify-content-between">
				<?php
				hotelflix_logo();

				echo '<div class="site-branding">';
				if ( display_header_text() ) {
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				}

				$hotelflix_description = get_bloginfo( 'description', 'display' );
				if ( get_theme_mod( 'display_tagline', false ) === true && $hotelflix_description ) {
					?>
					<div class="site-description">
						<?php echo $hotelflix_description; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
					</div>
					<?php
				}
				?>
				</div>

				<button class="btn top_info_01" data-toggle="collapse" href="#collapseExample_info_01" 
				role="button" aria-expanded="false" aria-controls="collapseExample">
				<i class="fa fa-ellipsis-v"> </i>
				<span class="screen-reader-text"><?php esc_html_e( 'Show contact information', 'hotelflix' ); ?></span></button>

				<div class="collapse" id="collapseExample_info_01">
					<div class="topbar-col d-flex align-items-center">
						<?php
						if ( get_theme_mod( 'opening_hours', '' ) <> '' ) {
							?>
							<div class="info_header-box"> <i class="far fa-clock"></i> 
							<span><?php echo esc_html( get_theme_mod( 'opening_hours' ) ); ?></span>
							</div>
							<?php
						}

						if ( get_theme_mod( 'phone', '' ) <> '' ) {
							?>
							<div class="info_header-box cont_nbr"> <i class="fas fa-phone"> </i>
								<span><?php echo esc_html( get_theme_mod( 'phone' ) ); ?></span>
							</div>
							<?php
						}

						if ( get_theme_mod( 'top_button_link', '#' ) && get_theme_mod( 'top_button_text', '' ) <> '' ) {
							?>
							<div class="info_header-box">
								<a href="<?php echo esc_url( get_theme_mod( 'top_button_link' ) ); ?>" class="btn btn-border border"><?php echo esc_html( get_theme_mod( 'top_button_text' ) ); ?></a>
							</div>
							<?php
						}
						?>
					</div><!-- end top-bar-col-->
				</div><!-- end collapse-->
			</div><!-- end d-flex-->
		</div><!-- end top_bar-->

		<!--menu-->
		<nav id="site-navigation" class="main-navigation navbar navbar-expand-md navbar-dark bg-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" 
			aria-controls="navbarCollapse" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'hotelflix' ); ?>">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="container">
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'menu-1',
						'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
						'container'       => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarCollapse',
						'menu_class'      => 'navbar-nav mr-auto',
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				);

				if ( get_theme_mod( 'social_links_header', true ) === true ) {
					?>
					<div class="topbar_social">
						<?php hotelflix_social_links(); ?>
					</div>
					<?php
				}
				?>
			</div>
		</nav><!-- #site-navigation -->

</header><!-- #masthead -->

<!-- page title -->
	<section class="page-title position-relative">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<h1 class="text-white font-tertiary">
						<?php
						if ( is_home() ) {
							esc_html_e( 'BLOG', 'hotelflix' );
						} elseif ( is_archive() ) {
							the_archive_title();
						} elseif ( is_search() ) {
							esc_html_e( 'Search Results', 'hotelflix' );
						} elseif ( is_singular() ) {
							the_title();
						}
						?>
					</h1>
					<?php hotelflix_breadcrumb_trail(); ?>
				</div>
			</div>
		</div>
	</section>
<!-- /page title -->
