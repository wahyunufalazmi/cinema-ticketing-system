<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css" media="screen">
</head>
<body>

	<?php $this->load->view('header'); ?><br><br>

	<div class="card bg-dark text-white">
		<img src="<?= base_url(); ?>assets/images/udinus.jpg" class="card-img" alt="...">
		<div class="card-img-overlay">
		<center><h1 class="card-title">About : TiKU (Tiket Kampus Udinus) Futurizer Cinemax</h1><br>
		<h5 class="card-text">Is a web-based cinema ticket booking application, providing movies on demand and trending, users only need to book tickets for the desired film and choose the desired seat then payment can be made directly when they are in the Udinus cinema..</h5><br>
		<h3 class="card-text">choose your favorite movie!</h3>
		</div>
	</div>

	<?php $this->load->view('footer'); ?>

	<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.slim.min.jss"></script>
	<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.css"></script>
</body>
</html>