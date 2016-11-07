<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">เมนูหลัก (<?php echo $this->session->userdata("sessproducttypeview"); ?>)</li>
        <li class="treeview">
          <a href="<?php echo site_url("pos_main"); ?>">
            <i class="fa fa-circle-o"></i> <span>เลือกประเภทสินค้า</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url("pos_time_sale/form_sale_order"); ?>">
            <i class="fa fa-circle-o"></i> <span>สั่งขาย</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
