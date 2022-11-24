<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../includes/dist/img/th.jpg" class="img-circle" alt="User Image">
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
          <a href="index3.php">
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
            <li><a href="data-akun1.php"><i class="fa fa-circle-o"></i> Data Akun</a></li>
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
            <li><a href="pendapatan1.php"><i class="fa fa-circle-o"></i> Pendapatan</a></li>
            <li><a href="pembelian1.php"><i class="fa fa-circle-o"></i> Pembelian</a></li>
            <li><a href="piutang1.php"><i class="fa fa-circle-o"></i> Piutang</a></li>
            <li><a href="prive1.php"><i class="fa fa-circle-o"></i> Prive</a></li>
            <li><a href="hutang1.php"><i class="fa fa-circle-o"></i> Hutang</a></li>
            <li><a href="beban1.php"><i class="fa fa-circle-o"></i> Beban</a></li>
          </ul>
        </li>
        
        
    <!-- /.sidebar -->
  </aside>