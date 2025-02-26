<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../Controller/categorieC.php';

$error = "";

// create categorie
$categorie = null;

// create an instance of the controller
$categorieC = new categorieC();
if (isset($_POST["nom_cat"])) 
{
  if (!empty($_POST["nom_cat"]))
  {
    $categorie = new categorie(null, $_POST['nom_cat']);
    $categorieC->addCategorie($categorie);
    $_SESSION['message'] ="Record has been saved!";
    $_SESSION['msg_type'] = "success";
    header('Location: listcat.php');
  } else {
    $_SESSION['message'] = "Missing information";
    $_SESSION['msg_type'] = "warning";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  $title="Dashboard";
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
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div id="error">
              <?php echo $error; ?>
                </div>
                  <?php if(isset($_SESSION['message'])):
        ?>
		<label class="badge badge-<?=$_SESSION['msg_type'];?>"><?php 
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      ?></label>
      <?php endif ?>

                      <h4 class="card-title">Add a Category</h4>
                      <center><a href="listcat.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">Liste Categorie</button></a></center>
                    <form action="" method="post" class="forms-sample">
                      <div class="form-group">
                        <label for="nom_cat">Nom du Categorie</label>
                        <input type="text" name="nom_cat" class="form-control" id="nom_cat">
                      </div>
                      

                      <button onclick="return validateCategoryName()" type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>

                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
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
 <script src="../Controller/validation.js"></script>
</body>
</html>