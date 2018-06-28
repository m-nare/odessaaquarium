
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
  <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>stocks/create">Create Stock</a></li>
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
      <?php echo form_open('stocks/create'); ?>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" placeholder="Add name">
        </div>
        <div class="form-group">
          <label>Quantity in stock</label>
          <input type="text" class="form-control" name="quantity_in_stock" placeholder="Add quantity in stock">
        </div>
        <div class="form-group">
          <label>Unit price</label>
          <input type="text" class="form-control" name="unit_price" placeholder="Add unit price">
        </div>
        <div class="form-group">
          <label>Stock category</label>
          <select class="form-control" name="stock_cat_id">
            <?php foreach($stock_categories as $stock_category) : ?>
              <option value="<?php echo $stock_category['stock_category_id'] ; ?>"><?php echo $stock_category['stock_category'] ; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <br>
        <button class="btn btn-default" type="submit">Add Stock</button>


        <?php echo form_close() ; ?>


    </div>
  </div>
</div>
