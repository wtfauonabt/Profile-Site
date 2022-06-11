<?php 
function wpsm_tabs_r_front_script() {
		
		wp_enqueue_style('wpsm_tabs_r-font-awesome-front', wpshopmart_tabs_r_directory_url.'assets/css/font-awesome/css/font-awesome.min.css');
		wp_enqueue_style('wpsm_tabs_r_bootstrap-front', wpshopmart_tabs_r_directory_url.'assets/css/bootstrap-front.css');
		wp_enqueue_style('wpsm_tabs_r_animate', wpshopmart_tabs_r_directory_url.'assets/css/animate.css');		
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'wpsm_tabs_r_bootstrap-js-front', wpshopmart_tabs_r_directory_url.'assets/js/bootstrap.js', array(), '', true );
		
}

add_action( 'wp_enqueue_scripts', 'wpsm_tabs_r_front_script' );
add_filter( 'widget_text', 'do_shortcode');

add_action('media_buttons_context', 'wpsm_tabs_r_editor_popup_content_button');
add_action('admin_footer', 'wpsm_tabs_r_editor_popup_content');

function wpsm_tabs_r_editor_popup_content_button($context) {
 $img = wpshopmart_tabs_r_directory_url.'assets/images/tabs_48.png';
  $container_id = 'TABS_R';
  $title = 'Select Tabs to insert into post';
  $context .= '<style>.wp_tabs_r_shortcode_button {
				background: #11CAA5 !important;
				border-color: #11CAA5 #11CAA5 #11CAA5 !important;
				-webkit-box-shadow: 0 1px 0 #11CAA5 !important;
				box-shadow: 0 1px 0 #11CAA5 !important;
				color: #fff;
				text-decoration: none;
				text-shadow: 0 -1px 1px #11CAA5 ,1px 0 1px #11CAA5,0 1px 1px #11CAA5,-1px 0 1px #11CAA5 !important;
			    }</style>
			    <a class="button button-primary wp_tabs_r_shortcode_button thickbox" title="Select Tabs to insert into post"    href="#TB_inline?width=400&inlineId='.$container_id.'">
					<span class="wp-media-buttons-icon" style="background: url('.$img.'); background-repeat: no-repeat; background-position: left bottom;"></span>
				Tabs Responsive Shortcode
				</a>';
  return $context;
}

function wpsm_tabs_r_editor_popup_content() {
	?>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#wpsm_tabs_r_insert').on('click', function() {
			var id = jQuery('#wpsm_tabs_r_insertselect option:selected').val();
			window.send_to_editor('<p>[TABS_R id=' + id + ']</p>');
			tb_remove();
		})
	});
	</script>
<style>
.wp_tabs_r_shortcode_button {
    background: #11CAA5; !important;
    border-color: #11CAA5; #11CAA5 #11CAA5 !important;
    -webkit-box-shadow: 0 1px 0 #11CAA5 !important;
    box-shadow: 0 1px 0 #11CAA5 !important;
    color: #fff !important;
    text-decoration: none;
    text-shadow: 0 -1px 1px #11CAA5 ,1px 0 1px #11CAA5,0 1px 1px #11CAA5,-1px 0 1px #11CAA5 !important;
}
</style>
	<div id="TABS_R" style="display:none;">
	  <h3>Select Tabs To Insert Into Post</h3>
	  <?php 
		
		$all_posts = wp_count_posts( 'tabs_responsive')->publish;
		$args = array('post_type' => 'tabs_responsive', 'posts_per_page' =>$all_posts);
		global $All_rac;
		$All_rac = new WP_Query( $args );			
		if( $All_rac->have_posts() ) { ?>	
			<select id="wpsm_tabs_r_insertselect" style="width: 100%;margin-bottom: 20px;">
				<?php
				while ( $All_rac->have_posts() ) : $All_rac->the_post(); ?>
				<?php $title = get_the_title(); ?>
				<option value="<?php echo get_the_ID(); ?>"><?php if (strlen($title) == 0) echo 'No Title Found'; else echo $title;   ?></option>
				<?php
				endwhile; 
				?>
			</select>
			<button class='button primary wp_tabs_r_shortcode_button' id='wpsm_tabs_r_insert'><?php _e('Insert Tabs Shortcode', wpshopmart_tabs_r_text_domain); ?></button>
			<?php
		} else {
			_e('No Tabs Created', wpshopmart_tabs_r_text_domain);
		}
		?>
	</div>
	<?php
}
add_action( 'admin_notices', 'wpsm_tabs_r_review' );
function wpsm_tabs_r_review() {

	// Verify that we can do a check for reviews.
	$review = get_option( 'wpsm_tabs_r_review' );
	$time	= time();
	$load	= false;
	if ( ! $review ) {
		$review = array(
			'time' 		=> $time,
			'dismissed' => false
		);
		add_option('wpsm_tabs_r_review', $review);
		//$load = true;
	} else {
		// Check if it has been dismissed or not.
		if ( (isset( $review['dismissed'] ) && ! $review['dismissed']) && (isset( $review['time'] ) && (($review['time'] + (DAY_IN_SECONDS * 3)) <= $time)) ) {
			$load = true;
		}
	}
	// If we cannot load, return early.
	if ( ! $load ) {
		return;
	}

	// We have a candidate! Output a review message.
	?>
	<div class="notice notice-info is-dismissible wpsm-tabs-b-review-notice">
		<div style="float:left;margin-right:10px;margin-bottom:5px;">
			<img style="width:100%;width: 120px;height: auto;" src="<?php echo wpshopmart_tabs_r_directory_url.'assets/images/show-icon.png'; ?>" />
		</div>
		<p style="font-size:18px;">'Hi! We saw you have been using <strong>Tabs Responsive plugin</strong> for a few days and wanted to ask for your help to <strong>make the plugin better</strong>.We just need a minute of your time to rate the plugin. Thank you!</p>
		<p style="font-size:18px;"><strong><?php _e( '~ wpshopmart', '' ); ?></strong></p>
		<p style="font-size:19px;"> 
			<a style="color: #fff;background: #ef4238;padding: 5px 7px 4px 6px;border-radius: 4px;" href="https://wordpress.org/support/plugin/tabs-responsive/reviews/?filter=5#new-post" class="wpsm-tabs-b-dismiss-review-notice wpsm-tabs-b-review-out" target="_blank" rel="noopener">Rate the plugin</a>&nbsp; &nbsp;
			<a style="color: #fff;background: #27d63c;padding: 5px 7px 4px 6px;border-radius: 4px;" href="#"  class="wpsm-tabs-b-dismiss-review-notice wpsm-rate-later" target="_self" rel="noopener"><?php _e( 'Nope, maybe later', '' ); ?></a>&nbsp; &nbsp;
			<a style="color: #fff;background: #31a3dd;padding: 5px 7px 4px 6px;border-radius: 4px;" href="#" class="wpsm-tabs-b-dismiss-review-notice wpsm-rated" target="_self" rel="noopener"><?php _e( 'I already did', '' ); ?></a>
			<a style="    color: #fff;
    background: #5c60d0;
    padding: 5px 7px 4px 6px;
    border-radius: 4px;
    margin-left: 10px;
    text-decoration: none;" href="https://wpshopmart.com/plugins/tabs-pro-plugin/" class="btn btn-primary wpsm-rate-later" target="_blank" ><?php _e( 'Upgarde To Tabs Pro Plugin', '' ); ?></a>
		</p>
	</div>
	<script type="text/javascript">
		jQuery(document).ready( function($) {
			$(document).on('click', '.wpsm-tabs-b-dismiss-review-notice, .wpsm-tabs-b-dismiss-notice .notice-dismiss', function( event ) {
				if ( $(this).hasClass('wpsm-tabs-b-review-out') ) {
					var wpsm_rate_data_val = "1";
				}
				if ( $(this).hasClass('wpsm-rate-later') ) {
					var wpsm_rate_data_val =  "2";
					event.preventDefault();
				}
				if ( $(this).hasClass('wpsm-rated') ) {
					var wpsm_rate_data_val =  "3";
					event.preventDefault();
				}

				$.post( ajaxurl, {
					action: 'wpsm_tabs_r_dismiss_review',
					wpsm_rate_data_tabs_r : wpsm_rate_data_val
				});
				
				$('.wpsm-tabs-b-review-notice').hide();
				//location.reload();
			});
		});
	</script>
	<?php
}

add_action( 'wp_ajax_wpsm_tabs_r_dismiss_review', 'wpsm_tabs_r_dismiss_review' );
function wpsm_tabs_r_dismiss_review() {
	if ( ! $review ) {
		$review = array();
	}
	
	if($_POST['wpsm_rate_data_tabs_r']=="1"){
		$review['time'] 	 = time();
		$review['dismissed'] = false;
		
	}
	if($_POST['wpsm_rate_data_tabs_r']=="2"){
		$review['time'] 	 = time();
		$review['dismissed'] = false;
		
	}
	if($_POST['wpsm_rate_data_tabs_r']=="3"){
		$review['time'] 	 = time();
		$review['dismissed'] = true;
		
	}
	update_option( 'wpsm_tabs_r_review', $review );
	die;
}



function wpsm_tabs_respnsive_header_info() {
 	if(get_post_type()=="tabs_responsive") {
		?>
		<style>
		@media screen and (max-width: 760px){
			.wpsm_ac_h_i{
				display:none;
				
			}
		}
		.wpsm_ac_h_i{
			    background-color: #4625a7;
    background: -webkit-linear-gradient(60deg, #4625a7, #915aff);
    background: linear-gradient(60deg, #4625a7, #915aff);
			-webkit-box-shadow: 0px 13px 21px -10px rgba(128,128,128,1);
			-moz-box-shadow: 0px 13px 21px -10px rgba(128,128,128,1);
			box-shadow: 0px 13px 21px -10px rgba(128,128,128,1);			
			margin-left: -20px;
			cursor: pointer;
			padding-top:20px;
			    overflow: HIDDEN;
			text-align: center;
		}
		.wpsm_ac_h_i .wpsm_ac_h_b{
			color: white;
			font-size: 30px;
			font-weight: bolder;
			padding: 0 0 0px 0;
		}
		.wpsm_ac_h_i .wpsm_ac_h_b .dashicons{
			font-size: 40px;
			position: absolute;
			margin-left: -45px;
			margin-top: -10px;
		}
		 .wpsm_ac_h_small{
			font-weight: bolder;
			color: white;
			font-size: 18px;
			padding: 0 0 15px 15px;
		}
		.wpsm_ac_h_i a{
			text-decoration: none;
		}
		@media screen and ( max-width: 600px ) {
			.wpsm_ac_h_i{ padding-top: 60px; margin-bottom: -50px; }
			.wpsm_ac_h_i .WlTSmall { display: none; }
		}
		.texture-layer {
			background: rgba(0,0,0,0);
			padding-top: 0px;
			padding: 0px 0 23px 0;
		}
		.wpsm_ac_h_i  ul{
			padding:0px 0px 0px 0px;
		}
		.wpsm_ac_h_i  li {
			text-align:left;
			color:#fff;
			font-size: 16px;
			line-height: 26px;
			font-weight: 600;
			
		}
		.wpsm_ac_h_i  li i{
			margin-right:6px ;
			margin-bottom:10px;	
			font-size: 12px;			
		}
		 
		.wpsm_ac_h_i .btn-danger{
			font-size: 29px;
			background-color: #000000;
			border-radius:1px;
			margin-right:10px;
			margin-top: 0px;
			border-color:#000;
			 
		}
		.wpsm_ac_h_i .btn-success{
			font-size: 28px;
			border-radius:1px;
			background-color: #ffffff;
			border-color: #ffffff;
			color:#000;
		}
		.btn-danger {
			color: #fff;
    background-color: #e0bf1b !important;
    border-color: #e0bf1b !important;
		}
		.pad-o{
			padding:0px;
			
		}

		
		</style>
		
		
		<div class="wpsm_ac_h_i ">
				<div class="texture-layer">
					<div class="col-md-3">
						<img src="<?php echo wpshopmart_tabs_r_directory_url.'assets/images/tab-intro.jpg'; ?>"  class="img-responsive"/>
					
					</div>
				
					
					
						<div class="col-md-9">
							<div class="wpsm_ac_h_b col-md-6" style="text-align:left">
								<a class="btn btn-danger btn-lg " href="https://wpshopmart.com/plugins/tabs-pro-plugin/" target="_blank">Get Pro Version</a><a class="btn btn-success btn-lg " href="http://demo.wpshopmart.com/tabs-pro-plugin-demo-for-wordpress/" target="_blank">View Demo</a>
							</div>								
							<div class="col-md-6" style="text-align:left">							
								<h1 style="color:#fff;font-size:34px;font-weight:800;line-height:1.4">Tabs Pro Plugin Features</h1>							
							</div>					
						
							<div class="col-md-12" style="padding-bottom:20px;">
								<a href="https://wpshopmart.com/plugins/tabs-pro-plugin/" target="_blank">
									<div class="col-md-3 pad-o">
										<ul>
											<li> <i class="fa fa-check"></i>20+ Design Templates </li>
											<li> <i class="fa fa-check"></i>30+ Content Animations </li>
											<li> <i class="fa fa-check"></i>Individual Color Scheme </li>
											<li> <i class="fa fa-check"></i>4 Overlay Effect </li>
											<li> <i class="fa fa-check"></i>500+ Google Fonts </li>
										</ul>
										</ul>
									</div>
									<div class="col-md-3 pad-o">
										<ul>
								<li> <i class="fa fa-check"></i>Customize Icon Position  </li>
								<li> <i class="fa fa-check"></i>Custom Image icon </li>
								<li> <i class="fa fa-check"></i>Tabs on Hover </li>
								<li> <i class="fa fa-check"></i>Widget Option </li>
								<li> <i class="fa fa-check"></i>500+ Glyphicon Icons Support </li>
							</ul>
									</div>
									<div class="col-md-3 pad-o">
										<ul>	<li> <i class="fa fa-check"></i>500+ Dashicons Icon Support </li>
								<li> <i class="fa fa-check"></i>1000+ Font Awesome Icon Support </li>
								<li> <i class="fa fa-check"></i>Tabs Custom Width </li>
								<li> <i class="fa fa-check"></i>Unlimited Shortcode </li>
								
								<li> <i class="fa fa-check"></i>Drag And Drop Builder </li>
								
							</ul>
									</div>
									<div class="col-md-3 pad-o">
									<ul>		<li> <i class="fa fa-check"></i>Tabs Custom Height </li>
								<li> <i class="fa fa-check"></i>Border Color Customization </li>
								<li> <i class="fa fa-check"></i>Unlimited Color Scheme </li>
								<li> <i class="fa fa-check"></i>High Priority Support </li>
								<li> <i class="fa fa-check"></i>All Browser Compatible </li>
							</ul>
									</div>
								</a>
							</div>	
							
						</div>	
							<div class="col-md-12" style="padding-bottom:20px;">
								<h1 style="color:#fff;font-size:28px;font-weight:800;line-height:1.4">Winter Sale Hurry Up Offer For Limited Time Use this Coupon code :<strong style="color: #fbe96c;
    background: rgba(0,0,0,0.1);
    padding: 10px;
    font-weight: 800;
    margin: 10px;
    letter-spacing: 2px;"> OFF40 </strong> Get 40% OFF</h1>
							</div>							
				</div>
			
			</div>
		<?php  
	}
}
add_action('in_admin_header','wpsm_tabs_respnsive_header_info'); 
?>