<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 8/14/2018
 * Time: 12:29 AM
 */

if(!isset($time_stamp_list)) {
	$time_stamp_list = array();
}
if(!isset($time_stamp_header)){
	$time_stamp_header = array();
}
if(!isset($error)){
	$error = "";
}
if(!isset($message)){
	$message = "";
}
if(!isset($time_total)){
	$time_total = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<!-- Display icon -->
	<link rel="icon" href="" type="image/x-icon"/>
	<!-- Title Tags-->
	<title>Time Stamp</title>

	<!-- CSS -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Custom -->
	<link href="<?php echo CSS_URL; ?>timestamp.css" rel="stylesheet" />

</head>
<body>
<nav>
	<a href="?action=logout"></a>
</nav>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div>
				<h2>Time Stamp</h2>
			</div>
			<form method="post" action="?action=logout">
				<button type="submit" class="btn btn-primary float-right">Logout</button>
			</form>
		</div>
		<div class="container">
			<?php if($error): ?>
				<div class="card text-white bg-danger">
					<div class="card-body">
						<div class="card-header">
							<h4>Error</h4>
						</div>
						<p class="card-text">
							<?php echo $error; ?>
						</p>
					</div>
				</div>
			<?php elseif($message): ?>
				<div class="card text-white bg-success">
					<div class="card-header">
						<h4>Success</h4>
					</div>
					<div class="card-body">
						<p class="card-text">
							<?php echo $message; ?>
						</p>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="card-body">
			<table class="table">
				<thead>
				<tr>
					<?php foreach($time_stamp_header as $header): ?>
						<th>
							<?php echo $header; ?>
						</th>
					<?php endforeach; ?>
				</tr>
				</thead>
				<tbody>
				<?php foreach($time_stamp_list as $time_stamp): ?>
					<tr>
						<?php foreach($time_stamp_header as $field => $header): ?>
							<td>
								<?php if($field == "end" && !$time_stamp[$field]): ?>
									<form method="post" action="?action=update">
										<button type="submit" class="btn btn-block" name="id" value="<?php echo $time_stamp["id"]; ?>">End</button>
									</form>
								<?php elseif($field == "delete"): ?>
									<form method="post" action="?action=delete">
										<button type="submit" class="btn btn-block" name="id" value="<?php echo $time_stamp["id"]; ?>">
											<span>cross</span>
										</button>
									</form>
								<?php else: ?>
									<?php echo $time_stamp[$field]; ?>
								<?php endif; ?>
							</td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			<div class="summary float-right">
				<table class="table">
					<tr>
						<td>Total Payable Hours: </td>
						<td><?php echo $time_total; ?></td>
					</tr>
					<tr>
						<td>Total Payable (HKD): </td>
						<td><?php echo $payable; ?></td>
					</tr>
				</table>
			</div>
			<form method="post" action="?action=invoice">
				<button type="submit" class="btn btn-primary">Generate Invoice</button>
			</form>
		</div>
<!--		--><?php //if(in_array("admin", $groups, TRUE)):?>
<!--		--><?php //if($admin): ?>
			<div class="card-footer">
				<form method="post" action="?action=create">
					<div>
						<h3>Create New Time Stamp</h3>
					</div>
					<div class="form-group">
						<label>User</label>
						<input type="text" class="form-control" name="user" placeholder="User">
					</div>
					<div class="form-group">
						<label>Purpose</label>
						<textarea type="text" class="form-control" name="purpose" placeholder="Purpose"></textarea>
					</div>
					<button type="submit" class="btn btn-primary float-right">Start Stamp</button>
				</form>
			</div>
<!--		--><?php //endif;?>
	</div>
</div>

<!-- JavaScript -->
<!-- JQuery (allow individual page calls) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Custom -->
<script src="<?php echo JS_URL; ?>timestamp.js"></script>
</body>
</html>
