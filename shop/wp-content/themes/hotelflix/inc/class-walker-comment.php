<?php
/**
 * Custom comment walker for this theme.
 *
 * @package Hotelflix
 */

if ( ! class_exists( 'Hotelflix_Walker_Comment' ) ) {
	/**
	 * CUSTOM COMMENT WALKER
	 * A custom walker for comments, based on the walker in Twenty Nineteen and Twenty Twenty.
	 */
	class Hotelflix_Walker_Comment extends Walker_Comment {

		/**
		 * Outputs a comment in the HTML5 format.
		 *
		 * @see wp_list_comments()
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author_url/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_author/
		 * @see https://developer.wordpress.org/reference/functions/get_avatar/
		 * @see https://developer.wordpress.org/reference/functions/get_comment_reply_link/
		 * @see https://developer.wordpress.org/reference/functions/get_edit_comment_link/
		 *
		 * @param WP_Comment $comment Comment to display.
		 * @param int        $depth   Depth of the current comment.
		 * @param array      $args    An array of arguments.
		 */
		protected function html5_comment( $comment, $depth, $args ) {

			$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

			?>
			<<?php echo $tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
				<div class="media">
				<?php
				$comment_author_url = get_comment_author_url( $comment );
				$comment_author     = get_comment_author( $comment );
				$avatar             = get_avatar( $comment, $args['avatar_size'] );
				if ( 0 !== $args['avatar_size'] ) {
					if ( empty( $comment_author_url ) ) {
						echo wp_kses_post( $avatar );
					} else {
						printf( '<a href="%s" rel="external nofollow" class="url">', $comment_author_url ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Escaped in https://developer.wordpress.org/reference/functions/get_comment_author_url/
						echo wp_kses_post( $avatar );
					}
				}
				if ( ! empty( $comment_author_url ) ) {
					echo '</a>';
				}
				?>
				<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
					<footer class="commmt_info group-sm group-justify">
						<div>
							<div class="comment-author vcard">
								<?php
								echo '<span class="fn">', esc_html( $comment_author ), '</span>';

								if ( ! empty( $comment_author_url ) ) {
									echo '</a>';
								}
								?>
							</div><!-- .comment-author -->
							<?php
							$comment_reply_link = get_comment_reply_link(
								array_merge(
									$args,
									array(
										'add_below' => 'div-comment',
										'depth'     => $depth,
										'max_depth' => $args['max_depth'],
										'before'    => '<span class="comment-reply">',
										'after'     => '</span>',
									)
								)
							);

							if ( $comment_reply_link ) {
								echo $comment_reply_link; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Link is escaped in https://developer.wordpress.org/reference/functions/get_comment_reply_link/
							}
							?>
							</div>
						<div class="comment-metadata">
								<?php
								$comment_timestamp = get_comment_date( '', $comment );
								?>
								<time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo esc_attr( $comment_timestamp ); ?>">
									<?php echo esc_html( $comment_timestamp ); ?>
								</time>
						</div><!-- .comment-metadata -->

					</footer><!-- .comment-meta -->

					<div class="comment-content">
						<?php
						comment_text();
						if ( '0' === $comment->comment_approved ) {
							?>
							<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'hotelflix' ); ?></p>
							<?php
						}
						?>
					</div><!-- .comment-content -->
				</article><!-- .comment-body -->
			</div>
			<?php
		}
	}
}
