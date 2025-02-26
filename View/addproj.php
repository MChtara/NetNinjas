<?php
require_once '../Model/proj.php';
require_once '../Controller/projC.php';
require_once '../Model/salle.php';
require_once '../Controller/salleC.php';
var_dump($_POST);
$sql = "SELECT * from film";
$db = config::getConnexion();
try {
  $listefilm = $db->query($sql);
  // return $listefilm;
} catch (Exception $e) {
  echo $e->getMessage();
}
$error = "";
$salleC = NULL;
$salleC = new salleC();
$listesalle = $salleC->afficherSalle();
// create adherent
$projC = null;

// create an instance of the controller
$projC = new projC();
if (
  isset($_POST["h_proj"]) &&
  isset($_POST["id_film"]) &&
  isset($_POST["id_salle"]) &&
  isset($_POST["date_proj"])
) {
  if (
    !empty($_POST["h_proj"]) &&
    !empty($_POST['id_film']) &&
    !empty($_POST["id_salle"]) &&
    !empty($_POST["date_proj"])
  ) {
    $projection = new projection(
      $_POST['h_proj'],
      $_POST['id_film'],
      $_POST['id_salle'],
      $_POST['date_proj']
    );
    var_dump($_POST);
    $projC->addProj($projection);
    header('Location:addproj.php');
  } else
    $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"> </script>
</head>
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
        <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ajouter une projection:</h4>
                <p class="card-description"> Veuillez entrer les données de la nouvelle projection </p>
                <form action="" method="POST" class="forms-sample">

                  <div class="form-group">
                    <label for="exampleInputUsername1">Heure de projection:</label>
                    <input type="time" class="form-control" id="h_proj" name="h_proj"
                      placeholder="Heure de la projection" min="08:00" max="22:00" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1"> Nom du Film: </label>

                    <select class="form-control" id="id_film" name="id_film">
                      <?php
                      foreach ($listefilm as $row) {
                        echo "<option value='" . $row["id_film"] . "'>" . $row["titre"] . "</option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Nom du Salle: </label>

                    <select class="form-control" id="id_salle" name="id_salle">
                      <?php
                      foreach ($listesalle as $row) {
                        echo "<option value='" . $row["id_salle"] . "'>" . $row["nom_salle"] . "</option>";

                      }
                      ?>

                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Date:</label>
                    <input type="date" class="form-control" id="date_proj" name="date_proj"
                      placeholder="Date de la projection" min="2023-04-25" max="2024-04-25" required>
                  </div>
                  <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input"> Remember me </label>
                  </div>
                  <button type="submit" name="submit_data" id="submit_data" class="btn btn-primary mr-2">Ajouter
                    projection</button>
                  <button class="btn btn-dark">Cancel</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Pie chart</h4>
                <canvas id="pieChart"></canvas>
              </div>
            </div>
          </div>
          <div>
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

        <script src="../Controller/control.js"></script>

        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="../assets/js/projchart.js"></script>
</body>

</html>