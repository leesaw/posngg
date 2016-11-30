<div class="modal fade" id="modNewCustomer" tabindex="-1" role="dialog" aria-labelledby="modNewCustomer" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
            <i class='fa fa-plus'></i> เพิ่มข้อมูลลูกค้า
        </h4>
      </div>            <!-- /modal-header -->
      <div class="modal-body">
        <div class="row"><div class="col-md-12"><form class="form-horizontal">
					<div class="form-group">
						<label class="col-md-4 control-label" for="cusTelephone">เบอร์ติดต่อ <font class='text-red'>*</font></label>
						<div class="col-md-8"> <input type="text" class="form-control" id="cusTelephone" name="cusTelephone" value="" placeholder="ตัวอย่าง 0812345678" autofocus autocomplete='off'/></div>
          </div>
          <div class="form-group">
						<label class="col-md-4 control-label" for="cusName">ชื่อ-นามสกุล <font class='text-red'>*</font></label>
						<div class="col-md-8"> <input type="text" class="form-control" id="cusName" name="cusName" value="" autocomplete='off' /></div>
          </div>
          <div class="form-group">
						<label class="col-md-4 control-label" for="cusAddress">ที่อยู่</label>
						<div class="col-md-8"> <input type="text" class="form-control" id="cusAddress" name="cusAddress" value="" autocomplete='off' /></div>
          </div>
          <div class="form-group">
						<label class="col-md-4 control-label" for="cusProvince">จังหวัด</label>
						<div class="col-md-8"> <select class="form-control" id="cusProvince" name="cusProvince">
              <?php foreach($province_array as $loop) { ?>
                <option value='<?php echo $loop->province_name; ?>'><?php echo $loop->province_name; ?></option>
              <?php } ?>
            </select>
            </div>
          </div>
          <div class="form-group">
						<label class="col-md-4 control-label" for="cusTaxID">เลขที่ผู้เสียภาษี / Passport</label>
						<div class="col-md-8"> <input type="text" class="form-control" id="cusTaxID" name="cusTaxID" value="" placeholder="0-0000-00000-00-0" autocomplete='off' /></div>
          </div>

          </div>            <!-- /modal-body -->
        </div>
      </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-success" name="btnSaveCustomer" id="btnSaveCustomer"><i class='fa fa-save'></i> บันทึก</button>

          </div>
          </form>

    </div>
  </div>
</div>
