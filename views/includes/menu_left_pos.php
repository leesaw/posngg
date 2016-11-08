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
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
