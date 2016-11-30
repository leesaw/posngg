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
.hidden-button {
  display: none;
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
    <?php $this->load->view('includes/content_header'); ?>

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
                      <th class='col-xs-1 totalvalue text-orange'>ส่วนลด</th>
                      <th class='col-xs-1 totalvalue text-orange'><div id="sum_dc">0</div></th>
                      <th class='col-xs-2 totalvalue text-red'>ส่วนลดท้ายบิล</th>
                      <th class='col-xs-2 totalvalue text-red'><input type="hidden" id="hiddenDCTopup" value=""/><div id="dc_topup">0</div></th>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
              <div class='row'>
                <div class='col-md-12'>
                  <a data-toggle="modal" data-target="#modAllPercent" type="button" class="btn bg-orange" name="btnAllPercent" id="btnAllPercent">ส่วนลด % ทุกชิ้น</a>
                  <a data-toggle="modal" data-target="#modDCTopup" type="button" class="btn btn-danger" name="btnDCTopup" id="btnDCTopup">ส่วนลดท้ายบิล</a>
                </div>
              </div>
              <br/>
              <div class='row'>
                <!-- <div class="col-md-2"><label class="control-label pull-right" for="paymentRemark">หมายเหตุ </label></div> -->
                <div class="col-md-8"> <input type="text" class="form-control" id="paymentRemark" name="paymentRemark" value="" placeholder="หมายเหตุ" /></div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class='col-md-3'>
          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">ข้อมูลลูกค้า</h3>
                <a data-toggle="modal" data-target="#modNewCustomer" type="button" class="btn btn-primary btn-sm pull-right" name="btnNewCustomer" id="btnNewCustomer"><i class='fa fa-plus'></i> เพิ่มข้อมูลลูกค้า</a>
              </div>
              <div class="box-body">
                <div class='row'>
                  <div class='col-md-12'>
                    เลขสมาชิก / เบอร์ติดต่อ
                    <div class="form-group has-feedback">
                      <input type='text' name='cusTelephone_view' id='cusTelephone_view' class='form-control' value='' autocomplete='off'>
                      <span class="form-control-feedback"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </div>
                  </div>
                  <div class='col-md-12'>
                    ชื่อ-นามสกุล
                    <input type='hidden' name='customer_id' id='customer_id' value='0'>
                    <input type='text' name='cusName_view' id='cusName_view' class='form-control' value='' disabled>
                  </div>
                  <!-- <div class='col-md-12'>
                    ที่อยู่
                    <input type='text' name='cusAddress_view' id='cusAddress_view' class='form-control' value='' disabled>
                  </div>
                  <div class='col-md-12'>
                    เลขที่ผู้เสียภาษี
                    <input type='text' name='cusTaxID_view' id='cusTaxID_view' class='form-control' value='' disabled>
                  </div> -->
                </div>
              <hr/>
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
                  ชื่อ-นามสกุลพนักงาน
                  <input type='text' name='staffName' id='staffName' class='form-control' value='<?php echo $nggu_name; ?>' disabled>
                </div>
              </div>
              <hr/>
              <h3>ชำระเงิน</h3>
            <div class='row'>
              <div class='col-md-12'>
                <table class="table table-condensed" id='payment_list'>
                  <thead class='text-red'><th></th><th>ยอดคงเหลือ</th><th><div id="payment_remain">0.00</div></th></thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
        <a data-toggle="modal" data-target="#modPayment" type="button" class="btn btn-danger btn-lg btn-block" name="btnPayment" id="btnPayment"><i class='fa fa-shopping-cart'></i> ชำระเงิน</a>
        <a type="button" class="btn btn-success btn-lg btn-block hidden-button" name="btnComplete" id="btnComplete"><i class='fa fa-thumbs-o-up'></i> ปิดการขาย</a>

        </div>
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

<!-- Modal section-->
<?php $this->load->view('includes/modal_new_customer'); ?>
<?php $this->load->view('includes/modal_payment'); ?>
<?php $this->load->view('includes/modal_discount_topup'); ?>
<?php $this->load->view('includes/modal_print_document'); ?>
<?php $this->load->view('includes/modal_discount_percent_all'); ?>
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
  var link_view_payment = '<?php echo site_url('pos_payment/view_payment'); ?>';

</script>
</body>
</html>
