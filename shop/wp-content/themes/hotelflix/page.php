<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

									get_template_part( 'template-parts/content', 'page' );

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

								endwhile;
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
