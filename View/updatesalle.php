<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../Model/salle.php';
require_once '../Controller/salleC.php';

$error = "";
//var_dump($_POST);
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
      $_POST['nbplaces'],
      $_POST['ho'],
      $_POST['hf'],
      $_POST['latitude'],
      $_POST['longitude']
    );
    // var_dump($salle);
    $salleC->modifiersalles($salle, $_POST["id_salle"]);
    header('Location:displaysalle.php');

  }
} else {
  $error = "Missing info";
  // var_dump($_POST);

  echo $error;
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
              <h4 class="card-title">Modifier une salle de cinema:</h4>
              <p class="card-description"> Basic form layout </p>
              <?php
              if (isset($_POST['id_salle'])) {
                $salle = $salleC->recuperersalle($_POST['id_salle']);

                ?>
                <form action="" method="POST" class="forms-sample">
                  <input type="hidden" name="id_salle" value=<?= $_POST['id_salle']; ?>>
                    <div class="form-group">
                      <label for="nom_salle">Nom de la salle</label>
                      <input type="text" class="form-control" id="nomsalle" name="nomsalle"
                        placeholder="Nom de la salle" value="<?php echo $salle['nom_salle']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Latitude</label>
                      <input type="number" class="form-control" id="latitude" name="latitude" placeholder="latitude"
                        value="<?php echo $salle['latitude']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Longitude</label>
                      <input type="number" class="form-control" id="longitude" name="longitude" placeholder="longitude"
                        value="<?php echo $salle['longitude']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre de places</label>
                      <input type="number" class="form-control" id="nbplaces" name="nbplaces"
                        placeholder="Nombre de places" value="<?php echo $salle['nb_places']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Heure d'ouverture</label>
                      <input type="time" class="form-control" id="ho" name="ho" placeholder="Heure d'ouverture"
                        min="08:00" max="20:00" value="<?php echo $salle['H_ouv']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Heure de fermeture</label>
                      <input type="time" class="form-control" id="hf" name="hf" placeholder="Heure de fermeture"
                        min="10:00" max="23:59" value="<?php echo $salle['H_ferm']; ?>">
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Sauvegarder salle</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
              </div>
              <?php

              }
              ?>

          </div>
        </div>
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