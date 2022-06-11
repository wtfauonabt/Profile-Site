<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hotelflix
 */

if ( is_singular() ) {
	$hotelflix_post_class = 'blog_post card border-0';
} else {
	$hotelflix_post_class = 'blog_post card border-0 shadow';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $hotelflix_post_class ); ?>>
	<div class="card-body">
	<?php
		if ( is_singular() ) {
			the_title( '<h2 class="card-title">', '</h2>' );
		}
		
		hotelflix_post_thumbnail();
		
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hotelflix' ),
			'after'  => '</div>',
		) );
		?>
		<div class="blog-post-bottom-panel gvoluptatemroup-md group-justify">
			<?php hotelflix_social_sharing(); ?>
		</div><!-- End bottom panel-->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
