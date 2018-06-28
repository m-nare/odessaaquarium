
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
  <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>users/register">Add User</a></li>
</ol>


<a href="<?php echo base_url(); ?>dashboard/index" class="btn btn-default"><i class="fas fa-arrow-left"></i> Back to the dashboard</a>
<br><br>

<div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h2 class="panel-title" id="panel-main-title"><?php echo $title; ?></h2>
  </div>
  <div class="panel-body">
    <br>
    <div class="col-md-6 col-md-offset-3">
      <?php echo validation_errors(); ?>
      <?php echo form_open('users/register'); ?>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" placeholder="Add name">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" placeholder="Add email">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" placeholder="Add username">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Add password">
        </div>
        <div class="form-group">
          <label>Confirm password</label>
          <input type="password" class="form-control" name="password2" placeholder="Confirm password">
        </div>
        <br>
        <button class="btn btn-default" type="submit">Register user</button>


        <?php echo form_close() ; ?>


    </div>
  </div>
</div>
