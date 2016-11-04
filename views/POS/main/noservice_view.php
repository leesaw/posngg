<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('includes/header'); ?>
<style>

</style>
</head>
<body class="hold-transition skin-red layout-top-nav">
<div class="wrapper">
  <?php $this->load->view('includes/menu_head_pos'); ?>

  <!-- Full Width Column -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <center>ยังไม่เปิดใช้งาน<br><a href="<?php echo site_url("pos_main"); ?>">เลือกประเภทสินค้าอีกครั้ง</a></center>
      </h1>
    </section>

</div>
<!-- ./wrapper -->

<?php $this->load->view('includes/footer'); ?>
<script>
(function () {
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }

    function startTime() {
        var today = new Date(),
          dd = checkTime(today.getDate()),
          mm = checkTime(today.getMonth()+1),
          yy = checkTime(today.getFullYear()),
            h = checkTime(today.getHours()),
            m = checkTime(today.getMinutes()),
            s = checkTime(today.getSeconds());
        document.getElementById('time').value = dd + "/" + mm + "/" + yy + " " + h + ":" + m + ":" + s;
        t = setTimeout(function () {
            startTime()
        }, 500);
    }
    startTime();
})();
</script>
</body>
</html>
