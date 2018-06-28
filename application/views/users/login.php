
<div class="panel panel-default panel-transparent">
  <div class="panel-heading">
    <h2 class="panel-title" id="panel-main-title"><?php echo $title; ?></h2>
  </div>
  <div class="panel-body">
    <?php echo form_open('users/login');?>
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Enter username" required autofocus>
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>

      </div>
    <?php echo form_close(); ?>
  </div>
  <br><br>
</div>
