
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
  <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>enquiries">Enquiries</a></li>
</ol>


<div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h2 class="panel-title"><?php echo $title; ?> <span class="badge"><?php echo count($enquiries); ?></span></h2>
  </div>

  <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-hover table-bordered table-condensed">
      <tr>
        <th>Enquiry ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>Message</th>
        <th>Date of enquiry</th>
      </tr>
      <?php foreach($enquiries as $enquiry) : ?>
        <tr>
          <td><?php echo $enquiry['enquiry_id']; ?></td>
          <td><?php echo $enquiry['name']; ?></td>
          <td><?php echo $enquiry['email']; ?></td>
          <td><?php echo $enquiry['phone_number']; ?></td>
          <td><?php echo $enquiry['message']; ?></td>
          <td><?php echo $enquiry['date_of_enquiry']; ?></td>
          <td>
            <?php echo form_open('enquiries/delete/'.$enquiry['enquiry_id']) ; ?>
              <input type="button" value="Delete" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" data-title="Delete enquiry" data-message="Are you sure you want to delete this enquiry?">
            <?php echo form_close(); ?>
          </td>
        </tr>
      <?php endforeach; ?>

    </table>
  </div>
  <br>
  <div class="box transparent">
    <h4>Download enquiries</h4>
    <hr>
      <a href="<?php echo site_url('fpdf_mysql_pdf/index'); ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Download a compiled version of enquiries" target="_blank">Download Enquiries</a>
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
