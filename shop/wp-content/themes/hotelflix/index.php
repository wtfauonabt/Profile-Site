<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hotelflix
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="section pb-50">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-md-6 mb-30">
							<?php
							if ( have_posts() ) {

								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

								?>
								<div class="pagination-wrap">
									<?php
									the_posts_pagination(
										array(
											'mid_size'  => 3,
											'prev_text' => '<i class="fa fa-caret-left"></i><span class="screen-reader-text">' . esc_html__( 'Previous' ,'hotelflix' ) . '</span>&nbsp;',
											'next_text' => '&nbsp;<i class="fa fa-caret-right"></i><span class="screen-reader-text">' . esc_html__( 'Next' ,'hotelflix' ) . '</span>',
										)
									);
									?>
								</div>
								<?php
							} else {
								get_template_part( 'template-parts/content', 'none' );
							}
							?>
						</div>
						<div class="col-lg-4 col-md-6  blog_sidebar">
							<?php get_sidebar(); ?>
						</div><!-- end sidebar -->
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
