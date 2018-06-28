

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>categories">Manage categories</a></li>
  <li class="breadcrumb-item active"><a>Update category</a></li>
</ol>

<div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h2 class="panel-title" id="panel-main-title"><?php echo $title; ?></h2>
  </div>
  <div class="panel-body">
    <br>
    <div class="col-md-6 col-md-offset-3">
      <?php echo form_open_multipart('categories/update'); ?>
        <input type="hidden" name="stock_category_id" value="<?php echo $stock_category['stock_category_id']; ?>" >
        <div class="form-group">
          <label>Stock category id - <?php echo $stock_category['stock_category_id']; ?></label>
        </div>
        <div class="form-group">
          <label>Stock category</label>
          <input type="text" name="stock_category" class="form-control" placeholder="Add category" value="<?php echo $stock_category['stock_category']; ?>">
        </div>
        <div class="form-group">
          <label>Upload image</label>
          <input type="file" name="userfile" size="20">
        </div>
        <input type="hidden" name="old_cat_image" value="<?php echo $stock_category['category_image']; ?>">
        <br>
        <button type="submit" class="btn btn-default">Update category</button>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
