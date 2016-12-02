$(document).ready(function() {
  $("#btnEdit").click(function() {
    var message = "ต้องการแก้ไขข้อมูลการขายนี้ ใช่หรือไม่ !";
    return confirm(message);
  });

  $("#btnSelectProductType").click(function() {
    var message = "ต้องการให้ข้อมูลทั้งหมดในหน้านี้ ถูกลบใช่หรือไม่ !";
    return confirm(message);
  });

  $("#btnVoid").click(function() {
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


});
