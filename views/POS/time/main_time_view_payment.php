<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('includes/header'); ?>
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

  <?php
    foreach($payment_array as $loop) {
      $payment_id = $loop->posp_id;
      $total_net = $loop->posp_price_net;
      $total_topup = $loop->posp_price_topup;
      $total_tax = $loop->posp_price_tax;
      $payment_status = $loop->posp_status;
      $cus_name = $loop->posc_name;
      $cus_address = $loop->posc_address;
      $cus_taxid = $loop->posc_taxid;
      $cus_telephone = $loop->posc_telephone;
      $saleperson_number = $loop->nggu_number;
      $saleperson_name = $loop->nggu_firstname." ".$loop->nggu_lastname;
			$small_invoice_number = $loop->posp_small_invoice_number;
			$issuedate = $loop->posp_issuedate;
			$issue_array = explode('-', $issuedate);
			$issue_array[0] += 543;
			$issuedate = $issue_array[2]."/".$issue_array[1]."/".$issue_array[0];
    }

    foreach($shop_array as $loop) {
      $print_tax = $loop->posh_print_tax;
    }

    $today = date("Y-m-d");
    $issue_array[0] -= 543;
    $issue = $issue_array[0]."-".$issue_array[1]."-".$issue_array[2];
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
          <div class="box box-success">
            <div class="box-header with-border">
              <div class='row'>
                <div class='col-md-4'>
                  <?php if ($payment_status == 'N' && $today == $issue) { ?><a href="<?php echo site_url("pos_payment/print_slip_small_invoice")."/".$payment_id; ?>" target="_blank" type="button" class="btn btn-primary btn-lg" name="btnSmallInvoice" id="btnSmallInvoice">พิมพ์ใบกำกับภาษีอย่างย่อ</a><?php } ?>
                </div>
                <div class='col-md-8' style='text-align:right;'>
                  <?php if ($payment_status == 'N' && $today == $issue) { ?><a type="button" href='<?php echo site_url('pos_payment/void_payment')."/".$payment_id; ?>' class="btn bg-orange btn-lg" name="btnVoid" id="btnVoid">ยกเลิกการขาย (Void)</a><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;
                  <?php if ($print_tax != 0 && $had_payment == 0 && $payment_status == 'N' && $today == $issue) { ?><a type="button" href='<?php echo site_url('pos_payment/convert_invoice')."/".$payment_id; ?>' class="btn btn-danger btn-lg" name="btnInvoice" id="btnInvoice">เปลี่ยนเป็นใบกำกับภาษี</a><?php } ?>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div class='row'>
                <div class='col-md-4'>
                  <label>เลขที่ใบกำกับภาษีอย่างย่อ : </label> <?php echo $small_invoice_number; ?>
                </div>
                <div class='col-md-4'>
                  <label>วันที่ออกใบกำกับภาษีอย่างย่อ : </label> <?php echo $issuedate; ?>
                </div>
                <div class='col-md-4'>
                  <label>สถานะ : </label> <?php if ($payment_status == 'N') echo "<label class='text-green'>ปิดการขาย</label>";
                  else if ($payment_status == 'V') echo "<label class='text-red'>ยกเลิกแล้ว</label>";
                  else if ($payment_status == 'T') echo "<label class='text-orange'>เปลี่ยนเป็นใบกำกับภาษีแบบเต็มแล้ว</label>"; ?>
                </div>
              </div>
              <br/>

              <div class='row'>
                <div class='col-md-12 table-responsive'>
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
                        <td><?php echo $loop->popi_item_number."-".$loop->popi_item_name."<br>".$loop->popi_item_brand."<br>".$loop->popi_item_description; ?>
                        <?php  if ($loop->popi_item_serial != "")	echo "<br>Serial : ".$loop->popi_item_serial; ?>
                        </td>
                        <td class="center-text"><?php echo number_format($loop->popi_item_srp, 2,'.',','); ?></td>
                        <td class="center-text"><?php echo $loop->popi_item_qty." ".$loop->popi_item_uom; ?></td>
                        <td class="center-text"><?php echo number_format($loop->popi_item_dc_baht, 2,'.',','); ?></td>
                        <td class="center-text"><?php echo number_format($loop->popi_item_dc_percent); ?></td>
                        <td style="text-align:right;"><?php echo number_format($loop->popi_item_net, 2,'.',','); ?></td>
                      </tr>
                      <?php $sum_qty += $loop->popi_item_qty; } ?>
                      <?php if($total_topup > 0) { ?>
                      <tr><td></td><td>ส่วนลดท้ายบิล</td><td colspan="4"></td><td style="text-align:right;"><?php echo "- ".number_format($total_topup, 2,'.',','); ?></td></tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="3" style="text-align:right;">จำนวน</td>
                        <td class="center-text"><?php echo $sum_qty; ?></td>
                        <td colspan="2" style="text-align:right;">ราคาไม่รวมภาษีมูลค่าเพิ่ม</td>
                        <td style="text-align:right;"><?php echo number_format($total_net-$total_topup-$total_tax, 2,'.',','); ?></td>
                      </tr>
                      <tr><td colspan="4"></td><td colspan="2" style="text-align:right;">จํานวนภาษีมูลค่าเพิ่ม 7 %</td><td style="text-align:right;"><?php echo number_format($total_tax, 2,'.',','); ?></td></tr>
                      <tr><td colspan="4"></td><td colspan="2" style="text-align:right;">จํานวนเงินรวมทั้งสิ้น</td><td style="text-align:right;"><?php echo number_format($total_net-$total_topup, 2,'.',','); ?></td></tr>
                    </tfoot>
                  </table>
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
              </div>
              <div class="box-body">
                <div class='row'>
                  <div class='col-md-12'>
                    เลขสมาชิก / เบอร์ติดต่อ
                    <input type='text' name='cusTelephone_view' id='cusTelephone_view' class='form-control' value='<?php echo $cus_telephone; ?>' disabled>
                  </div>
                  <div class='col-md-12'>
                    ชื่อ-นามสกุล
                    <input type='hidden' name='customer_id' id='customer_id' value='0'>
                    <input type='text' name='cusName_view' id='cusName_view' class='form-control' value='<?php echo $cus_name; ?>' disabled>
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
                  <input type='text' name='staffCode' id='staffCode' class='form-control' value='<?php echo $saleperson_number; ?>' disabled>

                </div>
                <div class='col-md-7'>
                  ชื่อ-นามสกุลพนักงาน
                  <input type='text' name='staffName' id='staffName' class='form-control' value='<?php echo $saleperson_name; ?>' disabled>
                </div>
              </div>
              <hr/>
              <h3>ชำระเงิน</h3>
            <div class='row'>
              <div class='col-md-12'>
                <table class="table table-condensed" id='payment_list'>
                  <tbody>
                    <?php foreach($paid_array as $loop) { ?>
                      <tr><td><?php echo $loop->paid_gateway; ?></td><td><?php echo number_format($loop->paid_price_paid, 2,'.',','); ?></td></tr>

                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
              </div>
        </div>
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
<!-- View Sale Order Function -->
<script src="<?php echo base_url(); ?>asset/custom/js/view_saleorder.min.js"></script>
<script>


</script>
</body>
</html>
