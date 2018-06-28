
<ol class="breadcrumb">
  <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
</ol>

<div class="panel panel-default panel-transparent" id="dashboard">
  <div class="panel-heading">
    <h1><i class="fas fa-cogs"></i> <?php echo $title; ?> <small id="sub-heading">Manage Odessa aquarium site</small></h1>
    <h2 class="panel-title" id="panel-main-title"></h2>
  </div>
  <div class="panel-body">
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="<?php echo base_url(); ?>dashboard/index" class="list-group-item" id="item-main"><i class="fas fa-tachometer-alt"></i> Overview</a>
          <a href="<?php echo base_url(); ?>enquiries" class="list-group-item"><i class="fas fa-envelope"></i> Enquiries <span class="badge"><?php echo count($enquiries); ?></span></a>
          <a href="<?php echo base_url(); ?>stocks" class="list-group-item"><i class="fas fa-clipboard-list"></i> Stock List <span class="badge"><?php echo count($stocks); ?></span></a>
          <a href="<?php echo base_url(); ?>categories" class="list-group-item"><i class="fas fa-th-list"></i> Stock Category <span class="badge"><?php echo count($categories); ?></span></a>
          <a href="<?php echo base_url(); ?>users" class="list-group-item"><i class="fas fa-users-cog"></i> Users <span class="badge"><?php echo count($users); ?></span></a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="panel panel-default panel-transparent" >
          <div class="panel-heading" id="item-main">
            <h2 class="panel-title"><i class="fas fa-cogs"></i> Dashboard</h2>
          </div>
          <div class="panel-body">
            <div class="col-md-3">
             <div class="well" id="box-dashboard">
               <a href="<?php echo base_url(); ?>users/register"><h2><i class="fas fa-user-plus"></i></h2><h6>Add User</h6></a>
             </div>
           </div>
           <div class="col-md-3">
            <div class="well" id="box-dashboard">
              <a href="<?php echo base_url(); ?>users"><h2><i class="fas fa-users-cog"></i></h2><h6>Manage Users</h6></a>
            </div>
          </div>
          <div class="col-md-3">
           <div class="well" id="box-dashboard">
             <a href="<?php echo base_url(); ?>stocks/create"><h2><i class="fas fa-plus-square"></i></h2><h6>Add Stock</h6></a>
           </div>
         </div>
         <div class="col-md-3">
          <div class="well" id="box-dashboard">
            <a href="<?php echo base_url(); ?>stocks"><h2><i class="fas fa-clipboard-list"></i></h2><h6>Manage Stock</h6></a>
          </div>
         </div>
         <div class="col-md-3">
          <div class="well" id="box-dashboard">
            <a href="<?php echo base_url(); ?>categories/create"><h2><i class="fas fa-plus-square"></i></h2><h6>Add Category</h6></a>
          </div>
         </div>
         <div class="col-md-3">
          <div class="well" id="box-dashboard">
            <a href="<?php echo base_url(); ?>categories"><h2><i class="fas fa-th-list"></i></h2><h6>Manage Categories</h6></a>
          </div>
         </div>
         <div class="col-md-3">
          <div class="well" id="box-dashboard">
            <a href="<?php echo base_url(); ?>enquiries"><h2><i class="fas fa-envelope"></i></h2><h6>Enquiries</h6></a>
          </div>
         </div>
         <div class="col-md-3">
          <div class="well" id="box-dashboard">
            <a href="<?php echo base_url(); ?>dashboard/uploadpdf"><h2><i class="fas fa-upload"></i></h2><h6>Upload PDF Stock List</h6></a>
          </div>
         </div>
         <div class="col-md-3">
          <div class="well" id="box-dashboard">
            <a href="<?php echo base_url(); ?>dashboard/uploaddocx"><h2><i class="fas fa-upload"></i></h2><h6>Upload DOCX Stock List</h6></a>
          </div>
         </div>
         <div class="col-md-3">
          <div class="well" id="box-dashboard">
            <a href="<?php echo base_url(); ?>dashboard/manageuploads"><h2><i class="fas fa-paste"></i></h2><h6>Manage Uploads</h6></a>
          </div>
         </div>
         <div class="col-md-3">
          <div class="well" id="box-dashboard">
            <a href="<?php echo base_url(); ?>dashboard/help"><h2><i class="fas fa-question"></i></h2><h6>Help</h6></a>
          </div>
         </div>
        </div>
       </div>


     </div>
   </div>
 </div>
</div>
