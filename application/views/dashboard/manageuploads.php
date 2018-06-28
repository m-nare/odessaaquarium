
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
  <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard/manageuploads">Manage uploads</a></li>
</ol>


<div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h2 class="panel-title" id="panel-main-title"><?php echo $title; ?></h2>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-hover table-condensed">
      <tr>
        <th>Upload ID</th>
        <th>Upload name</th>
      </tr>
      <?php foreach($uploads as $upload) : ?>
        <tr>
          <td><?php echo $upload['id']; ?></td>
          <td><?php echo $upload['upload_name']; ?></td>
          <td>
            <a href="<?php echo base_url(); ?>dashboard/selectupload/<?php echo $upload['id']; ?>/<?php echo $upload['upload_name']; ?>" class="btn btn-success pull-left">Set file for download</a>
            <?php echo form_open_multipart('dashboard/deleteupload/'.$upload['id']) ; ?>
              <input type="hidden" name="upload_name" value="<?php echo $upload['upload_name']; ?>" >
              <input type="submit" value="delete" class="btn btn-danger">
            <?php echo form_close(); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  </div>
</div>
