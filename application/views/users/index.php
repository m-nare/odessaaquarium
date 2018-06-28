
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
  <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>users">Manage users</a></li>
</ol>


<a href="<?php echo base_url(); ?>dashboard/index" class="btn btn-default"><i class="fas fa-arrow-left"></i> Back to the dashboard</a>
<br><br>

<div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h2 class="panel-title" id="panel-main-title"><?php echo $title; ?></h2>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-hover table-condensed">
      <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Date Registered</th>
      </tr>
      <?php foreach($users as $user) : ?>
        <tr>
          <td><?php echo $user['id'] ; ?></td>
          <td><?php echo $user['name'] ; ?></td>
          <td><?php echo $user['email'] ; ?></td>
          <td><?php echo $user['username'] ; ?></td>
          <td><?php echo $user['date_created'] ; ?></td>

            <td>
              <a href="users/edit/<?php echo $user['id']; ?>" class="btn btn-default pull-left">Edit</a>
              <?php echo form_open('users/delete/'.$user['id']); ?>
                <input type="button" value="delete" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" data-title="Delete user" data-message="Are you sure you want to delete this user?">
              <?php echo form_close(); ?>
            </td>

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
