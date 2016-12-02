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
              <label>การสั่งขายของวันนี้</label>
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
                      <?php $no = 0; foreach($payment_array as $loop) { ?>
                      <tr>
                        <td><a type="button" class="btn btn-xs btn-primary" id="btnView" href="<?php echo site_url("pos_payment/view_payment")."/".$loop->posp_id; ?>"><i class="fa fa-search"></i></a></td>
                        <td><?php echo $loop->posp_small_invoice_number; ?></td>
                        <td><?php echo $loop->posp_issuedate; ?></td>
                        <td><?php echo $loop->posp_shop_name; ?></td>
                        <td><?php echo $loop->nggu_firstname; ?></td>
                        <td><?php echo $loop->posc_name; ?></td>
                        <td><?php echo $loop->posp_price_discount; ?></td>
                        <td><?php echo $loop->posp_price_topup; ?></td>
                        <td><?php echo $loop->posp_price_tax; ?></td>
                        <td><?php echo $loop->posp_price_net; ?></td>
                      </tr>
                      <?php $no++; } ?>
                      <?php if ($no==0) { ?>
                        <tr><td colspan="10" style="text-align: center;">ไม่พบข้อมูล</td></tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
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
