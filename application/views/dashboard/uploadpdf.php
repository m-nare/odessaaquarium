
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
  <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard/uploadpdf">Upload pdf</a></li>
</ol>

<div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h2 class="panel-title" id="panel-main-title"><?php echo $title ?></h2>
  </div>
  <div class="panel-body">
    <?php echo form_open_multipart('dashboard/uploadpdffile'); ?>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Upload PDF</label>
            <input type="file" name="userfile" >
          </div>
        </div>
      </div>
      <br>
      <input type="submit" class="btn btn-default" value="Submit PDF Document">
    <?php echo form_close(); ?>
  </div>
</div>
