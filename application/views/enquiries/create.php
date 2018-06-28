
<ol class="breadcrumb">
  <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>enquiries/create">Contact Us</a></li>
</ol>

<div class="row">
  <div class="col-md-4">
    <div class="panel panel-default panel-transparent">
      <div class="panel-heading">
        <h2 class="panel-title" id="panel-main"><?php echo $title; ?></h2>
      </div>
      <div class="panel-body">
        <p><u>Address</u></p>
        <p>No.00A,</p>
        <p>HG STREET, CITY,</p>
        <p>COUNTRY</p>
        <hr>
        <p><u>Contact Number</u></p>
        <p>+94-11-111-1111</p>
        <p>+94-22-222-2222</p>
        <hr>
        <p><u>Email</u></p>
        <p>odessaaquarium@gmail.com</p>
        <p>oedssaaquarium1@gmail.com</p>
        <hr>
        <p>09.00 am to 05.00 pm Monday-Friday</p>
        <p>10.00 am to 04.30 pm Saturday/Sunday</p>
        <hr>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="panel panel-default panel-transparent">
      <div class="panel-heading">
        <h2 class="panel-title">
          Enquiries
        </h2>
      </div>
      <div class="panel-body">
        <?php echo validation_errors(); ?>
        <?php echo form_open('enquiries/create'); ?>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Add name">
          </div>
          <div class="form-group">
            <label>E-mail</label>
            <input type="email" class="form-control" name="email" placeholder="Add email">
          </div>
          <div class="form-group">
            <label>Contact number</label>
            <input type="text" class="form-control" name="phone_number" placeholder="Add contact number">
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" name="message" placeholder="Add message"></textarea>
          </div>
          <br>
          <button class="btn btn-primary" type="submit">Send enquiry</button>
        </form>
      </div>
    </div>
  </div>
</div>
