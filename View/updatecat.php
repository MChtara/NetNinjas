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
if (
    isset($_POST["id_cat"]) &&
    isset($_POST["nom_cat"])
) {
    if (
        !empty($_POST["id_cat"]) &&
        !empty($_POST["nom_cat"])
    ) {
        $categorie = new categorie($_POST['id_cat'], $_POST['nom_cat']);
        $categorieC->updateCategorie($categorie, $_POST['id_cat']);
        $_SESSION['message'] = "Record Modified Successfully";
        $_SESSION['msg_type'] = "success";
        header('Location:listcat.php');

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
                  <?php if(isset($_SESSION['message'])):
        ?>
		<label class="badge badge-<?=$_SESSION['msg_type'];?>"><?php 
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      ?></label>
      <?php endif ?>

 <?php
    if (isset($_GET['id_cat'])) {
        $categorie = $categorieC->showCategorie($_GET['id_cat']);

    ?>
                      <h4 class="card-title">Modify a Category</h4>
                      <center><a href="list.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">Liste Categorie</button></a></center>
                    <form action="" method="post" class="forms-sample">
                    <input type="hidden" name="id_cat" id="id_cat" value="<?php echo $categorie['id_cat']; ?>" maxlength="20">
                      <div class="form-group">
                        <label for="nom_cat">Nom du Categorie:</label>
                        <input type="text" name="nom_cat" class="form-control" value="<?php echo $categorie['nom_cat']; ?>" id="nom_cat">
                      </div>
                      

                        <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>

                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
<?php
    }
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