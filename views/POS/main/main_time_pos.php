<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('includes/header'); ?>
<style>

</style>
</head>
<body class="skin-red sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('includes/menu_head_pos'); ?>
  <?php $this->load->view('includes/menu_left_pos'); ?>
  <!-- Full Width Column -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        นาฬิกา > สั่งขาย
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box box-solid">
            <div class="box-body">
              <div class="row">
                <div class="col-lg-12">
                  <input type='text' class='form-control input-lg' name='barcode' id='barcode' placeholder='สแกนบาร์โค้ด' autocomplete='off'>
                </div>
              </div>
              <hr/>
              <div class='row'>
                <div class='col-lg-12 table-responsive'>
                  <table class='table table-striped'>
                    <thead><th width='30'>X</th><th width='120'>รูปภาพ</th><th width='150'>Barcode</th><th>สินค้า</th><th width='50'>จำนวน</th><th>ราคาป้าย</th><th width='100'>ส่วนลด (บาท)</th></thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body">
              <div class="row">
                <div class="col-lg-5">
                  <p class="lead" style="font-weight: bold;">ยอดรวม</p>
                </div>
                <div class="col-lg-7">
                  <p class="lead" id="summary" style="font-weight: bold;">0 บาท</p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-5">
                  <p class="lead" style="font-weight: bold;">จำนวน</p>
                </div>
                <div class="col-lg-7">
                  <p class="lead" id="allcount" style="font-weight: bold;">0</p>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
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
<!-- Sale Order Function -->
<script src="<?php echo base_url(); ?>asset/custom/js/saleorder.min.js"></script>
<script>
  var link = '<?php echo site_url('pos_time_item/scan_barcode'); ?>';
</script>
</body>
</html>
