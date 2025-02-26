<?php

include '../Controller/abonnementC.php';
$error = "";
// create abonnement
$abonnement = null;
// create an instance of the controller
$abonnementC=new abonnementC();
if(isset($_GET["id_abon"])) :
  $abonnement=$abonnementC->RecupererAbonnement($_GET["id_abon"]);
endif;
?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  $title=isset($abonnement) ? 'Modify Abonnement':'Add Abonnement';
  $sidebar="abon";
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
          <center><a href="afficherAbon.php"><button type="button" class="btn btn-inverse-secondary btn-fw" spellcheck="false">Liste Abonnement</button></a>
	  <a href="afficherTypeAbon.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">Liste Categorie</button></a></center>
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
                    <?php if(isset($abonnement)) :?>
                      <h4 class="card-title">Modify an abonnement</h4>
                    <?php else :?>
                      <h4 class="card-title">Add a new abonnement</h4>
                      <?php endif ?>
                      <form action="../Process/processAbon.php" method="post" class="forms-sample">
                      <div class="form-group">
                        <label for="DateStart">Date Start</label>
                        <input type="date" name="DateStart" class="form-control" id="DateStart" value="<?php echo isset($abonnement) ? $abonnement['date_debut']:'';?>">
                      </div>
                      <div class="form-group">
                        <label for="DateEnd">Date End</label>
                        <input type="date" name="DateEnd" class="form-control" id="DateEnd" value="<?php echo isset($abonnement) ? $abonnement['date_expiration']:'';?>">
                      </div>
                      <div class="form-group">
                        <label for="selectUser">User</label>
                        <select class="form-control" name="selectUser" id="selectUser">
                        <?php 
                        include_once '../controller/Comptetable.php';
                        $userController = new compte_table();
                        $rows = $userController->Affichercompte();
                        
                        foreach($rows as $row):
                          ?>
                          <?php
                          if($abonnementC->CheckAbonnementUser($row['id_user'])){
                          ?>
                          <option <?php echo (isset($abonnement) && $abonnement['id_user']==$row['id_user']) ? 'selected="selected"':'';?> value="<?=$row['id_user'];?>"> <?=$row['email'];?></option>
                          <?php }
                          endforeach?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="selectType">Type Abonnement</label>
                        <select class="form-control" name="selectType" id="selectType">
                        <?php 
                        $rows = $abonnementC->AfficherCategorie();

                        foreach($rows as $row):
                          ?>
                          <option <?php echo (isset($abonnement) && $abonnement['type']==$row['id_typeabon']) ? 'selected="selected"':'';?> value="<?=$row['id_typeabon'];?>"> <?=$row['label_typeabon'];?></option>
                          <?php endforeach?>
                        </select>
                      </div>
                      
                      <?php if(isset($abonnement)) :?>

                      <input type="hidden" name="id_abon" value = "<?php  echo isset($abonnement) ? $_GET["id_abon"]:'';?>">
                      <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
                      <?php else :?>
                        <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
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
  // Get references to the start and end date inputs
const startDateInput = document.querySelector('input[name="DateStart"]');
const endDateInput = document.querySelector('input[name="DateEnd"]');

// Set the minimum and maximum values for the start and end date inputs
startDateInput.min = new Date().toISOString().split('T')[0]; // Today's date
endDateInput.min = new Date().toISOString().split('T')[0]; // Today's date
endDateInput.max = new Date(new Date().getFullYear() + 10, 11, 31).toISOString().split('T')[0]; // 10 years from now

// Add an event listener to the start date input to update the minimum value of the end date input
startDateInput.addEventListener('input', (event) => {
  const startDate = new Date(event.target.value);
  endDateInput.value = startDate;
  endDateInput.min = startDate.toISOString().split('T')[0];
});
  </script>
</body>