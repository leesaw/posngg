<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">POS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>NGG</b> | POS</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li><a style="font-size:24px"><?php echo $this->session->userdata('sessshopname'); ?></a></li>
          <li><a id="time" style="font-size:24px"></a></li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs" style="font-size:24px"> | ผู้ใช้งาน : <?php echo $this->session->userdata('sessfirstname')." ".$this->session->userdata('sesslastname'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-body">
                <p>
                  ตำแหน่ง : <?php echo $this->session->userdata('sessposition'); ?><br>
                  บริษัท : <?php echo $this->session->userdata('sesscompany'); ?>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">เปลี่ยนรหัสผ่าน</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url("pos_login/signout"); ?>" class="btn btn-default btn-flat">ออกจากระบบ</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
