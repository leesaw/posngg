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
    foreach($invoice_array as $loop) {
      $inv_id = $loop->pinv_id;
      $total_net = $loop->pinv_price_net;
      $total_topup = $loop->pinv_price_topup;
      $total_tax = $loop->pinv_price_tax;
      $inv_status = $loop->pinv_status;
      $cus_id = $loop->pinv_customer_id;
      $cus_name = $loop->pinv_customer_name;
      $cus_address = $loop->pinv_customer_address;
      $cus_taxid = $loop->pinv_customer_taxid;
      $cus_telephone = $loop->pinv_customer_telephone;
      $saleperson_number = $loop->nggu_number;
      $saleperson_name = $loop->nggu_firstname." ".$loop->nggu_lastname;
			$small_invoice_number = $loop->pinv_small_invoice_number;
      $invoice_number = $loop->pinv_invoice_number;
			$issuedate = $loop->pinv_issuedate;
			$issue_array = explode('-', $issuedate);
			$issue_array[0] += 543;
			$issuedate = $issue_array[2]."/".$issue_array[1]."/".$issue_array[0];
      $remark = $loop->pinv_remark;
      $shop_name = $loop->pinv_shop_name;
      $shop_company = $loop->pinv_shop_company;
      $shop_address1 = $loop->pinv_shop_address1;
      $shop_address2 = $loop->pinv_shop_address2;
      $shop_telephone = $loop->pinv_shop_telephone;
      $shop_fax = $loop->pinv_shop_fax;
      $shop_taxid = $loop->pinv_shop_taxid;
      $shop_branch_no = $loop->pinv_shop_branch_no;
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
        <div class="col-md-10">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">ใบกำกับภาษี</h3>
            </div>
            <div class="box-body">
              <div class='row'>
                <div class='col-md-4'>
                  <input type='hidden' name='inv_id' id='inv_id' value='<?php echo $inv_id; ?>'/>
                  <?php echo $shop_company."<br/>".$shop_address1."<br/>".$shop_address2."<br/>Tax ID. ".$shop_taxid." ";
                  if ($shop_branch_no == 0) echo "Head Office";
                  else if ($shop_branch_no > 0) echo "Branch No. ".str_pad($shop_branch_no, 5, '0', STR_PAD_LEFT);
                  echo "<br/>";
                  if ($shop_telephone != "") echo "Tel. ".$shop_telephone." ";
                  if ($shop_fax != "") echo "Fax. ".$shop_fax;

                  ?>
                </div>
                <div class='col-md-8'>
                  <div class='row'>
                    <div class='col-md-12'>
                      <label>ชื่อ-นามสกุลลูกค้า</label>
                      <input type='text' class='form-control' name='cusName' id='cusName' value='<?php echo $cus_name; ?>'/>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col-md-12'>
                      <label>ที่อยู่ลูกค้า</label>
                      <input type='text' class='form-control' name='cusAddress' id='cusAddress' value='<?php echo $cus_address; ?>'/>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col-md-12'>
                      <label>เลขที่ผู้เสียภาษี / Passport</label>
                      <input type='text' class='form-control' name='cusTaxID' id='cusTaxID' value='<?php echo $cus_taxid; ?>'/>
                    </div>
                  </div>
                  <?php //echo $cus_name."<br/>".$cus_address."<br/>Tax ID. ".$cus_taxid; ?>
                </div>
              </div>
              <br/>
              <div class='row'>
                <div class='col-md-6'>
                  <label>เลขที่ใบกำกับภาษี : </label> <?php echo $invoice_number; ?>
                </div>
                <div class='col-md-6'>
                  <label>วันที่ออก : </label> <?php echo $issuedate; ?>
                </div>
              </div>
              <div class='row'>
                <div class='col-md-6'>
                  <label>อ้างอิงใบกำกับภาษีอย่างย่อ : </label> <?php echo $small_invoice_number; ?>
                </div>
                <div class='col-md-6'>
                  <label>สาขาที่ขาย : </label> <?php echo $shop_name; ?>
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
                        <td class="center-text"><?php echo $loop->pini_barcode; ?></td>
                        <td><?php echo $loop->pini_item_number."-".$loop->pini_item_name."<br>".$loop->pini_item_brand."<br>".$loop->pini_item_description; ?>
                        <?php  if ($loop->pini_item_serial != "")	echo "<br>Serial : ".$loop->pini_item_serial; ?>
                        </td>
                        <td class="center-text"><?php echo number_format($loop->pini_item_srp, 2,'.',','); ?></td>
                        <td class="center-text"><?php echo $loop->pini_item_qty." ".$loop->pini_item_uom; ?></td>
                        <td class="center-text"><?php echo number_format($loop->pini_item_dc_baht, 2,'.',','); ?></td>
                        <td class="center-text"><?php echo number_format($loop->pini_item_dc_percent); ?></td>
                        <td style="text-align:right;"><?php echo number_format($loop->pini_item_net, 2,'.',','); ?></td>
                      </tr>
                      <?php $sum_qty += $loop->pini_item_qty; } ?>
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

        <div class='col-md-2'>
          <br><br><br><br>
          <button class='btn btn-lg btn-block btn-primary' id='btnSave'><i class='fa fa-save'></i> บันทึกแก้ไข</button>
          <br><br><br>
          <a type='button' href='<?php echo site_url('pos_invoice/view_invoice').'/'.$inv_id; ?>' class='btn btn-lg btn-block btn-warning' id='btnCancel'><i class='fa fa-reply'></i> ยกเลิกแก้ไข</a>
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
<script src="<?php echo base_url(); ?>asset/custom/js/view_invoice.min.js"></script>
<script>
var link_edit_invoice = '<?php echo site_url('pos_invoice/edit_invoice_save'); ?>';
var link_view_invoice = '<?php echo site_url('pos_invoice/view_invoice').'/'.$inv_id; ?>';
</script>
</body>
</html>
