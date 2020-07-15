<?php 

$this->load->view('komponen/head');

 ?>



 <body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

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
            </li>

            <li class="nav-item">
            	<a class="nav-link" href="/corona/">
            		<span class="mr-4 d-none d-lg-inline text-gray-800">Home</span></a>
      		</li>
      		<li class="nav-item">
            	<a class="nav-link" href="/corona/">
            		<span class="mr-4 d-none d-lg-inline text-gray-800">Chart</span></a>
      		</li>
      		<li class="nav-item">
            	<a class="nav-link" href="/corona/tabel/">
            		<span class="mr-4 d-none d-lg-inline text-gray-800">Tabel</span></a>
      		</li>


            <div class="topbar-divider d-none d-sm-block"></div>


            <!-- Nav Item - User Information -->


            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600"><i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>Start Update Data</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/corona/login/" >
                  <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Login
                </a>
                <a class="dropdown-item" href="/corona/register/">
                  <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                  Register
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
            <a href="<?php echo base_url('corona/pdf') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Data</a>
          </div>

        	<!-- Data Chart -->
        	<div class="row">

        	<div class="col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Chart</h6>
                  <div class="dropdown no-arrow">
                    
                  </div>
                </div>

        <!-- Body Chart -->        
	    <div class="card-body">
	
    <canvas id="myLineChart" width="100" height="30"></canvas>

   <script>


	Chart.defaults.global.defaultFontFamily = "calibri";
	Chart.defaults.global.defaultFontSize = 18;
			
	new Chart(document.getElementById("myLineChart"), {
	  type: 'line',
	  data: {
	    labels: [

	    <?php

		    if (count($stat)>0){
		    	foreach ($stat as $val) {
		    		echo "'".$val->nama_kecamatan."',";
		    	}
		    } 
		     ?>
	    ],
	    datasets: [{
        data: [

        <?php
		    if (count($stat)>0){
		    	foreach ($stat as $val) {
		    		echo $val->jumlah_OTG.",";
		    	}
		    } 
		 	?>

        ],
        label: "OTG",
        backgroundColor: "#39b54a",
        pointRadius: 5,
        pointBackgroundColor: "#39b54a",
        borderColor: "#39b54a",
        fill: false
      }, {
        data: [
        <?php
		    if (count($stat)>0){
		    	foreach ($stat as $val) {
		    		echo $val->jumlah_PP.",";
		    	}
		    } 
		 	?>


        ],
        label: "PP",
        backgroundColor: "#00aeef",
        pointRadius: 5,
        pointBackgroundColor: "#00aeef",
        borderColor: "#00aeef",
        fill: false
      }, {
        data: [
        <?php
		    if (count($stat)>0){
		    	foreach ($stat as $val) {
		    		echo $val->jumlah_PDP.",";
		    	}
		    } 
		 	?>


        ],
        label: "PDP",
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        pointRadius: 5,
        pointBackgroundColor: "#fff200",
        borderColor: "#fff200",
        fill: false
      }, {
        data: [
        <?php
		    if (count($stat)>0){
		    	foreach ($stat as $val) {
		    		echo $val->jumlah_ODP.",";
		    	}
		    } 
		 	?>


        ],
        label: "ODP",
        backgroundColor: "#f7941d",
        pointRadius: 5,
        pointBackgroundColor: "#f7941d",
        borderColor: "#f7941d",
        fill: false
      }, {
        data: [
        <?php
		    if (count($stat)>0){
		    	foreach ($stat as $val) {
		    		echo $val->jumlah_positif.",";
		    	}
		    } 
		 	?>


        ],
        label: "Positif",
        backgroundColor: "#ed1c24",
        pointRadius: 5,
        pointBackgroundColor: "#ed1c24",
        borderColor: "#ed1c24",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Data Pasien'
    }
  }
});
		</script>
	  </div>
	</div>
  </div>
  </div>
 </div>


  		
  <!-- tutup div wrapped-->
 </div>





<?php $this->load->view('komponen/footer');

?>

</body>
</html>