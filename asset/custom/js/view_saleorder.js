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
    var message = "ต้องการยกเลิกการขายนี้ ใช่หรือไม่ !";
    return confirm(message);
  });

});
