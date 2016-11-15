<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('includes/header'); ?>
<style>
.center-text {
  text-align: center;
}
</style>
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">
  <?php $this->load->view('includes/menu_head_top'); ?>

  <?php
    foreach($payment_array as $loop) {
      $total_net = $loop->posp_price_net;
      $total_topup = $loop->posp_price_topup;
      $total_tax = $loop->posp_price_tax;
      $total_paid = $loop->posp_price_paid;

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
              <div class='row'>
                <div class='col-md-12 table-responsive' style='overflow: auto;height: 400px;'>
                  <table class='table table-bordered' id='itemlist'>
                    <thead>
                      <th class='col-xs-2 center-text'>Barcode</th>
                      <th class='col-xs-3 center-text'>สินค้า</th>
                      <th class='col-xs-1 center-text'>ราคาป้าย</th>
                      <th class='col-xs-1 center-text'>จำนวน</th>
                      <th class='col-xs-1 center-text'>ส่วนลด(บาท)</th>
                      <th class='col-xs-1 center-text'>ส่วนลด(%)</th>
                      <th class='col-xs-2' style="text-align:right;">Net</th>
                    </thead>
                    <tbody>
                      <?php $sum_qty = 0; foreach($item_array as $loop) { ?>
                      <tr>
                        <td class="center-text"><?php echo $loop->popi_barcode; ?></td>
                        <td><?php echo $loop->popi_item_number."-".$loop->popi_item_name."<br>".$loop->popi_item_brand."<br>".$loop->popi_item_description; ?></td>
                        <td class="center-text"><?php echo number_format($loop->popi_item_srp, 2,'.',','); ?></td>
                        <td class="center-text"><?php echo $loop->popi_item_qty." ".$loop->popi_item_uom; ?></td>
                        <td class="center-text"><?php echo number_format($loop->popi_item_dc_baht, 2,'.',','); ?></td>
                        <td class="center-text"><?php echo number_format($loop->popi_item_dc_percent, 2,'.',','); ?></td>
                        <td style="text-align:right;"><?php echo number_format($loop->popi_item_net, 2,'.',','); ?></td>
                      </tr>
                      <?php $sum_qty += $loop->popi_item_qty; } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="3" style="text-align:right;">จำนวน</th>
                        <th class="center-text"><?php echo $sum_qty; ?></th>
                        <th colspan="2" style="text-align:right;">รวมเป็นเงิน</th>
                        <th style="text-align:right;"><?php echo number_format($total_net, 2,'.',','); ?></th>
                      </tr>
                      <tr><th colspan="4"></th><th colspan="2" style="text-align:right;"><u>หัก</u> ส่วนลด</th><th style="text-align:right;"><?php echo number_format($total_topup, 2,'.',','); ?></th></tr>
                      <tr><th colspan="4"></th><th colspan="2" style="text-align:right;">จํานวนเงินหลังหักส่วนลด</th><th style="text-align:right;"><?php echo number_format($total_net-$total_topup-$total_tax, 2,'.',','); ?></th></tr>
                      <tr><th colspan="4"></th><th colspan="2" style="text-align:right;">จํานวนภาษีมูลค่าเพิ่ม 7 %</th><th style="text-align:right;"><?php echo number_format($total_tax, 2,'.',','); ?></th></tr>
                      <tr><th colspan="4"></th><th colspan="2" style="text-align:right;">จํานวนเงินรวมทั้งสิ้น</th><th style="text-align:right;"><?php echo number_format($total_net-$total_topup, 2,'.',','); ?></th></tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <div class='row'>
                <div class='col-md-12'>
                  <a data-toggle="modal" data-target="#modAllPercent" type="button" class="btn bg-orange" name="btnAllPercent" id="btnAllPercent">ส่วนลด % ทุกชิ้น</a>
                  <a data-toggle="modal" data-target="#modDCTopup" type="button" class="btn btn-danger" name="btnDCTopup" id="btnDCTopup">ส่วนลดท้ายบิล</a>
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
