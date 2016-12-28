$(document).ready(function() {
  $("#btnVoid").click(function() {
    // var message = "ต้องการยกเลิกใบกำกับภาษีนี้ ใช่หรือไม่ !";
    // return confirm(message);
    bootbox.confirm("ต้องการยกเลิกการสั่งขาย ที่เลือกไว้ใช่หรือไม่ ?", function(result) {
      var currentForm = this;
      if (result) {
          bootbox.prompt("เนื่องจาก..", function(result) {
            if (result === null) {
              document.getElementById("frmVoid").submit();
            } else {
              document.getElementById("remarkvoid").value=result;
              document.getElementById("frmVoid").submit();
            }
          });
      }

    });
  });

  $("#btnEdit").click(function() {
    var message = "ต้องการแก้ไขใบกำกับภาษีนี้ ใช่หรือไม่ !";
    return confirm(message);
  });

  $("#btnSave").click(function() {
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
      var message = "ต้องการบันทึกแก้ไขใบกำกับภาษีนี้ ใช่หรือไม่ !";
      if (confirm(message)) {
        $("#btnSave").attr('disabled', true);
        var customer_name = $("#cusName").val();
        var customer_address = $("#cusAddress").val();
        var customer_taxid = $("#cusTaxID").val();
        var inv_id = $("#inv_id").val();

        $.ajax({
          type : "POST" ,
          url : link_edit_invoice ,
          data : {inv_id: inv_id, customer_name: customer_name, customer_address: customer_address, customer_taxid: customer_taxid} ,
          dataType: 'json',
          success : function(data) {
            if(data > 0)
            {
              alert("ทำการบันทึกข้อมูลเรียบร้อยแล้ว !");
              $("#btnSave").attr('disabled', false);
              window.location = link_view_invoice;
            }else{
              alert("ไม่สามารถบันทึกแก้ไขใบกำกับภาษีได้ 222!!!");
              $("#btnSave").attr('disabled', false);
            }
          },
          error: function (textStatus, errorThrown) {
              alert("ไม่สามารถบันทึกแก้ไขใบกำกับภาษีได้ 111!!!");
              $("#btnSave").attr('disabled', false);
          }
        });
      }else{
        return false;
      }
    }
  });


});
