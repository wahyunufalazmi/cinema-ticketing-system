<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Seat Page</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css" media="screen">


		<style type="text/css">
			.txt-center{
				text-align: center;
			}

			input[type=checkbox]{
				width: 25px;
				margin: 20px;
				cursor: pointer;
			}

			input[type=checkbox]:before {
				content: "";
				width: 50px;
				height: 50px;
				border-radius: 5px;
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px;
				display: inline-block;
				vertical-align: middle;
				text-align: center;
				border: 3px solid blue;
				background-color: aqua;
			}

			input[type=checkbox]:checked:before {
				background-color: lime;
			}

			input[type=checkbox]:disabled:before {
				background-color: red;
			}
		</style>
</head>
<body>
	<?php $this->load->view('header'); ?><br><br><br><br>

	<center><font face="verdana" color="blue" size="5"><b>Edit Seats</b></font></center><br><br>
	<form method="post" action="<?= base_url(); ?>index.php/Welcometiku/transaction">
	<div class="container">
		<div class="card mb-3">
		  <div class="row no-gutters">
		    <div class="col-md-10">
		      <div class="card-body">
		        <h5 class="card-title"><?= $this->session->userdata("title"); ?></h5>
		        <p class="card-text"><?php
		        	$wd = $this->session->userdata("watch_date");
					echo date('l', strtotime($wd)).", ".$wd;
		         ?></p>
		        <p class="card-text"><small class="text-muted">Schedule : <?= $this->session->userdata("schedule"); ?></small></p>
		      </div>
		    </div>
		  </div>
		</div>
	</div>

	<div class="container">
	  <div class="row">

		<div class="col-2"><br><br><b>Edit seat</b><br><br>
			<button class="btn btn-success" type="submit">Update Seat</button><br><br>
		</div>
		<div class="col-10">
			
			<div class="seatStructure txt-center"><br><br>
				<table id="seatblock">
					<tr>
						<td></td>
						<td>1</td>
						<td>2</td>
						<td>3</td>
						<td>4</td>
					</tr>
					<tr>
							<?php
							$k = 0;
							for($i='A'; $i<='E'; $i++){ ?>

							<tr>
								<td><?= $i; ?></td>
								<?php for($j=1; $j<=4; $j++){
								$ij = $data['seat'][$k]['numb_seat']; ?>
								
								<td>
									<input type="checkbox" name="choose_seat[]" value="<?= $ij; ?>"
									<?php
										foreach ($data['seat_checked'] as $seat) {
											if ($ij == $seat) {
												echo "checked";
											}
										}

										for($x=0; $x<count($data['seat_booked']); $x++){
										if($ij == $data['seat_booked'][$x]['numb_seat'])
											echo "disabled";
										}
									?>
									>
								</td>
								<?php $k++; } ?>
							</tr>
							
							<?php } ?>
					</tr>
			
				</table><br>
				
				<style type="text/css">
					.p1{
						text-align: left;
					}
				</style><br><br>
				<p class="p1">Ticket price per sheet Rp. 70.000</p><br>

				<form class="form-horizontal" method="post" action="<?= base_url()."Welcometiku/edit_identity"; ?>">
				<b>Your Name</b>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="name" placeholder="<?= $name = $this->session->userdata('name'); ?>"><br><br>
				<b>Your NIK</b>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="nik" placeholder="<?= $name = $this->session->userdata('nik'); ?>"><br><br>
				<b>Your Age</b>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="number" min="1" name="age" placeholder="<?= $name = $this->session->userdata('age'); ?>"><br><br>
				
				<button type="submit" class="btn btn-info">Update Identity</button><br><br>
				</form>
				
			</div>
		</div>
	   </div>
	</div>
</form>

	<?php $this->load->view('footer'); ?>

	<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.slim.min.jss"></script>
	<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.css"></script>
</body>
</html>