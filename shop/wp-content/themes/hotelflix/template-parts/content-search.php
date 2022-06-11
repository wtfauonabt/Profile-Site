<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hotelflix
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog_post card border-0 shadow' ); ?>>
	<div class="card-body">
		<?php 
		the_title( '<h2 class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) {
			?>
			<ul class="post_info d-flex flex-wrap">
				<?php
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
					echo '<li> <a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="tips">' . esc_html( $categories[0]->name ) . '</a></li>';
				}
				?>
				<li> <span> <i class="far fa-comments"> </i> <?php comments_popup_link(); ?> <span> </li>
				<li> <span> <i class="far fa-clock"> </i> <?php hotelflix_posted_on(); ?></span> </li>
				<li> <?php hotelflix_posted_by(); ?> </li>
			</ul>
			<?php
		}

		hotelflix_post_thumbnail();
		the_excerpt();

		?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
