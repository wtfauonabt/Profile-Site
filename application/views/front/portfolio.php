<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 10/5/2018
 * Time: 1:05 AM
 */
?>
<!-- Portfolio Section-->
<section id="portfolio" class="above">
	<div class="container">
		<div class="jumbotron">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Portfolio</h2>
					<hr class="star-primary">
				</div>
			</div>

			<div class="row">
				<div class="col-xs-6 col-md-4 col-lg-3 portfolio-item thumbnail">
					<a href="#" class="portfolio-link" data-toggle="modal" data-target="#first-national-modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-search-plus fa-3x"></i>
							</div>
						</div>
						<img src="<?php echo IMG_URL ?>portfolio/339_a2_logo.jpg" class="img-responsive" alt="">
					</a>
				</div>
				<div class="col-xs-6 col-md-4 col-lg-3 portfolio-item thumbnail">
					<a href="#" class="portfolio-link" data-toggle="modal" data-target="#diet-modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-search-plus fa-3x"></i>
							</div>
						</div>
						<img src="<?php echo IMG_URL ?>portfolio/333_logo.jpg" class="img-responsive" alt="">
					</a>
				</div>
				<div class="col-xs-6 col-md-4 col-lg-3 portfolio-item thumbnail">
					<a href="#" class="portfolio-link" data-toggle="modal" data-target="#rst-modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-search-plus fa-3x"></i>
							</div>
						</div>
						<img src="<?php echo IMG_URL ?>portfolio/rst_logo.jpg" class="img-responsive" alt="">
					</a>
				</div>



				<div class="col-xs-6 col-md-4 col-lg-3 portfolio-item thumbnail">
					<a href="#" class="portfolio-link" data-toggle="modal" data-target="#moshify-modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-search-plus fa-3x"></i>
							</div>
						</div>
						<img src="<?php echo IMG_URL ?>portfolio/moshify_logo.jpg" class="img-responsive" alt="">
					</a>
				</div>
				<div class="col-xs-6 col-md-4 col-lg-3 portfolio-item thumbnail">
					<a href="#" class="portfolio-link" data-toggle="modal" data-target="#spk-modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-search-plus fa-3x"></i>
							</div>
						</div>
						<img src="<?php echo IMG_URL ?>portfolio/spk_logo.jpg" class="img-responsive" alt="">
					</a>
				</div>
				<div class="col-xs-6 col-md-4 col-lg-3 portfolio-item thumbnail">
					<a href="#" class="portfolio-link" data-toggle="modal" data-target="#totaramarketing-modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-search-plus fa-3x"></i>
							</div>
						</div>
						<img src="<?php echo IMG_URL ?>portfolio/totara_logo.jpg" class="img-responsive" alt="">
					</a>
				</div>



				<div class="col-xs-6 col-md-4 col-lg-3 portfolio-item thumbnail">
					<a href="#" class="portfolio-link" data-toggle="modal" data-target="#oum-modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-search-plus fa-3x"></i>
							</div>
						</div>
						<img src="<?php echo IMG_URL ?>portfolio/oum_logo.png" class="img-responsive" alt="">
					</a>
				</div>

			</div>
		</div>
	</div>
</section>
<?php $this->load->view("front/portfolio_modal");
