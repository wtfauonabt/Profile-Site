<?php
/**
 * Template part for displaying posts
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
		} else {
			the_title( '<h2 class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		if ( 'post' === get_post_type() ) {
			if ( is_single() && has_excerpt() ) {
				the_excerpt();
			}
			?>
			<ul class="post_info d-flex flex-wrap">
				<?php
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
					echo '<li> <a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="tips">' . esc_html( $categories[0]->name ) . '</a></li>';
				}
				?>
				<li> <span> <i class="far fa-comments"> </i> <?php comments_popup_link(); ?> <span> </li>
				<li> <span> <i class="far fa-clock"> </i> <?php hotelflix_posted_on() ?></span> </li>
				<li> <?php hotelflix_posted_by(); ?> </li>
			</ul>
			<?php
		}

		hotelflix_post_thumbnail();
		if ( ! is_single() ) {
			the_excerpt();
		}

		if ( is_single() ) {
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hotelflix' ),
					'after'  => '</div>',
				)
			);
			?>
			<div class="blog-post-bottom-panel gvoluptatemroup-md group-justify">
				<div class="blog-post-tags">
				<?php
				if ( 'post' === get_post_type() ) {
					the_tags( '', '' );
				}
				?>
				</div><!-- End post tags panel -->
				<?php hotelflix_social_sharing(); ?>
			</div><!-- End bottom panel -->
			<?php
		}
		?>
	</div><!-- End card body -->

</article><!-- #post-<?php the_ID(); ?> -->
