<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('includes/header'); ?>
<style>

</style>
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">
  <?php $this->load->view('includes/menu_head_top'); ?>

  <!-- Full Width Column -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-1">
        </div>

        <div class="col-md-5">
          <div class="box box-solid">
            <div class="box-body">
              <a href="<?php echo site_url("tmp_pos_time_sale/form_refcode"); ?>">
        	    <div class="thumbnail">
        	      <img src="<?php echo base_url(); ?>asset/dist/img/watch.png" style="width: 200px; padding:5px;">
        	      <div class="caption">
        	        <h3><center>นาฬิกา</center></h3>
        	      </div>
        	    </div>
        	    </a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        <div class="col-md-5">
          <div class="box box-solid">
            <div class="box-body">
              <a href="<?php echo site_url("tmp_pos_time_sale/form_serial"); ?>">
        	    <div class="thumbnail">
        	      <img src="<?php echo base_url(); ?>asset/dist/img/logo_suunto.png" style="width: 200px; padding:5px;">
        	      <div class="caption">
        	        <h3><center>เฉพาะ Suunto</center></h3>
        	      </div>
        	    </div>
        	    </a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-1">
        </div>
        <!-- ./col -->
        <!-- <div class="col-md-4">
          <div class="box box-solid">
            <div class="box-body">
              <a href="<?php echo site_url("pos_main/gold_main"); ?>">
        	    <div class="thumbnail">
        	      <img src="<?php echo base_url(); ?>asset/dist/img/gold.png" style="width: 200px; padding:5px;">
        	      <div class="caption">
        	        <h3><center>ทอง</center></h3>
        	      </div>
        	    </div>
        	    </a>
            </div>
          </div>
        </div> -->
        <!-- ./col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> <?php echo version; ?>
      </div>
      <strong>Copyright &copy; 2016 <?php echo programname; ?></strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<?php $this->load->view('includes/footer'); ?>
<script>

</script>
</body>
</html>
