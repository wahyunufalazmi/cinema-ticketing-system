<!DOCTYPE html>
<html>
<head>

	<title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css" media="screen">
</head>

<body>

  <?php $this->load->view('header'); ?><br><br>

  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>

  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= base_url(); ?>assets/images/karen-zhao-643916-unsplash.png" alt="Slide1" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url(); ?>assets/images/jeremy-yap-160713-unsplash.png" alt="Slide2" width="1100" height="500">
    </div>
   <div class="carousel-item ">
      <img src="<?= base_url(); ?>assets/images/julien-andrieux-332817-unsplash.png" alt="Slide3" width="1100" height="500">
    </div>
   <div class="carousel-item">
      <img src="<?= base_url(); ?>assets/images/jeremy-downes-797056-unsplash.png" alt="Slide4" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div><br><br>

   <marquee>
      <table bgcolor="black">
        <td><font color="cyan" size="5" scrollamount="20" face="algerian">TODAY'S MOVIES</font></td>
      </table>
    </marquee><br><br>


    <form method="post" action="<?= base_url(); ?>Welcometiku/booking">
    <div class="container">
      <div class="card-deck">
        <?php foreach ($data as $movie): ?>
        <div class="card"><br>
          <center><img src="<?= base_url(); ?>assets/images/<?= $movie['picture']; ?>" width="250" height="350"></center>
          <div class="card-body">
            <h5 class="card-title"><b><?= $movie['title']; ?></b><br><br> (release : <?= $movie['realese']; ?>)</h5>
             <p class="card-text"><b>Synopsis: </b><br><?= $movie['synopsis']; ?></p>
             <center><button name="id_movie" value="<?= $movie['id_movie']; ?>" type="submit" class="btn btn-danger">Booking</button></center><br>
              <div class="card-footer">
              <small class="text-muted"><b>Description: </b><br><?= $movie['description']; ?></small>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </div>
      </div>
      </form><br><br>


<?php $this->load->view('footer'); ?>

<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.slim.min.jss"></script>
<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.css"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>