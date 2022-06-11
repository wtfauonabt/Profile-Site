<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hotelflix
 */

?>

<footer id="colophon" class="site-footer">
	<div class="footer-inner">
	<?php
	if ( get_theme_mod( 'show_footer_widget', true ) === true && is_active_sidebar( 'sidebar-2' ) ) {
		?>
		<div class="container pt-80 pb-60">
			<div class="row">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div><!-- end row-->
		</div><!-- end footer widget area -->
		<?php
	}
	?>
		<div class="footer_coppy_right">
			<div class="container">
				<div class="row row-10 align-items-md-center">
					<?php
					if ( get_theme_mod( 'social_links_footer', true ) === true ) {
						?>
						<div class="col-sm-6 col-md-4 text-sm-right text-md-center">
							<div>
							<?php hotelflix_social_links(); ?>
							</div>
						</div>
						<?php
					}
					?>

					<div class="col-sm-6 col-md-4 order-sm-first">
					<!-- Rights-->
					<p class="rights">
					<?php
					if ( get_theme_mod( 'copyright_text', '' ) <> '' ) {
						echo wp_kses_post( get_theme_mod( 'copyright_text', '' ) );
					} else {
						?>
						<span>&copy;&nbsp;</span><span class="copyright-year"><?php echo esc_html( date_i18n( _x( 'Y', 'copyright date format', 'hotelflix' ) ) ); ?></span>
						<span><?php bloginfo( 'name' ); ?></span>
						<?php
					}
					?>
					</p>
				</div>
				<div class="col-sm-6 col-md-4 text-md-right">
					<?php the_privacy_policy_link( '<p class="rights">', '</p>' ); ?>
				</div>
			</div>
			</div>
		</div>
	</footer>
<?php wp_footer(); ?>

</body>
</html>
