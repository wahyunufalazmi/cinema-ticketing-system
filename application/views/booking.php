<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Booking Page</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<script>
	  		$( function() {
	   			$( "#watch_date" ).datepicker({
	   				minDate: 0
	   			});
	  		});
	  	</script>
</head>
<body>
	<?php $this->load->view('header'); ?><br><br><br><br>

	<center><font face="verdana" color="blue" size="5"><b>Booking This Film</b></font></center><br><hr><br>

	<div class="container">
	<form method="post" action="<?= base_url(); ?>Welcometiku/booking_seat">
		<img width="250" height="350" src="<?= base_url(); ?>assets/images/<?= $data['movie'][0]['picture']; ?>"><br><br>

		<h3><b><?= $data['movie'][0]['title']; ?></h3></b><br><br>

		<b>Synopsis: </b><br>

		<p><?= $data['movie'][0]['synopsis']; ?></p><br><br>

		<b>Description: </b><br>

		<p><small><?= $data['movie'][0]['description']; ?></small></p><br><br>

		<b>Date: </b>&nbsp;&nbsp;&nbsp;

		<input type="text" name="watch_date" id="watch_date" placeholder="choose date to watch" required><br><br><br>

		<b>Name: </b>&nbsp;&nbsp;&nbsp;

		<input type="text" name="name" placeholder="input your name" required><br><br><br>

		<b>NIK: </b>&nbsp;&nbsp;&nbsp;

		<input type="text" name="nik" placeholder="input your NIK" required><br><br><br>

		<b>Age: </b>&nbsp;&nbsp;&nbsp;

		<input type="number" name="age" placeholder="input your age" required><br><br><br>

		<b>Schedule: </b>&nbsp;&nbsp;&nbsp;

		    <select name="schedule" style="width:160px;">
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "bioskop");
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($koneksi, "SELECT * FROM schedule ORDER BY id_schedule");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <option value="<?=$data['id_schedule'];?>"><?php echo $data['schedule'];?></option>
                <?php
                }
                ?>
            </select><br><br><br>
		

		<center><button class="btn btn-info" type="submit">Send</button></center><br><br>

	</form>
	</div>
	
	<?php $this->load->view('footer'); ?>

	<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.slim.min.jss"></script>
	<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.css"></script>
</body>
</html>