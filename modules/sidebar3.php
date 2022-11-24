<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../includes/dist/img/owner.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGASI UTAMA</li>
        <li>
          <a href="index4.php">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
               
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Perekapan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ju1.php"><i class="fa fa-circle-o"></i> Jurnal Umum</a></li>
            <li><a href="bb1.php"><i class="fa fa-circle-o"></i> Buku Besar</a></li>  
            <li><a href="ns1.php"><i class="fa fa-circle-o"></i> Neraca Saldo</a></li>
          </ul>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="laporan-neraca1.php"><i class="fa fa-circle-o"></i> Laporan Neraca</a></li>
            <li><a href="laporan-lr1.php"><i class="fa fa-circle-o"></i> Laporan Laba Rugi</a></li>
            <li><a href="laporan-pm1.php"><i class="fa fa-circle-o"></i> Laporan Perubahan Modal</a></li>
          </ul>
        </li>
        
    <!-- /.sidebar -->
  </aside>