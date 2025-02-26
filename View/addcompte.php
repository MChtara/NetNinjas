<?php

include '../controller/Comptetable.php';

$error = "";

// create client
$compte = null;

// create an instance of the controller


$Comptetable = new compte_table();
if (
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["date"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"])&&
    isset($_POST["role"])
) {
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"])&&
        !empty($_POST["role"])
        

    ) {
        $compte = new compte(
            null,
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['date'],
            $_POST['email'],
            $_POST['password'],
            $_POST['role']
        );
        $Comptetable->Ajoutercompte($compte);
        header('Location: afficherCompte.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  $title='Ajouter Compte';
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
          <center><a href="afficherCompte.php"><button type="button" class="btn btn-inverse-secondary btn-fw" spellcheck="false">Liste Compte</button></a></center>
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
                      <h4 class="card-title">Add an account</h4>
                    <form action="" method="post" class="forms-sample">
                      <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" class="form-control" id="firstName" maxlength="20">
                      </div>
                      <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" class="form-control" id="lastName" maxlength="20">
                      </div>
                      <div class="form-group">
                        <label for="date">Date de naissance</label>
                        <input type="date" name="date" class="form-control" id="date">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                      </div>
                      <div class="form-group">
                        <label for="role">Type utilisateur</label>
                        <select class="form-control" name="role" id="role">
                        <?php 
                        $rows = $Comptetable->Affichertype();

                        foreach($rows as $row):
                          ?>
                          <option value="<?=$row['id_type'];?>"> <?=$row['role'];?></option>
                          <?php endforeach?>
                        </select>
                      </div>
                      <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
                    
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
</body>