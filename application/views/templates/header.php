<!Doctype html>

<html>
  <header>
    <title>Odessa Aquarium</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/readable.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/webfonts/fontawesome-all.css">
    <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  </header>

  <body>

    <div class="jumbotron jumbotron-main">
			<nav class="navbar navbar-static-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed button" data-toggle="collapse" data-target="#collapsebar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo base_url(); ?>"><strong>Odessa Aquarium</strong></a>
					</div>
					<div id="collapsebar" class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="<?php if($this->uri->segment(1) == FALSE): ?> active <?php endif; ?>"><a href="<?php echo base_url();?>"><strong>Home</strong></a></li>
							<li class="<?php if($this->uri->segment(1) == 'products'): ?> active <?php endif; ?>"><a href="<?php echo base_url();?>products"><strong>Products</strong></a></li>
							<li class="<?php if($this->uri->segment(1) == 'about'): ?> active <?php endif; ?>"><a href="<?php echo base_url();?>about"><strong>About Us</strong></a></li>
							<li class="<?php if($this->uri->segment(1) == 'stocks'): ?> active <?php endif; ?>"><a href="<?php echo base_url(); ?>stocks"><strong>Stock List</strong></a></li>
              <li class="<?php if($this->uri->segment(1) == 'enquiries' && $this->uri->segment(2) == 'create'): ?> active <?php endif; ?>"><a href="<?php echo base_url(); ?>enquiries/create"><strong>Contact Us</strong></a></li>
						</ul>
            <ul class="nav navbar-nav navbar-right">
              <?php if(!$this->session->userdata('logged_in')) : ?>
                <li><a href="<?php echo base_url(); ?>users/login"><strong>Login</strong></a></li>
              <?php endif; ?>
              <?php if($this->session->userdata('logged_in')) : ?>
                <li class="<?php if($this->uri->segment(1) == 'dashboard'): ?> active <?php endif; ?>"><a href="<?php echo base_url(); ?>dashboard/index"><strong><i class="fas fa-cogs"></i> Dashboard</strong></a></li>
                <li class="<?php if($this->uri->segment(1) == 'enquiries'): ?> active <?php endif; ?>"><a href="<?php echo base_url(); ?>enquiries"><strong>Enquiries</strong></a></li>
                <li><a data-toggle="modal" data-target="#confirmLogout"><strong>Logout</strong></a></li>
              <?php endif; ?>
            </ul>
					</div>
          <hr>
				</div>
			</nav>
      <div class="container header">
        <div class="row">
          <div class="col-md-2">
            <img src="<?php echo base_url() ; ?>assets/images/logo5.jpg">
          </div>
          <div class="col-md-5">
            <h2>Odessa Aquarium</h2>
            <p class="lead">Tropical Freshwater Fish</p>
          </div>
        </div>
			</div>
    </div>
    <br>

		<!--</div> -->


<!-- Logout confirm modal -->
<div class="modal fade" id="confirmLogout" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Log out</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to Log out?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a href="<?php echo base_url(); ?>users/logout" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>






    <div class="container">
      <?php if($this->session->flashdata('user_registered')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('enquiry_sent')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('enquiry_sent').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_created')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_deleted')) : ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('category_deleted').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_updated')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_updated').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('stock_created')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('stock_created').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('stock_updated')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('stock_updated').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('stock_deleted')) : ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('stock_deleted').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('login_success')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('login_success').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('login_failed')) : ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('logged_out')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('logged_out').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_updated')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_updated').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_deleted')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_deleted').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('enquiry_deleted')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('enquiry_deleted').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('file_uploaded')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('file_uploaded').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('upload_deleted')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('upload_deleted').'</p>' ; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('download_file_set')) : ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('download_file_set').'</p>' ; ?>
      <?php endif; ?>
