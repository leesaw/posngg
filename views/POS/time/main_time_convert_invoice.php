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
      $cus_id = $loop->posp_customer_id;
      $cus_name = $loop->posc_name;
      $cus_address = $loop->posc_address;
      $cus_province = $loop->posc_province;

      if ($cus_province == "กรุงเทพมหานคร") $cus_address .= " ".$cus_province;
      elseif ($cus_province != "") $cus_address .= " จ.".$cus_province;

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
      $shop_name = $loop->posh_name;
      $shop_address1 = $loop->posh_address1;
      $shop_address2 = $loop->posh_address2;
      $shop_telephone = $loop->posh_telephone;
      $shop_fax = $loop->posh_fax;
      $shop_taxid = $loop->posh_taxid;
      $shop_company = $loop->posh_company;
      $shop_branch_no = $loop->posh_branch_no;
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
          <div class="box box-success">
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
                  else if ($payment_status == 'V') echo "<label class='text-red'>ยกเลิกแล้ว</label>"; ?>
                </div>
              </div>
              <br/>
              <div class='row'>
                <div class='col-md-8'>
                  <?php echo $shop_company."<br/>".$shop_address1."<br/>".$shop_address2."<br/>Tax ID. ".$shop_taxid." ";
                  if ($shop_branch_no == 0) echo "Head Office";
                  else if ($shop_branch_no > 0) echo "Branch No. ".str_pad($shop_branch_no, 5, '0', STR_PAD_LEFT);
                  echo "<br/>";
                  if ($shop_telephone != "") echo "Tel. ".$shop_telephone." ";
                  if ($shop_fax != "") echo "Fax. ".$shop_fax;

                  ?>
                  <input type="hidden" id="shop_company" value="<?php echo $shop_company; ?>">
                  <input type="hidden" id="shop_address1" value="<?php echo $shop_address1; ?>">
                  <input type="hidden" id="shop_address2" value="<?php echo $shop_address2; ?>">
                  <input type="hidden" id="shop_taxid" value="<?php echo $shop_taxid; ?>">
                  <input type="hidden" id="shop_branch_no" value="<?php echo $shop_branch_no; ?>">
                  <input type="hidden" id="shop_telephone" value="<?php echo $shop_telephone; ?>">
                  <input type="hidden" id="shop_fax" value="<?php echo $shop_fax; ?>">
                </div>
                <div class='col-md-4'>

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
          <input type="hidden" id="payment_id" value="<?php echo $payment_id; ?>">
          <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">ข้อมูลลูกค้า</h3>
              </div>
              <div class="box-body">
                <div class='row'>
                  <div class='col-md-12'>
                    เลขสมาชิก / เบอร์ติดต่อ
                    <div class="form-group has-feedback">
                      <input type='text' name='cusTelephone' id='cusTelephone' class='form-control' value='<?php echo $cus_telephone; ?>'>
                      <span class="form-control-feedback"><i class="fa fa-search" aria-hidden="true"></i></span>
                    </div>
                  </div>
                  <div class='col-md-12'>
                    ชื่อ-นามสกุล <b class='text-red'>*</b>
                    <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $cus_id; ?>">
                    <input type='text' name='cusName' id='cusName' class='form-control' value='<?php echo $cus_name; ?>'>
                  </div>
                  <div class='col-md-12'>
                    ที่อยู่ <b class='text-red'>*</b>
                    <input type='text' name='cusAddress' id='cusAddress' class='form-control' value='<?php echo $cus_address; ?>'>
                  </div>
                  <div class='col-md-12'>
                    เลขที่ผู้เสียภาษี / Passport <b class='text-red'>*</b>
                    <input type='text' name='cusTaxID' id='cusTaxID' class='form-control' value='<?php echo $cus_taxid; ?>'>
                  </div>
                  <div class='col-md-12'>
                    หมายเหตุ
                    <input type='text' name='remark' id='remark' class='form-control' value=''>
                  </div>
                </div>

              </div>
        </div>

          <a name="btnSaveInvoice" id="btnSaveInvoice" class="btn btn-success btn-block btn-lg"><i class="fa fa-save"></i> บันทึก</a>
          <br/><br/>
          <a href="<?php echo site_url("pos_payment/view_payment")."/".$payment_id; ?>" type="button" class="btn btn-warning btn-block btn-lg"><i class="fa fa-arrow-left"></i> ยกเลิก</a>

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
<script src="<?php echo base_url(); ?>asset/custom/js/new_invoice.min.js"></script>
<script>
var link_customer = '<?php echo site_url('pos_customer/check_customer'); ?>';
var link_save_invoice = '<?php echo site_url('pos_invoice/convert_invoice_save'); ?>';
var link_view_invoice = '<?php echo site_url('pos_invoice/view_invoice'); ?>';
</script>
</body>
</html>
