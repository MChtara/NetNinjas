<?php

include '../Controller/abonnementC.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$error = "";

// create abonnement
$typeabon = null;
// create an instance of the controller
$abonnementC=new abonnementC();
if(isset($_GET["id_typeabon"])) :
  $typeabon=$abonnementC->RecupererCategorie($_GET["id_typeabon"]);
endif;
?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  $title=isset($typeabon) ? 'Modify Type Abonnement':'Add Type Abonnement';
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
          <center><a href="afficherTypeAbon.php"><button type="button" class="btn btn-inverse-secondary btn-fw" spellcheck="false">Liste Categorie</button></a>
	  <a href="afficherAbon.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">Liste Abonnement</button></a></center>
</br>
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
                    <?php if(isset($typeabon)) :?>
                      <h4 class="card-title">Modify a Type Abonnement</h4>
                    <?php else :?>
                      <h4 class="card-title">Add a new Type Abonnement</h4>
                      <?php endif ?>
                      <form action="../Process/processTypeAbon.php" method="post" class="forms-sample">
                      <div class="form-group">
                        <label for="Labelabon">Label Type</label>
                        <input type="text" name="Labelabon" class="form-control" id="Labelabon" value="<?php echo isset($typeabon) ? $typeabon['label_typeabon']:'';?>">
                      </div>
                      <div class="form-group">
                        <label for="Prixabon">Prix Type</label>
                        <input type="number" name="Prixabon" class="form-control" id="Prixabon" value="<?php echo isset($typeabon) ? $typeabon['prix_typeabon']:'';?>">
                      </div>
                      <div class="form-group">
                        <label for="Iconabon">Icon Type</label>
                        <input type="text" name="Iconabon" class="form-control" id="Iconabon" value="<?php echo isset($typeabon) ? $typeabon['icon_typeabon']:'';?>">
                      </div>
                      <?php if(isset($typeabon)) :?>

                      <input type="hidden" name="id_typeabon" value = "<?php  echo isset($typeabon) ? $_GET["id_typeabon"]:'';?>">
                      <button type="submit" name="modifier" onclick="return check();" class="btn btn-primary">Modifier</button>
                      <?php else :?>
                        <button type="submit" name="ajouter" onclick="return check();" class="btn btn-primary">Ajouter</button>
                      <?php endif ?>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
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
<script>
  // Get references inputs

var errormsg="";
// Add an event listener to the form's submit event
  function check(){
  errormsg="";
  const labelInput = document.getElementById("Labelabon");
  const priceInput = document.getElementById("Prixabon");
  const iconInput = document.getElementById("Iconabon");
  // Check that the label and icon inputs are less than 50 characters
  if (labelInput.value.length >= 50 || iconInput.value.length >= 50) {
    document.getElementById("error").classList.add("badge-warning");
    errormsg=errormsg+'Label and icon inputs must be less than 50 characters.';
  }

  // Check that the price input is positive
  if (priceInput.value <= 0) {
    document.getElementById("error").classList.add("badge-warning");
    errormsg=errormsg+' Price input must be positive';
  }
  document.getElementById("error").innerHTML=errormsg;
  if(errormsg=="")
  {
    return true;
  } else {
    return false;
  }

}
  </script>
</body>