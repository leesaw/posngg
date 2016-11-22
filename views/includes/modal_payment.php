<div class="modal fade" id="modPayment" tabindex="-1" role="dialog" aria-labelledby="modPayment" aria-hidden="true">
  <div class="modal-dialog modal-md modal-primary">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
            <i class='fa fa-shopping-cart'></i> ชำระเงิน
        </h4>
      </div>            <!-- /modal-header -->
      <div class="modal-body">
        <div class="row"><div class="col-md-12"><div class="form-horizontal">
          <div class="form-group">
						<label class="col-md-4 control-label" for="paymentWay">ชำระโดย <font class='text-red'>*</font></label>
						<div class="col-md-8"> <select class="form-control input-lg" id="paymentWay" name="paymentWay">
              <option value='เงินสด'>เงินสด</option>
              <option value='บัตรเครดิต'>บัตรเครดิต</option>
              <option value='เช็ค'>เช็ค</option>
            </select></div>
          </div>
          <div class="form-group">
						<label class="col-md-4 control-label" for="paymentValue">จำนวนเงินที่ชำระ <font class='text-red'>*</font></label>
						<div class="col-md-8"> <input type="text" class="form-control input-lg number" id="paymentValue" name="paymentValue" value="" placeholder="0.00" /></div>
          </div>

          </div>            <!-- /modal-body -->
        </div>
      </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-success" name="btnConfirmPayment" id="btnConfirmPayment"><i class='fa fa-save'></i> บันทึก</button>

          </div>
        </div>

    </div>
  </div>
</div>
