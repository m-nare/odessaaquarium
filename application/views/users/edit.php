
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>users">Manage users</a></li>
  <li class="breadcrumb-item active"><a>Update User</a></li>
</ol>


<div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h2 class="panel-title" id="panel-main-title"><?php echo $title; ?></h2>
  </div>
  <div class="panel-body">
    <br>
    <div class="col-md-6 col-md-offset-3">
      <?php echo validation_errors(); ?>
      <?php echo form_open('users/update'); ?>
        <input type="hidden" name="id" value="<?php echo $user['id'] ; ?>">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" placeholder="Add name" value="<?php echo $user['name']; ?>">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" placeholder="Add email" value="<?php echo $user['email']; ?>">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" placeholder="Add username" value="<?php echo $user['username']; ?>">
        </div>
        <br>
        <button class="btn btn-default" type="submit">Update user</button>

        <?php echo form_close() ; ?>

    </div>
  </div>
</div>
