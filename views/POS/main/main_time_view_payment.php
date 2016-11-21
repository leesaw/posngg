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
      $total_paid = $loop->posp_price_paid;
      $cus_name = $loop->posc_name;
      $cus_address = $loop->posc_address;
      $cus_taxid = $loop->posc_taxid;
      $cus_telephone = $loop->posc_telephone;
      $saleperson_number = $loop->nggu_number;
      $saleperson_name = $loop->nggu_firstname." ".$loop->nggu_lastname;
    }
  ?>
  <!-- Full Width Column -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class='col-md-4'>
          <div class="menutext">
            นาฬิกา > สั่งขาย > รายละเอียดการขาย
          </div>
        </div>
        <div class='col-md-4'></div>
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
            <div class="box-header">
              <div class='row'>
                <div class='col-md-4'>
                  <a href="<?php echo site_url("pos_payment/print_small_invoice")."/".$payment_id; ?>" target="_blank" type="button" class="btn btn-primary btn-lg" name="btnSmallInvoice" id="btnSmallInvoice">พิมพ์ใบกำกับภาษีอย่างย่อ</a>
                </div>
                <div class='col-md-4'>
                </div>
                <div class='col-md-4' style='text-align:right;'>
                  <a data-toggle="modal" data-target="#modDCTopup" type="button" class="btn btn-danger btn-lg" name="btnDCTopup" id="btnDCTopup">พิมพ์ใบกำกับภาษี</a>
                </div>
              </div>
            </div>
            <div class="box-body">
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
                        <td class="center-text"><?php echo number_format($loop->popi_item_dc_percent, 2,'.',','); ?></td>
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
                    เบอร์ติดต่อ
                    <input type='text' name='cusTelephone_view' id='cusTelephone_view' class='form-control' value='<?php echo $cus_telephone; ?>' disabled>
                  </div>
                  <div class='col-md-12'>
                    ชื่อ-นามสกุล
                    <input type='hidden' name='customer_id' id='customer_id' value='0'>
                    <input type='text' name='cusName_view' id='cusName_view' class='form-control' value='<?php echo $cus_name; ?>' disabled>
                  </div>
                  <div class='col-md-12'>
                    ที่อยู่
                    <input type='text' name='cusAddress_view' id='cusAddress_view' class='form-control' value='<?php echo $cus_address; ?>' disabled>
                  </div>
                  <div class='col-md-12'>
                    เลขที่ผู้เสียภาษี
                    <input type='text' name='cusTaxID_view' id='cusTaxID_view' class='form-control' value='<?php echo $cus_taxid; ?>' disabled>
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
                  <input type='text' name='staffCode' id='staffCode' class='form-control' value='<?php echo $saleperson_number; ?>' disabled>
                </div>
                <div class='col-md-7'>
                  ชื่อ-นามสกุล
                  <input type='text' name='staffName' id='staffName' class='form-control' value='<?php echo $saleperson_name; ?>' disabled>
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
<script>


</script>
</body>
</html>
