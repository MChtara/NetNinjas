<?php
require_once '../Controller/filmC.php';
require_once '../Controller/categorieC.php';
$error = "";

// create film
$film = null;
$categorie = new categorieC(); 
$list = $categorie->listCategorie();


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
        $film = new film(
            null,
            $_POST['titre'],
            $_POST["realisateur"],
            $_POST["duree"],
            $_POST["synopsis"],
            $_POST['annee'],
            $_POST['id_cat']
        );

        $filmC->addFilm($film);
        $_SESSION['message'] ="Record has been saved!";
        $_SESSION['msg_type'] = "success";
        header('Location:list_film.php');
    } 
    else{ 
        $error = "Missing information";
        $_SESSION['msg_type'] = "warning";
    }
       
}


?>
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

                      <h4 class="card-title">Add a Film</h4>
                      <center><a href="list_film.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">Liste Films</button></a></center>
                    <form action="" method="post" class="forms-sample">
                      <div class="form-group">
                        <label for="titre">Titre du Film</label>
                        <input type="text" name="titre" class="form-control" id="titre">
                      </div>

                      <div class="form-group">
                        <label for="realisateur">Realisateur</label>
                        <input type="text" name="realisateur" class="form-control" id="realisateur">
                      </div>

                      <div class="form-group">
                        <label for="duree">Duree</label>
                        <input type="int" name="duree" class="form-control" id="duree">
                      </div>

                      <div class="form-group">
                        <label for="synopsis">synopsis</label>
                        <input type="text" name="synopsis" class="form-control" id="synopsis">
                      </div>

                      <div class="form-group">
                        <label for="annee">Annee</label>
                        <input type="text" name="annee" class="form-control" id="annee">
                      </div>

                      <div class="form-group">
                        <label for="nom_cat">Categorie</label>
                        <select name="id_cat" class="form-control" id="nom_cat">
                        <option value="">Sélectionnez une catégorie</option>
                        <?php

                        foreach ($list as $categorie) {
                          echo "<option value=\"".$categorie['id_cat']."\">".$categorie['nom_cat']."</option>";                  
                          }
                        ?>
                        </select>
                      </div>
                      
                      <button onclick="return validateFilm()" type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>

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