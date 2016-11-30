<div class="modal fade" id="modSearchPayment" tabindex="-1" role="dialog" aria-labelledby="modSearchPayment" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
            <i class='fa fa-search'></i> ค้นหาการสั่งขาย
        </h4>
      </div>            <!-- /modal-header -->
      <div class="modal-body">
        <div class="row"><div class="col-md-12"><form action="<?php echo site_url("pos_payment/search_payment"); ?>" method="post" class="form-horizontal">
          <div class="form-group">
						<label class="col-md-4 control-label" for="valuePaymentNumber">เลขที่</label>
						<div class="col-md-8"> <input type="text" class="form-control input-lg" id="valuePaymentNumber" name="valuePaymentNumber" placeholder="ABN00-59011234" autofocus autocomplete='off'/></div>
          </div>

        </div>
      </div>
    </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="btnConfirmPaymentNumber" id="btnConfirmPaymentNumber"><i class='fa fa-search'></i> ค้นหา</button>

          </div>
        </form>
    </div>
  </div>
</div>
