<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('includes/header'); ?>
<style>
.bigtext {
  font-weight: bold;
  font-size: 30px;
}
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
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <input type='text' class='form-control input-lg' name='barcode' id='barcode' placeholder='สแกนบาร์โค้ด' autocomplete='off'>
                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-3">
                    <p class="bigtext">ยอดรวม</p>
                </div>
                <div class="col-md-4">
                    <p class="bigtext" id="summary">0 บาท</p>
                </div>
              </div>

              <div class='row'>
                <div class='col-md-12 table-responsive' style='overflow: auto;height: 400px;'>
                  <table class='table table-bordered' id='itemlist'>
                    <thead>
                      <th class='col-xs-1'>X</th>
                      <th class='col-xs-1'>รูปภาพ</th>
                      <th class='col-xs-2'>Barcode</th>
                      <th class='col-xs-2'>สินค้า</th>
                      <th class='col-xs-1'>ราคาป้าย</th>
                      <th class='col-xs-1'>จำนวน</th>
                      <th class='col-xs-1'>ส่วนลด(บาท)</th>
                      <th class='col-xs-1'>ส่วนลด(%)</th>
                      <th class='col-xs-2'>Net</th>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
                <div class='col-md-12 table-bordered'>
                  <table class='table'>
                    <thead>
                      <th class='col-xs-4'>รวมทั้งหมด</th>
                      <th class='col-xs-1'>ราคาป้าย</th>
                      <th class='col-xs-1'><div id="sum_srp">0</div></th>
                      <th class='col-xs-1'>จำนวน</th>
                      <th class='col-xs-1'><div id="allcount">0</div></th>
                      <th class='col-xs-1'>ส่วนลด</th>
                      <th class='col-xs-1'><div id="sum_dc">0</div></th>
                      <th class='col-xs-1'>Net</th>
                      <th class='col-xs-1'><div id="sum_net">0</div></th>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
              <div class='row'>

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
<!-- Sale Order Function -->
<script src="<?php echo base_url(); ?>asset/custom/js/saleorder.min.js"></script>
<script>
  var link = '<?php echo site_url('pos_time_item/scan_barcode'); ?>';
</script>
</body>
</html>
