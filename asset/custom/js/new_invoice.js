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
      return confirm(message);
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
