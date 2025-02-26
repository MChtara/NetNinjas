<?php
require_once '../Model/salle.php';
require_once '../Controller/salleC.php';

$error = "";

// create adherent
$salleC = null;

// create an instance of the controller
$salleC = new salleC();
if (
  isset($_POST["nomsalle"]) &&
  isset($_POST["nbplaces"]) &&
  isset($_POST["ho"]) &&
  isset($_POST["hf"]) &&
  isset($_POST["latitude"]) &&
  isset($_POST["longitude"])
) {
  if (
    !empty($_POST["nomsalle"]) &&
    !empty($_POST["nbplaces"]) &&
    !empty($_POST["ho"]) &&
    !empty($_POST["hf"]) &&
    !empty($_POST['latitude']) &&
    !empty($_POST['longitude'])
  ) {
    $salle = new salle(
      $_POST['nomsalle'],
      $_POST['ho'],
      $_POST['hf'],
      $_POST['nbplaces'],
      $_POST['latitude'],
      $_POST['longitude'],
    );
    $salleC->addSalle($salle);
    header('Location:displaysalle.php');
  } else
    $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = "Dashboard";
?>
<?php
// include header partial
require_once '../admin/partials/_includehead.php';
?>

<body>
  <div class="container-scroller">

    <?php
    // include header partial
    require_once '../admin/partials/_navbar.php';
    ?>
    <?php
    // include header partial
    require_once '../admin/partials/_sidebar.php';
    ?>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Ajouter des salles de cinema:</h4>
              <p class="card-description"> Basic form layout </p>
              <form action="" method="POST" class="forms-sample">
                <div class="form-group">
                  <label for="exampleInputUsername1">Nom de la salle</label>
                  <input type="text" class="form-control" id="nomsalle" name="nomsalle" placeholder="Nom de la salle"
                    minlength="2" maxlength="15" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Latitude de la salle</label>
                  <input type="number" step="0.0000001" min="-90" max="90" class="form-control" id="latitude" name="latitude" placeholder="latitude"
                    required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Longitude de la salle</label>
                  <input type="number" step="0.0000001" min="-180" max="180" class="form-control" id="longitude" name="longitude" placeholder="longitude"
                    required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre de places</label>
                  <input type="number" class="form-control" id="nbplaces" name="nbplaces" placeholder="Nombre de places"
                    min="1" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Heure d'ouverture</label>
                  <input type="Time" class="form-control" id="ho" name="ho" placeholder="Heure d'ouverture" min="08:00"
                    max="20:00" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Heure de fermeture</label>
                  <input type="Time" class="form-control" id="hf" name="hf" placeholder="Heure de fermeture" min="10:00"
                    max="23:59" required>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"> Remember me </label>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Ajouter salle</button>
                <button class="btn btn-dark">Cancel</button>
              </form>
            </div>
          </div>
        </div>
        <?php

        ?>

      </div>
      <?php
      // include header partial
      require_once '../admin/partials/_footer.html';
      ?>
    </div>
  </div>
  <?php
  // include header partial
  require_once '../admin/partials/_includeend.html';
  ?>
</body>

</html>