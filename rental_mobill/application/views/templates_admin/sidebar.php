<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          
        <li class="dropdown"><a href="#" class="nav-link nav-link-lg nav-link-user">
            
            <div class="d-sm-none d-lg-inline-block">Welcome <?php echo $this->session->userdata('nama'); ?></div></a>
            
          </li>
          </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">UWU CAR RENTAL</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RM</a>
          </div>
          <ul class="sidebar-menu">
             
              <li>
                <a class="nav-link" href="<?php echo base_url('Admin/Dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
              </li>

              <li>
                <a class="nav-link" href="<?php echo base_url('Admin/Data_mobil') ?>"><i class="fas fa-car"></i> <span>Data Mobil</span></a>
              </li>

              <li>
                <a class="nav-link" href="<?php echo base_url('Admin/Data_type') ?>"><i class="fas fa-grip-horizontal"></i> <span>Data Type</span></a>
              </li>

              <li>
                <a class="nav-link" href="<?php echo base_url('Admin/Data_customer') ?>"><i class="fas fa-user"></i> <span>Data Customer</span></a>
              </li>

              <li>
                <a class="nav-link" href="<?php echo base_url('Admin/Data_transaksi') ?>"><i class="fas fa-random"></i> <span>Transaksi</span></a>
              </li>

              <li>
                <a class="nav-link" href="<?php echo base_url('Admin/Laporan') ?>"><i class="fas fa-clipboard-list"></i> <span>Laporan</span></a>
              </li>

              <li>
                <a class="nav-link" href="<?php echo base_url('Auth/logoutadmin') ?>"><i class="fas fa-clipboard-list"></i> <span>Logout</span></a>
              </li>
              
            </ul>

            
        </aside>
      </div>