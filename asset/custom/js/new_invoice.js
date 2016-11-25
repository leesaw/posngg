$(document).ready(function() {
  $("#btnSaveInvoice").click(function() {
    if (($("#cusName").val()=="") || ($("#cusName").val()=="-")) {
      alert("กรุณาใส่ ชื่อ-นามสกุลลูกค้า !");
      $("#cusName").focus();
      return false;
    }else if(($("#cusAddress").val()=="") || ($("#cusAddress").val()=="-")) {
      alert("กรุณาใส่ ที่อยู่ลูกค้า !");
      $("#cusAddress").focus();
      return false;
    }else if(($("#cusTaxID").val()=="") || ($("#cusTaxID").val()=="-")) {
      alert("กรุณาใส่ เลขที่ผู้เสียภาษี / Passport ลูกค้า !");
      $("#cusTaxID").focus();
      return false;
    }else{
      var message = "ต้องการบันทึกใบกำกับภาษีนี้ ใช่หรือไม่ !";
      if (confirm(message)) {
        $("#btnSaveInvoice").attr('disabled', true);
        var customer_id = $("#customer_id").val();
        var customer_name = $("#cusName").val();
        var customer_telephone = $("#cusTelephone").val();
        var customer_address = $("#cusAddress").val();
        var customer_taxid = $("#cusTaxID").val();

        var remark = $("#remark").val();
        var payment_id = $("#payment_id").val();

        var shop_company = $("#shop_company").val();
        var shop_address1 = $("#shop_address1").val();
        var shop_address2 = $("#shop_address2").val();
        var shop_taxid = $("#shop_taxid").val();
        var shop_branch_no = $("#shop_branch_no").val();
        var shop_telephone = $("#shop_telephone").val();
        var shop_fax = $("#shop_fax").val();
        
        $.ajax({
          type : "POST" ,
          url : link_save_invoice ,
          data : {customer_id: customer_id, customer_name: customer_name, customer_telephone: customer_telephone,
          customer_address: customer_address, customer_taxid: customer_taxid, remark: remark, payment_id: payment_id,
          shop_company: shop_company, shop_address1: shop_address1, shop_address2: shop_address2, shop_taxid: shop_taxid,
          shop_branch_no: shop_branch_no, shop_telephone: shop_telephone, shop_fax: shop_fax} ,
          dataType: 'json',
          success : function(data) {
            if(data > 0)
            {
              alert("ทำการบันทึกข้อมูลเรียบร้อยแล้ว !");
              $("#btnSaveInvoice").attr('disabled', false);
              window.location = link_view_invoice+"/"+data;
            }else{
              alert("ไม่สามารถบันทึกใบกำกับภาษีได้ !!!");
              $("#btnSaveInvoice").attr('disabled', false);
            }
          },
          error: function (textStatus, errorThrown) {
              alert("ไม่สามารถบันทึกใบกำกับภาษีได้ !!!");
              $("#btnSaveInvoice").attr('disabled', false);
          }
        });
      }else{
        return false;
      }
    }


  });

  $('#cusTelephone').keyup(function(e){ //enter next
      if(e.keyCode == 13) {
          var telephone = $.trim($(this).val());
          if(telephone != "")
          {
            check_customer(telephone);
          }
      }
  });

});

function check_customer(telephone)
{
  if(telephone != "") {
    $.ajax({
      type : "POST" ,
      url : link_customer ,
      data : {telephone: telephone} ,
      dataType: 'json',
      success : function(data) {
        if(data.posc_id > 0)
        {
          $('#customer_id').val(data.posc_id);
          $('#cusName').val(data.posc_name);
          $('#cusAddress').val(data.posc_address);
          $('#cusTaxID').val(data.posc_taxid);
        }else{
          alert("ไม่พบ ข้อมูลลูกค้า ที่ต้องการ");
          $('#customer_id').val('0');
          $('#cusTelephone').val('');
          $('#cusName').val('');
          $('#cusAddress').val('');
          $('#cusTaxID').val('');
        }
      },
      error: function (textStatus, errorThrown) {
          alert("ไม่พบ ข้อมูลลูกค้า ที่ต้องการ !!!");
          $('#customer_id').val('0');
          $('#cusTelephone').val('');
          $('#cusName').val('');
          $('#cusAddress').val('');
          $('#cusTaxID').val('');
      }
    });
  }
}
