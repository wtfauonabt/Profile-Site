<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 8/14/2018
 * Time: 12:29 AM
 */
if(!isset($message)){
	$message = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<!-- Display icon -->
	<link rel="icon" href="" type="image/x-icon"/>
	<!-- Title Tags-->
	<title>login</title>

	<!-- CSS -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Custom -->
	<link href="<?php echo CSS_URL; ?>user.css" rel="stylesheet" />

</head>
<body>
	<div class="login vertical-center">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<form method="post" action="">
						<div class="text-center">
							<h3>Projects Login</h3>
						</div>
						<?php if($message): ?>
							<div class="alert alert-warning" role="alert">
								<p><?php echo $message?></p>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<input type="text" class="form-control" name="email" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						<div class="form-group">
							<div class="form-check text-center">
								<input class="form-check-input" type="checkbox" name="remember">
								<label class="form-check-label">Remember Me</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>


<!-- JavaScript -->
<!-- JQuery (allow individual page calls) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Custom -->
<script src="<?php echo JS_URL; ?>user.js"></script>
</body>
</html>
