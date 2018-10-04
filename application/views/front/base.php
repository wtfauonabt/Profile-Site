<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$initial_title_lang = $this->lang->line('initial_title');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
		<!-------------------------- META TAGS --------------------------->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Personal website">
        <meta name="author" content="Stanley Yeung">

        <title>Stanley Yeung | BSc Computer Science</title>

		<!---------------------------------------------------------------->

		<!-------------------------- CSS FILES --------------------------->
        <!-- Custom Fonts -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo CSS_URL ?>custom_v_0_5.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="<?php echo CSS_URL ?>theme.min.css" rel="stylesheet" >

<!--        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>-->
<!--        <link rel="apple-touch-icon" href="apple-touch-icon.png">-->
		<!---------------------------------------------------------------->
    </head>

    <body id="page-top">

		<!-------------------------- CHECKING --------------------------->
		<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		<!---------------------------------------------------------------->


		<!------------------------- MAIN FILES --------------------------->
		<!-- Navigation -->
		<?php $this->load->view("front/nav"); ?>

		<!-- Header -->
		<?php $this->load->view("front/header"); ?>

		<!-- Profile -->
		<?php $this->load->view("front/profile"); ?>

		<!-- Portfolio -->
		<?php $this->load->view("front/portfolio"); ?>

		<!-- Skills -->
		<?php $this->load->view("front/skills"); ?>

		<!-- Experience -->
		<?php $this->load->view("front/experience"); ?>

		<!-- Contact -->
		<?php $this->load->view("front/contact"); ?>

		<!-- Contact -->
		<?php $this->load->view("front/footer"); ?>
		<!---------------------------------------------------------------->

		<!-------------------------- JS FILES --------------------------->
        <!-- jQuery v1.11.1-->
        <script src="<?php echo JS_URL ?>jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo JS_URL ?>bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="<?php echo JS_URL ?>classie.js"></script>
        <script src="<?php echo JS_URL ?>cbpAnimatedHeader.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="<?php echo JS_URL ?>jqBootstrapValidation.js"></script>
        <script src="<?php echo JS_URL ?>contact_me.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo JS_URL ?>custom_v_0_5.js"></script>


<!--        <script>-->
<!--            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=-->
<!--            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;-->
<!--            e=o.createElement(i);r=o.getElementsByTagName(i)[0];-->
<!--            e.src='//www.google-analytics.com/analytics.js';-->
<!--            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));-->
<!---->
<!--            ga('create','UA-72250021-1','auto');-->
<!--            ga('send','pageview');-->
<!---->
<!--        </script>-->
<!---->
<!---->
<!--        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>-->
<!--        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>-->

		<!---------------------------------------------------------------->

    </body>
</html>
