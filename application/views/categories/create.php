

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
  <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>categories/create">Create category</a></li>
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
      <?php echo form_open_multipart('categories/create'); ?>
        <div class="form-group">
          <label>Stock category</label>
          <input type="text" name="stock_category" class="form-control" placeholder="Add category">
        </div>
        <div class="form-group">
          <label>Upload image</label>
          <input type="file" name="userfile" size="20">
        </div>
        <br>
        <button type="submit" class="btn btn-default">Create category</button>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
