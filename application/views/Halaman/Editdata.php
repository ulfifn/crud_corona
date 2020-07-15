<?php $this->load->view('komponen/head');

 ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">User</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('corona/dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Covid-19 di Jepara
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="/corona/user_tambahdata/">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Tambah Data</span></a>
      </li>
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="/corona/user_chart/">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/corona/tampilan/"  data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
            <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Covid-19 di Jepara </h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Data</a>
          </div>

          <!-- Data Chart -->
          <div class="row">

          <div class="col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                
        <!-- Body Chart -->        
      <div class="card-body">
  
    <canvas id="myLineChart" width="100" height="30"></canvas>
          <!-- Default box -->
      <div class="card">
        <div class="card-body px-auto">
          <!-- form start -->
              <form role="form" method="post" action="<?php echo base_url('corona/ubah_aksi')?>">
                <div class="card-body">
                  <?php echo form_open('corona/simpan') ?>
                
                <div class="form-group">
                  <input type="hidden" name="id_kecamatan" id="id_kecamatan" value="<?php echo $id_kecamatan ?>">
                  </div>

                  <div class="form-group">
                    <label >Nama Kecamatan</label>
                    <input type="text" name="nama_kecamatan" id="nama_kecamatan"class="form-control" value="<?php echo $nama_kecamatan ?>">
                  </div>
                  <div class="form-group">
                    <label >Jumlah OTG</label>
                    <input type="text" name="jumlah_OTG" id="jumlah_OTG" class="form-control" value="<?php echo $jumlah_OTG ?>">
                  </div>
                  <div class="form-group">
                    <label >Jumlah PP</label>
                    <input type="text" name="jumlah_PP" id="jumlah_PP" class="form-control" value="<?php echo $jumlah_PP ?>">
                  </div>
                  <div class="form-group">
                    <label >Jumlah PDP</label>
                    <input type="text" name="jumlah_PDP" id="jumlah_PP" class="form-control" value="<?php echo $jumlah_PDP ?>" >
                  </div>
                  <div class="form-group">
                    <label >Jumlah ODP</label>
                    <input type="text" name="jumlah_ODP" id="jumlah_ODP" class="form-control" value="<?php echo $jumlah_ODP ?>">
                  </div>
                  <div class="form-group">
                    <label >Jumlah Possitif</label>
                    <input type="text" name="jumlah_positif" id="jumlah_positif" class="form-control"value="<?php echo $jumlah_positif ?>" >
                  </div>


              </div>
              <div class="card-body pad table-responsive">
                <div class="col-md-2">
                  <td>
                    <button input type="submit" name="simpan" value="Update"class="btn btn-block btn-primary">Update</button>
                  </td>
                </div>
              </div>

          </form>



      <!-- Update data -->    
     
  </div>
</div>
</div>
</div>
</div>

<!-- Content Row -->         


<?php $this->load->view('komponen/footer');

?>



</body>
</html>

 