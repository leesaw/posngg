<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('includes/header'); ?>
<!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/plugins/datatables/dataTables.bootstrap.css">
<style>
.center-text {
  text-align: center;
}
.menutext {
  font-weight: bold;
  font-size: 20px;
}
</style>
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">
  <?php $this->load->view('includes/menu_head_top'); ?>
  <!-- Full Width Column -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php $this->load->view('includes/content_header'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>สินค้าคงเหลือ</label>
            </div>
            <div class="box-body">
              <div class='row'>
                <div class='col-md-12 table-responsive'>
                  <table class='table table-bordered' id='stockList'>
                    <thead>
                      <th class='col-xs-2'>รหัสสินค้า Ref. Number</th>
                      <th class='col-xs-2'>ยี่ห้อ</th>
                      <th class='col-xs-2'>รายละเอียดสินค้า</th>
                      <th class='col-xs-2'>ราคาขาย</th>
                      <th class='col-xs-2'>จำนวนคงเหลือ</th>
                      <th class='col-xs-2'>Serial Number</th>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                          <th colspan="4" style="text-align:right">จำนวนทั้งหมด:</th>
                          <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->


<?php $this->load->view('includes/footer'); ?>
<script>
var ajaxLink = '<?php echo site_url("pos_stock/ajaxViewStock")."/".$warehouse_id; ?>';
</script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- View Sale Order Function -->
<script src="<?php echo base_url(); ?>asset/custom/js/view_stock_balance.min.js"></script>


</body>
</html>
