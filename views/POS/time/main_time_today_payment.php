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
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <label>ใบกำกับภาษีอย่างย่อ</label>
            </div>
            <div class="box-body">
              <div class='row'>
                <div class='col-md-12 table-responsive'>
                  <table class='table table-bordered' id='paymentlist'>
                    <thead>
                      <th class='col-xs-1'><i class="fa fa-search"></i></th>
                      <th class='col-xs-1'>เลขที่</th>
                      <th class='col-xs-1'>วันที่</th>
                      <th class='col-xs-2'>สาขา</th>
                      <th class='col-xs-1'>พนักงานขาย</th>
                      <th class='col-xs-1'>ลูกค้า</th>
                      <th class='col-xs-1'>รวมส่วนลด</th>
                      <th class='col-xs-1'>ส่วนลดท้ายบิล</th>
                      <th class='col-xs-1'>ภาษีมูลค่าเพิ่ม</th>
                      <th class='col-xs-2'>รวมยอดเงิน (รวมภาษี)</th>

                    </thead>
                    <tbody>
                      <?php $sum_qty = 0; foreach($payment_array as $loop) { ?>
                      <tr>
                        <td><a type="button" class="btn btn-xs btn-primary" id="btnView" href="<?php echo site_url("pos_payment/view_today_payment"); ?>"><i class="fa fa-search"></i></a></td>
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
