<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('includes/header'); ?>
<style>
.bigtext {
  font-weight: bold;
  font-size: 30px;
}
.menutext {
  font-weight: bold;
  font-size: 20px;
}
.totalvalue {
  font-weight: bold;
  font-size: 16px;
}
</style>
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">
  <?php $this->load->view('includes/menu_head_top'); ?>

  <?php
    foreach($sale_person as $loop) {
      $nggu_id = $loop->nggu_id;
      $nggu_number = $loop->nggu_number;
      $nggu_name = $loop->nggu_firstname." ".$loop->nggu_lastname;
    }
  ?>
  <!-- Full Width Column -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class='col-md-2'>
          <div class="menutext">
            นาฬิกา > สั่งขาย
          </div>
        </div>
        <div class='col-md-6'></div>
        <div class='col-md-2'>
          <a type='button' class='btn bg-purple' id='btnSelectProductType' href='<?php echo site_url('pos_main'); ?>'>เลือกประเภทสินค้า</a>
        </div>
        <div class='col-md-2'></div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box box-solid">
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <input type='text' class='form-control' name='barcode' id='barcode' placeholder='สแกนบาร์โค้ด' autocomplete='off'>
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
                      <th class='col-xs-1'>Barcode</th>
                      <th class='col-xs-3'>สินค้า</th>
                      <th class='col-xs-1'>ราคาป้าย</th>
                      <th class='col-xs-1'>จำนวน</th>
                      <th class='col-xs-1'>ส่วนลด(บาท)</th>
                      <th class='col-xs-1'>ส่วนลด(%)</th>
                      <th class='col-xs-1'>Net</th>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
                <div class='col-md-12 table-responsive'>
                  <table class='table table-bordered'>
                    <thead>
                      <th class='col-xs-2 totalvalue'>รวมทั้งหมด</th>
                      <th class='col-xs-1 totalvalue text-blue'>ป้าย</th>
                      <th class='col-xs-1 totalvalue text-blue'><div id="sum_srp">0</div></th>
                      <th class='col-xs-1 totalvalue text-green'>จำนวน</th>
                      <th class='col-xs-1 totalvalue text-green'><input type="hidden" id="var_allcount" value="0"/><div id="allcount">0</div></th>
                      <th class='col-xs-1 totalvalue text-yellow'>ส่วนลด</th>
                      <th class='col-xs-1 totalvalue text-yellow'><div id="sum_dc">0</div></th>
                      <th class='col-xs-2 totalvalue text-red'>ส่วนลดท้ายบิล <a data-toggle="modal" data-target="#modDCTopup" type="button" class="btn btn-danger btn-xs" name="btnDCTopup" id="btnDCTopup"><i class='fa fa-plus'></i></a></th>
                      <th class='col-xs-2 totalvalue text-red'><input type="hidden" id="hiddenDCTopup" value=""/><div id="dc_topup">0</div></th>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
              <div class='row'>
                <div class='col-md-1'>
                  <button class='btn btn-primary'>ทดสอบ</button>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class='col-md-3'>
          <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">ข้อมูลลูกค้า</h3>
                <a data-toggle="modal" data-target="#modNewCustomer" type="button" class="btn btn-primary btn-sm pull-right" name="btnNewCustomer" id="btnNewCustomer"><i class='fa fa-plus'></i> เพิ่มข้อมูลลูกค้า</a>
              </div>
              <div class="box-body">
                <div class='row'>
                  <div class='col-md-12'>
                    เบอร์ติดต่อ
                    <div class="form-group has-feedback">
                      <input type='text' name='cusTelephone_view' id='cusTelephone_view' class='form-control' value=''>
                      <span class="form-control-feedback"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </div>
                  </div>
                  <div class='col-md-12'>
                    ชื่อ-นามสกุล
                    <input type='hidden' name='customer_id' id='customer_id' value='0'>
                    <input type='text' name='cusName_view' id='cusName_view' class='form-control' value='' disabled>
                  </div>
                  <div class='col-md-12'>
                    ที่อยู่
                    <input type='text' name='cusAddress_view' id='cusAddress_view' class='form-control' value='' disabled>
                  </div>
                  <div class='col-md-12'>
                    เลขที่ผู้เสียภาษี
                    <input type='text' name='cusTaxID_view' id='cusTaxID_view' class='form-control' value='' disabled>
                  </div>
                </div>
              </div>
        </div>
        <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">พนักงานขาย</h3>
            </div>
            <div class="box-body">
              <div class='row'>
                <div class='col-md-5'>
                  รหัสพนักงาน
                  <div class="form-group has-feedback">
                    <input type='hidden' name='saleperson_id' id='saleperson_id' value='<?php echo $nggu_id; ?>'>
                    <input type='text' name='staffCode' id='staffCode' class='form-control' value='<?php echo $nggu_number; ?>'>
                    <span class="form-control-feedback"><i class="fa fa-search" aria-hidden="true"></i></span>
                  </div>

                </div>
                <div class='col-md-7'>
                  ชื่อ-นามสกุล
                  <input type='text' name='staffName' id='staffName' class='form-control' value='<?php echo $nggu_name; ?>' disabled>
                </div>
              </div>
            </div>
      </div>
        <a data-toggle="modal" data-target="#modPayment" type="button" class="btn btn-danger btn-lg btn-block" name="btnPayment" id="btnPayment"><i class='fa fa-shopping-cart'></i> ชำระเงิน</a>
        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- Modal section-->
<?php $this->load->view('includes/modal_new_customer'); ?>
<?php $this->load->view('includes/modal_payment'); ?>
<?php $this->load->view('includes/modal_discount_topup'); ?>
<!-- ./Modal section-->

<?php $this->load->view('includes/footer'); ?>
<!-- Sale Order Function -->
<script src="<?php echo base_url(); ?>asset/custom/js/saleorder.min.js"></script>
<script>
  var link = '<?php echo site_url('pos_time_item/scan_barcode'); ?>';
  var link_saleperson = '<?php echo site_url('pos_sale_person/check_sale_person'); ?>';
  var link_customer = '<?php echo site_url('pos_customer/check_customer'); ?>';
  var link_new_customer = '<?php echo site_url('pos_customer/save_new_customer'); ?>';
  var link_save_payment = '<?php echo site_url('pos_payment/save_new_payment'); ?>';
</script>
</body>
</html>
