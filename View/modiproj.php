<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../Model/proj.php';
require_once '../Controller/projC.php';
require_once '../Model/salle.php';
require_once '../Controller/salleC.php';
$sql = "SELECT * from film";
$db = config::getConnexion();
try {
  $listefilm = $db->query($sql);
  // return $listefilm;
} catch (Exception $e) {
  echo $e->getMessage();
}
$salleC=new salleC();
$listesalle=$salleC->afficherSalle();
$error = "";
//var_dump($_POST);
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
    !empty($_POST["id_film"]) &&
    !empty($_POST["id_salle"]) &&
    !empty($_POST["date_proj"])
  ) {
    $projection = new projection(
      $_POST['h_proj'],
      $_POST['id_film'],
      $_POST['id_salle'],
      $_POST['date_proj']
    );
   // var_dump($projection);
    $projC->modifierproj($projection, $_POST["id_proj"]);
    header('Location:affproj.php');
  } 
}
  else
    {$error = "Missing info";
     // var_dump($_POST);
  
echo $error;}
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
              <h4 class="card-title">Modifier une projection:</h4>
              <p class="card-description"> Basic form layout </p>
              <?php
              if (isset($_POST['id_proj'])) {
                $projection = $projC->recupererproj($_POST['id_proj']);
                ?>
                <form action="" method="POST" class="forms-sample">
                <input type="hidden" name="id_proj" value=<?= $_POST['id_proj']; ?>>
                  <div class="form-group">
                    
                    <div class="form-group">
                      <label for="nom_projection">Heure de projection</label>
                      <input type="time" class="form-control" id="h_proj" name="h_proj"
                        placeholder="Heure de la projection" value="<?= $projection['h_proj']; ?>">
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
                      <label for="exampleInputEmail1">Nom du Salle</label>
                      
                      <select class="form-control" id="id_salle" name="id_salle">
                              <?php
                    foreach ($listesalle as $row) {
                      echo "<option value='" . $row["id_salle"] . "'>" . $row["nom_salle"] . "</option>";
                      
                    }
                    ?>
                              </select>
                              </div>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date de projection</label>
                      <input type="date" class="form-control" id="date_proj" name="date_proj"
                        placeholder="Date de projection" value="<?= $projection['date_proj']; ?>">
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Sauvegarder projection</button>
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