

<?php if($this->session->userdata('logged_in')) : ?>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>stocks">Manage Stock</a></li>
  </ol>
<?php else : ?>
  <ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>stocks">Stock List</a></li>
  </ol>
<?php endif; ?>


<?php if($this->session->userdata('logged_in')) : ?>
  <a href="<?php echo base_url(); ?>dashboard/index" class="btn btn-default"><i class="fas fa-arrow-left"></i> Back to the dashboard</a>
  <br><br>
<?php endif; ?>

<div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h2 class="panel-title" id="panel-main-title"><?php echo $title; ?></h2>
  </div>
  <div class="panel-body">

    <div class="box transparent">
      <h4>Download stock list</h4>
      <hr>
        <a href="<?php echo site_url('stocks/download/'.$id=1); ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Download stock list in PDF format" target="_blank">Download PDF</a>
        <a href="<?php echo site_url('stocks/download/'.$id=2); ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Download stock list in DOCX format" target="_blank">Download Word document</a>
    </div>
    <br><br>

    <div class="panel-group" id="accordion" role="tab-list" aria-multiselectable="true">
      <?php foreach($category_stock as $stock_category => $category_stocks ) : ?>
        <div class="panel panel-default panel-transparent">
          <div class="panel-heading" role="tab" id="stock-heading">
            <h3 class="panel-title" id="panel-main-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#stock" aria-expanded="true" aria-controls="stock">
                <u><?php echo $stock_category ; ?></u>
                <hr>
                <img class="category-thumb" src="<?php echo base_url(); ?>assets/images/categories/<?php foreach($category_image as $image){if($stock_category == $image['stock_category']){echo $image['category_image'];}}?>">
              </a>
            </h3>
          </div>
          <div class="panel-collapse collapse in" id="stock" role="tabpanel" aria-labelledby="stock-heading">
          <div class="panel-body">
            <div class="table-responsive">
            <table class="table table-hover table-condensed table-bordered">
                <tr>
                  <th><u>Name</u></th>
                  <th><u>Quantity in Stock</u></th>
                  <th><u>Unit price / (USD)</u></th>
                </tr>

                <?php foreach($category_stocks as $stock) : ?>
                  <tr>
                    <td><?php echo $stock['name']; ?></td>
                    <td><?php echo $stock['quantity_in_stock']; ?></td>
                    <td><?php echo $stock['unit_price']; ?></td>
                    <?php if($this->session->userdata('logged_in')) : ?>
                      <td>
                        <a href="stocks/edit/<?php echo $stock['stock_id']; ?>" class="btn btn-default pull-left">Edit</a>
                        <?php echo form_open('stocks/delete/'.$stock['stock_id']); ?>
    		                  <input type="button" value="delete" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" data-title="Delete stock" data-message="Are you sure you want to delete this stock?">
    	                  <?php echo form_close(); ?>
                      </td>
                    <?php endif; ?>
                  </tr>
                <?php endforeach; ?>
            </table>
            </div>
          </div><!--panel-body-->
        </div><!--panel-->
        <br><br>
      <?php endforeach; ?>
    </div><!--panel-group-->




    <!-- Modal Dialog -->
    <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Delete Parmanently</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure about this ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="confirm"><i class="fa fa-trash"></i> Delete</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Dialog show event handler -->
    <script type="text/javascript">
      $('#confirmDelete').on('show.bs.modal', function (e) {
          $message = $(e.relatedTarget).attr('data-message');
          $(this).find('.modal-body p').text($message);
          $title = $(e.relatedTarget).attr('data-title');
          $(this).find('.modal-title').text($title);

          // Pass form reference to modal for submission on yes/ok
          var form = $(e.relatedTarget).closest('form');
          $(this).find('.modal-footer #confirm').data('form', form);
      });

      <!-- Form confirm (yes/ok) handler, submits form -->
      $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
          $(this).data('form').submit();
      });
    </script>
