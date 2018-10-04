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
	<title>login</title>

	<!-- CSS -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Custom -->
	<link href="<?php echo CSS_URL; ?>invoice.css" rel="stylesheet" />

</head>
<body>
<div class="invoice vertical-center">
	<div class="container">
		<div class="row">
			<div class="col-6">
				<img src="<?php echo IMG_URL; ?>logo.png">
				<table class="contact table table-borderless">
					<tr>
						<td>
							Phone Number;
						</td>
						<td>
							+852 6161 6929
						</td>
					</tr>
					<tr>
						<td>
							Email:
						</td>
						<td>
							<a href="mailto::contact@syeung527.com">contact@syeung527.com</a>
						</td>
					</tr>
					<tr>
						<td>
							Website:
						</td>
						<td>
							<a href="http://www.syeung527.com">http://www.syeung527.com</a><
						</td>
					</tr>
				</table>
			</div>
			<div class="col-6">
				<h2 class="title float-right">Invoice</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<div class="card bg-light">
					<div class="card-title">
						<h5>Bill to:</h5>
					</div>
					<div class="card-body">
						<p><?php echo $customer_name; ?></p>
						<p><?php echo $customer_address; ?></p>
					</div>
				</div>
			</div>
			<div class="col-6">
				<table class="table float-right">
					<tr>
						<td>Date:</td>
						<td><?php echo $today_date; ?></td>
					</tr>
					<tr>
						<td>Invoice Number:</td>
						<td><?php echo $invoice_num; ?></td>
					</tr>
					<tr>
						<td>Due Date:</td>
						<td><?php echo $due_date; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<table class="table table-striped">
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
			</div>
		</div>
		<div class="row">
			<div class="col-8">
				<div class="card bg-light">
					<div class="card-title">
						<h5>Terms and Conditions</h5>
					</div>
					<div class="card-body">
						<p>The payment due date is dated to the 30th date of the last entry.</p>
						<p>Please find the payment details below: </p>
						<table class="table">
							<tr>
								<td>Name</td>
								<td>Chi Fung Stanley Yeung</td>
							</tr>
							<tr>
								<td>Bank</td>
								<td>HSBC</td>
							</tr>
							<tr>
								<td>Bank Number</td>
								<td>819-455734-292</td>
							</tr>
						</table>
						<p>If you have any concerns towards this invoice, please feel free to contact me through </p>
						<table class="table">
							<tr>
								<td>Phone</td>
								<td>+852 6161 6929</td>
							</tr>
							<tr>
								<td>Email</td>
								<td><a href="mailto::contact@syeung527.com">contact@syeung527.com</a></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-4">
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
<script src="<?php echo JS_URL; ?>invoice.js"></script>
</body>
</html>
