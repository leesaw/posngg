$(document).ready(function() {
  $("#btnVoid").click(function() {
    var message = "ต้องการยกเลิกใบกำกับภาษีนี้ ใช่หรือไม่ !";
    return confirm(message);
  });

});
