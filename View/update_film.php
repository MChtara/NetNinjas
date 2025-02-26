<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../Controller/filmC.php';
require_once '../Controller/categorieC.php';


$error = "";

// create film
$film = null;
$categorie = new categorieC(); 
$list = $categorie->listCategorie();

// create an instance of the controller
$filmC = new filmC();
if (
    isset($_POST["titre"]) &&
    isset($_POST["realisateur"]) &&
    isset($_POST["duree"]) &&
    isset($_POST["synopsis"]) &&
    isset($_POST["annee"]) &&
    isset($_POST["id_cat"])
) {
    if (
        !empty($_POST['titre']) &&
        !empty($_POST["realisateur"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["synopsis"]) &&
        !empty($_POST["annee"]) &&
        !empty($_POST["id_cat"])
    ) {
        $film = new film($_POST['id_film'], $_POST['titre'], $_POST["realisateur"], $_POST["duree"], $_POST["synopsis"], $_POST['annee'], $_POST['id_cat']);
        $filmC->updateFilm($film, $_POST['id_film']);
        $_SESSION['message'] = "Record Modified Successfully";
        $_SESSION['msg_type'] = "success";
        header('Location:list_film.php');
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
 
    if (isset($_GET['id_film'])) {
        $film = $filmC->showfilm($_GET['id_film']);

    ?>
                      <h4 class="card-title">Modify a Film</h4>
                      <center><a href="list_film.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">Liste film</button></a></center>
                    <form action="" method="post" class="forms-sample">
                    <input type="hidden" name="id_film" id="id_film" value="<?php echo $film['id_film']; ?>" maxlength="20">
                    
                      <div class="form-group">
                        <label for="titre">Titre du film</label>
                        <input type="text" name="titre" class="form-control" value="<?php echo $film['titre']; ?>" id="titre">
                      </div>

                      <div class="form-group">
                        <label for="realisateur">realisateur</label>
                        <input type="text" name="realisateur" class="form-control" value="<?php echo $film['realisateur']; ?>" id="realisateur">
                      </div>

                      <div class="form-group">
                        <label for="duree">Duree</label>
                        <input type="int" name="duree" class="form-control" value="<?php echo $film['duree']; ?>" id="duree">
                      </div>

                      <div class="form-group">
                        <label for="synopsis">synopsis</label>
                        <input type="text" name="synopsis" class="form-control" value="<?php echo $film['synopsis']; ?>" id="synopsis">
                      </div>

                      <div class="form-group">
                        <label for="annee">annee</label>
                        <input type="text" name="annee" class="form-control" value="<?php echo $film['annee']; ?>" id="annee">
                      </div>

                      <div class="form-group">
                        <label for="nom_cat">Categorie</label>
                        <select name="id_cat" class="form-control" id="nom_cat" >
                        <option value=""></option>
                        <?php

                        foreach ($list as $categorie) {
                    
                          $selected = '';
                          if ($categorie['id_cat'] == $film['id_cat']) {
                              $selected = 'selected';
                          }
                          echo "<option value=\"".$categorie['id_cat']."\" ".$selected.">".$categorie['nom_cat']."</option>"; 
                        }
                        ?>
                        </select>
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

</html>