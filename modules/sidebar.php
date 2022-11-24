<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../includes/dist/img/admin.png" class="img-circle" alt="User Image">
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
          <a href="index2.php">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>       
         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data-user.php"><i class="fa fa-circle-o"></i>Data User</a></li>
            <li><a href="data-akun.php"><i class="fa fa-circle-o"></i> Data Akun</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pendapatan.php"><i class="fa fa-circle-o"></i> Pendapatan</a></li>
            <li><a href="pembelian.php"><i class="fa fa-circle-o"></i> Pembelian</a></li>
            <li><a href="piutang.php"><i class="fa fa-circle-o"></i> Piutang</a></li>
            <li><a href="prive.php"><i class="fa fa-circle-o"></i> Prive</a></li>
            <li><a href="hutang.php"><i class="fa fa-circle-o"></i> Hutang</a></li>
            <li><a href="beban.php"><i class="fa fa-circle-o"></i> Beban</a></li>
          </ul>
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
            <li><a href="ju.php"><i class="fa fa-circle-o"></i> Jurnal Umum</a></li>
            <li><a href="bb.php"><i class="fa fa-circle-o"></i> Buku Besar</a></li>
            <li><a href="ns.php"><i class="fa fa-circle-o"></i> Neraca Saldo</a></li>  
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="laporan-neraca.php"><i class="fa fa-circle-o"></i> Laporan Neraca</a></li>
            <li><a href="laporan-lr.php"><i class="fa fa-circle-o"></i> Laporan Laba Rugi</a></li>
            <li><a href="laporan-pm.php"><i class="fa fa-circle-o"></i> Laporan Perubahan Modal</a></li>
          </ul>
        </li>
        
    <!-- /.sidebar -->
  </aside>