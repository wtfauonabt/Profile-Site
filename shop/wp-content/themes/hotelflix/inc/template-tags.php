<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Hotelflix
 */

if ( ! function_exists( 'hotelflix_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function hotelflix_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'hotelflix' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'hotelflix_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function hotelflix_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'hotelflix' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'hotelflix_post_thumbnail' ) ) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function hotelflix_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if ( is_singular() ) {
			?>
			<div class="post_img">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->
			<?php
		} else {
			?>
			<div class="post_img">
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute( array( 'echo' => false ) ),
					)
				);
				?>
			</a>
			</div>
			<?php
		} // End is_singular().
	}
}

if ( ! function_exists( 'hotelflix_social_sharing' ) ) {
	function hotelflix_social_sharing() {
		if ( is_page() && get_theme_mod( 'sharing_pages', false ) === true || is_single() && ! is_page() && get_theme_mod( 'sharing_posts', true ) === true ) {

			if ( get_theme_mod( 'sharing_facebook', true ) === true ||
				get_theme_mod( 'sharing_twitter', true ) === true ||
				get_theme_mod( 'sharing_linkedin', true ) === true ||
				get_theme_mod( 'sharing_reddit', true ) === true ||
				get_theme_mod( 'sharing_pinterest', true ) === true ||
				get_theme_mod( 'sharing_email', true ) === true
			) {
				global $post;
				?>
				<div class="group-md group-middle">
				<span class="social-title"><?php esc_html_e( 'Share', 'hotelflix' ); ?></span>
				<ul class="team_social d-flex">
				<?php
				if ( get_theme_mod( 'sharing_facebook', true ) === true ) {
					?>
					<li><a href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u?' . get_permalink( $post->ID ) ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'hotelflix' ); ?></span><i class="fab fa-facebook-f"></i></a></li>
					<?php
				}

				if ( get_theme_mod( 'sharing_twitter', true ) === true ) {
					?>
					<li><a href="<?php echo esc_url( 'https://twitter.com/intent/tweet?text=' . get_the_title( $post->ID ) . '&amp;url=' . get_permalink( $post->ID ) ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'hotelflix' ); ?></span><i class="fab fa-twitter"></i></a></li>
					<?php
				}

				if ( get_theme_mod( 'sharing_linkedin', true ) === true ) {
					?>
					<li><a href="<?php echo esc_url( 'https://www.linkedin.com/shareArticle?url=' . get_permalink( $post->ID ) ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'LinkedIn', 'hotelflix' ); ?></span><i class="fab fa-linkedin"></i></a></li>
					<?php
				}

				if ( get_theme_mod( 'sharing_reddit', true ) === true ) {
					?>
					<li><a href="<?php echo esc_url( 'https://reddit.com/submit?url=' . get_permalink( $post->ID ) ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Reddit', 'hotelflix' ); ?></span><i class="fab fa-reddit"></i></a></li>
					<?php
				}

				if ( get_theme_mod( 'sharing_pinterest', true ) === true ) {
					?>
					<li><a href="<?php echo esc_url( 'https://pinterest.com/pin/create/button/?url=[' . get_permalink( $post->ID ) ); ?>]"><span class="screen-reader-text"><?php esc_html_e( 'Pinterest', 'hotelflix' ); ?></span><i class="fab fa-pinterest"></i></a></li>
					<?php
				}
				?>
				</ul>
				</div><!-- End social sharing -->
				<?php
			}
		}
	}
}


if ( ! function_exists( 'hotelflix_social_links' ) ) {
	function hotelflix_social_links() {
		if ( get_theme_mod( 'facebook_link', '' ) <> '' ||
			get_theme_mod( 'twitter_link', '' ) <> '' ||
			get_theme_mod( 'instagram_link', '' ) <> '' ||
			get_theme_mod( 'linkedin_link', '' ) <> '' ||
			get_theme_mod( 'youtube_link', '' ) <> '' ||
			get_theme_mod( 'pinterest_link', '' ) <> ''
		) {
			?>
			<ul class="team_social">
			<?php

			if ( get_theme_mod( 'facebook_link', '' ) <> '' ) {
				?>
				<li><a href="<?php echo esc_url( get_theme_mod( 'facebook_link' ) ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'hotelflix' ); ?></span><i class="fab fa-facebook-f"></i></a></li>
				<?php
			}

			if ( get_theme_mod( 'twitter_link', '' ) <> '' ) {
				?>
				<li><a href="<?php echo esc_url( get_theme_mod( 'twitter_link' ) ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'hotelflix' ); ?></span><i class="fab fa-twitter"></i></a></li>
				<?php
			}

			if ( get_theme_mod( 'instagram_link', '' ) <> '' ) {
				?>
				<li><a href="<?php echo esc_url( get_theme_mod( 'instagram_link' ) ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'hotelflix' ); ?></span><i class="fab fa-instagram"></i></a></li>
				<?php
			}

			if ( get_theme_mod( 'linkedin_link','' ) <> '' ) {
				?>
				<li><a href="<?php echo esc_url( get_theme_mod( 'linkedin_link' ) ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'LinkedIn', 'hotelflix' ); ?></span><i class="fab fa-linkedin"></i></a></li>
				<?php
			}

			if ( get_theme_mod( 'youtube_link', '' ) <> '' ) {
				?>
				<li><a href="<?php echo esc_url( get_theme_mod( 'youtube_link' ) ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'YouTube', 'hotelflix' ); ?></span><i class="fab fa-youtube"></i></a></li>
				<?php
			}

			if ( get_theme_mod( 'pinterest_link', '' ) <> '' ) {
				?>
				<li><a href="<?php echo esc_url( get_theme_mod( 'pinterest_link' ) ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Pinterest', 'hotelflix' ); ?></span><i class="fab fa-pinterest"></i></a></li>
				<?php
			}

			?>
			</ul>
			<?php
		}
	}
}
