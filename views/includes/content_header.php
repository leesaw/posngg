<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="row">
    <div class='col-md-3'>
      <div class="menutext">
        <?php echo $content_header; ?>
      </div>
    </div>
    <div class='col-md-2'></div>
    <div class='col-md-2'><a type='button' class='btn bg-purple btn-lg' id='btnSelectProductType' href='<?php echo site_url('pos_main'); ?>'>สั่งขายใหม่</a></div>
    <div class='col-md-5'>
      <a type='button' class='btn bg-maroon btn-lg' id='btnLastPayment' href='<?php echo site_url('pos_payment/view_today_payment'); ?>'>การสั่งขายของวันนี้</a>	&nbsp;	&nbsp;
      <a data-toggle="modal" data-target="#modSearchPayment" type="button" class="btn bg-navy btn-lg" name="btnSearchPayment" id="btnSearchPayment">ค้นหาการสั่งขาย</a>	&nbsp;	&nbsp;
      <a type="button" class="btn btn-success btn-lg" name="btnStock" id="btnStock" href='<?php echo site_url('pos_stock/view_stock_balance'); ?>'>สินค้าคงเหลือ</a>
    </div>
  </div>
</section>
