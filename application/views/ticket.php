<!DOCTYPE html>
<html>
<head>
	<title>Your Ticket</title>
</head>
<body>
	<?php $this->load->view('header'); ?><br><br><br><br>

	<font face="calibri" size="7" color="purple"><center><b>Your Ticket</b></center></font><br>

	<script>
		function printContent(el){
	    var restorepage = document.body.innerHTML;
	    var printcontent = document.getElementById(el).innerHTML;
	    document.body.innerHTML = printcontent;
	    window.print();
	    document.body.innerHTML = restorepage;
	}
	</script>

	<div class="container" id="printableArea">
	<div class="card-deck">
	
	<?php foreach ($data['seat'] as $seat): ?>
	  <div class="card">
	    <div class="card-body"><table>
	    	<tr><td>
	      <h5 class="card-title"><center><b>TiKU Futurizer Cinemax's Ticket</b></h5>
	      	</td></tr>
	      	<tr><td>
	      <p class="card-text">Movie title  </td><td><?= $this->session->userdata("title"); ?></td></tr>
	      	<tr><td>Schedule  </td><td><?= $this->session->userdata("schedule"); ?></td>
	      		<tr><td>Date  </td>
	      		<td><?php $wd = $this->session->userdata("watch_date");
					echo date('l', strtotime($wd)).", ".$wd; ?></td></tr>
					<tr><td>Name  </td> 
	      		<td><?= $name = $this->session->userdata("name"); ?></td></tr>
					<tr><td>NIK  </td> 
	      		<td><?= $nik = $this->session->userdata("nik"); ?></td></tr>
					<tr><td>Age  </td> 
	      		<td><?= $age = $this->session->userdata("age"); ?></td></tr>
	      	<tr><td>Seat  </td><td><?= $seat; ?></p></td></tr>
	      <tr><td><p class="card-text"><small class="text-muted"><center><hr><b>leave it to the ticket officer at the entrance</b><br><hr></center></small></p></td></tr></table>
	    </div>
	  </div>
	  <?php endforeach ?>
	  
	</div>
	</div><br><br>

	<div align="center"><button class="btn btn-dark" onclick="printContent('printableArea')">Print</button></div><br><br><br><br><br>
	

	<?php $this->load->view('footer'); ?>

	<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.slim.min.jss"></script>
	<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.css"></script>

</body>
</html>