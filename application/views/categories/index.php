
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
  <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>categories">Manage categories</a></li>
</ol>


<a href="<?php echo base_url(); ?>dashboard/index" class="btn btn-default"><i class="fas fa-arrow-left"></i> Back to the dashboard</a>
<br><br>


<div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h2 class="panel-title" id="panel-main-title"><?php echo $title; ?></h2>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-hover table-condensed table-bordered">
        <tr>
          <th><u>Category Id</u></th>
          <th><u>Category</u></th>
          <th><u>Image</u></th>
        </tr>
        <?php foreach($categories as $category) : ?>
          <tr>
            <td><?php echo $category['stock_category_id']; ?></td>
            <td><?php echo $category['stock_category']; ?></td>
            <td>
			           <img class="category-thumb" src="<?php echo base_url(); ?>assets/images/categories/<?php echo $category['category_image']; ?>">
            </td>
            <?php if($this->session->userdata('user_id') == $category['user_id'] ): ?>
              <td>
                <a href="categories/edit/<?php echo $category['stock_category_id']; ?>" class="btn btn-default pull-left">Edit</a>
                <?php echo form_open('categories/delete/'.$category['stock_category_id']); ?>
                  <input type="button" value="delete" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" data-title="Delete category" data-message="Are you sure you want to delete this category?">
                <?php echo form_close(); ?>
              </td>
            <?php endif; ?>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

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
