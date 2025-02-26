<?php
require_once '../Controller/dashboardC.php';
$dashboard = new dashboardC();
$abon = $dashboard->ListeAbonnement();
$compte = $dashboard->ListeCompte();
$reservation = $dashboard->ListeReservation();
$proj = $dashboard->ListeProjection();
?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  $title="Dashboard";
  ?>
  <?php
  // include header partial
  require_once 'partials/_includehead.php';
?>
  <body>
    <div class="container-scroller">

<?php
//maaaaaaaaaaaaaaaaaaaa
  // include header partial
  require_once 'partials/_navbar.php';
?>
<?php
  // include header partial
  require_once 'partials/_sidebar.php';
?>
 <div class="main-panel">
          <div class="content-wrapper">
          <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $abon;?></h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-playlist-check icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Abonnements</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $proj;?></h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-info">
                          <span class="mdi mdi-projector icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Projections</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $compte;?></h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-secondary">
                          <span class="mdi mdi-account-group icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Utilisateurs</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><?php echo $reservation;?></h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-primary">
                          <span class="mdi mdi-bookmark-check icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Reservations</h6>
                  </div>
                </div>
              </div>
            </div>
          <div class="col-lg-12 grid-margin stretch-card">

            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Nombre  de  films  par  rapport  au  categorie</h4>
                  <canvas id="barChart" style="height: 230px"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Nombre de projections par salle</h4>
                <canvas id="pieChart"></canvas>
              </div>
            </div>
          </div>
          <div>
              </div>
          </div>
          
<?php
  // include header partial
  require_once 'partials/_footer.html';
?>
</div>
</div>
<?php
  // include header partial
  require_once 'partials/_includeend.html';
?>
<script src="../View/chart.js"></script>
<script src="../assets/js/projchart.js"></script>
</body>