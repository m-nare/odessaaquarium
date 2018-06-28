

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>stocks">Manage stock</a></li>
  <li class="breadcrumb-item active"><a>Update stock</a></li>
</ol>


<div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h2 class="panel-title" id="panel-main-title"><?php echo $title; ?></h2>
  </div>
  <div class="panel-body">
    <<br>
    <div class="col-md-6 col-md-offset-3">
      <?php echo validation_errors(); ?>
      <?php echo form_open('stocks/update'); ?>
        <input type="hidden" name="stock_id" value="<?php echo $stock['stock_id'] ; ?>">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" placeholder="Add name" value="<?php echo $stock['name'] ; ?>" >
        </div>
        <div class="form-group">
          <label>Quantity in stock</label>
          <input type="text" class="form-control" name="quantity_in_stock" placeholder="Add quantity in stock" value="<?php echo $stock['quantity_in_stock'] ; ?>">
        </div>
        <div class="form-group">
          <label>Unit price</label>
          <input type="text" class="form-control" name="unit_price" placeholder="Add unit price" value="<?php echo $stock['unit_price']; ?>">
        </div>
        <div class="form-group">
          <label>Stock category</label>
          <select class="form-control" name="stock_cat_id">
            <?php foreach($stock_categories as $stock_category) : ?>
              <option value="<?php echo $stock_category['stock_category_id'] ; ?>" <?php if($stock_category['stock_category_id'] == $stock['stock_cat_id']) { echo 'selected' ; } ?>><?php echo $stock_category['stock_category'] ; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <br>
        <button class="btn btn-default" type="submit">Update Stock</button>


        <?php echo form_close() ; ?>


    </div>
  </div>
</div>
