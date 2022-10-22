<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order Page</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css" media="screen">
</head>
<body>
	<?php $this->load->view('header'); ?><br><br><br>


	<center><font face="sans-serif" color="purple" size="6"><b>You're Order</b></font></center><hr>
	<div class="container">
		
		<h4><?= $this->session->userdata("title"); ?></h4><br>
		<p><b>Watch-date : </b>&nbsp;&nbsp;&nbsp;<?php $wd = $this->session->userdata("watch_date");
				echo date('l', strtotime($wd)).", ".$wd."/ ".$this->session->userdata("schedule");
		 ?></p>
		 <p><b>Name : </b>&nbsp;&nbsp;&nbsp;<?php $name = $this->session->userdata("name"); echo $name; ?></p>
		 <p><b>NIK : </b>&nbsp;&nbsp;&nbsp;<?php $nik = $this->session->userdata("nik"); echo $nik; ?></p>
		 <p><b>Age : </b>&nbsp;&nbsp;&nbsp;<?php $age = $this->session->userdata("age"); echo $age; ?></p>

		 <b>Your choosed seats:</b><br><br>
		 <ul type="circle">
		 	<?php
		 	 $i=0;
		 	foreach ($data['seat'] as $seat) : ?>
		 		<li>
		 			<form method="post" action="<?= base_url()."index.php/Welcometiku/delete_seat/$i"; ?>">
		 				<b><?= $seat; ?></b>&nbsp;&nbsp;&nbsp;
		 				<button type="submit" class="btn btn-danger">Delete</button><br><br>
		 			</form>
		 		</li>
		 		<?php $i++; ?>
		 	<?php endforeach ?>
		 </ul><br>
		 <p><b>Subtotal : Rp. <?= number_format(count($data['seat'])*70000); ?></b></p><br>

		
		<style type="text/css">
			td{
				padding: 20px;
			}
		</style>
		
		 <table>
		 	
		 	<tr>
		 		<td>
		 			<form class="form-horizontal" method="post" action="<?= base_url()."Welcometiku/edit"; ?>">
					 	<button type="submit" class="btn btn-outline-success">Edit Seat or Identity</button>
					 </form>
		 		</td>
		 		<td>
		 			<form class="form-horizontal" method="post" action="<?= base_url()."Welcometiku/pay"; ?>">
					 	<button type="submit" class="btn btn-outline-primary">Go To Ticket</button>
					 </form>
		 		</td>
		 	</tr>
		  
		 </table><br><br><br><br><br>
	</div>


	<?php $this->load->view('footer'); ?>

	<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.slim.min.jss"></script>
	<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.css"></script>
</body>
</html>