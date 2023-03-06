<?php
include "includes/header.php";
include "config/koneksi.php"; 
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total Dokumen LPPD</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-ui-checks-grid"></i>
                    </div>
                    <div class="ps-3">
                      <h6>  <?php
                      require "config/koneksi.php";
                      $query =
                          "SELECT id_lppd FROM lppd ORDER BY id_lppd ";
                      $query_run = mysqli_query($koneksi, $query);
                      $row = mysqli_num_rows($query_run);

                      echo "<h3> " . $row . " </h3>";
                      ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Total Dokumen RKA</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-earmark-text-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>   <h6>  <?php
                      require "config/koneksi.php";
                      $query =
                          "SELECT id_rka FROM rka ORDER BY id_rka ";
                      $query_run = mysqli_query($koneksi, $query);
                      $row = mysqli_num_rows($query_run);

                      echo "<h3> " . $row . " </h3>";
                      ?></h6></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->



          </div>
        </div><!-- End Left side columns -->
   



        <!-- Right side columns -->
        <div class="col-lg-4">


         


        </div><!-- End Right side columns -->

      </div>
    
    </section>
    

<?php
include "includes/footer.php"; ?>