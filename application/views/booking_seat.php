<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Booking Seat Page</title>
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

	<center><font face="verdana" color="green" size="5"><b>Choose The Seats</b></font></center><br><hr><br>

	<div class="container">
		<div class="row">
			<div class="col-10">	

				<form method="post" action="<?= base_url(); ?>Welcometiku/transaction">
					<b>Movie:</b>&nbsp;&nbsp;&nbsp;
					<?= $this->session->userdata("title"); ?><br><br>

					<b>Watch-date:</b>&nbsp;&nbsp;&nbsp;
					<?php  
						$wd = $this->session->userdata("watch_date");
						echo date('l', strtotime($wd)).", ".$wd."/ ".$this->session->userdata("schedule");
					?><br><br>

					<b>Name:</b>&nbsp;&nbsp;&nbsp;
					<?php  
						$name = $this->session->userdata("name");
						echo $name;
					?><br><br>

					<b>NIK:</b>&nbsp;&nbsp;&nbsp;
					<?php  
						$nik = $this->session->userdata("nik");
						echo $nik;
					?><br><br>

					<b>Age:</b>&nbsp;&nbsp;&nbsp;
					<?php  
						$age = $this->session->userdata("age");
						echo $age;
					?><br><br>


					<b>Seat</b>
					<table>
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
					</table><br><br>
					Ticket price per sheet Rp. 70.000<br><br>
					<button type="submit" class="btn btn-dark">Submit</button><br><br>
				</form>
			</div>
		</div>
	</div>
	
	<?php $this->load->view('footer'); ?>

	<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.slim.min.jss"></script>
	<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.css"></script>
</body>
</html>