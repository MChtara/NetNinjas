<?php

include '../controller/Comptetable.php';

$error = "";

// create client
$compte = null;

// create an instance of the controller


$Comptetable = new compte_table();
if(isset($_GET["id_compte"])) :
    $compte=$Comptetable->Recuperercompte($_GET["id_compte"]);
endif;
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
        $Comptetable->Modifiercompte($compte,$_POST["id_compte"]);
        header('Location: afficherCompte.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  $title='Modify Compte';
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
                      <h4 class="card-title">Modify an account</h4>
                    <form action="" method="post" class="forms-sample">
                    <input type="hidden" name="id_compte" id="id_cimpte" value="<?php echo $compte['id_user']; ?>" maxlength="20">
                      <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" class="form-control" id="firstName" value="<?php echo $compte['firstname']; ?>" maxlength="20">
                      </div>
                      <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" class="form-control" id="lastName" value="<?php echo $compte['lastname']; ?>" maxlength="20">
                      </div>
                      <div class="form-group">
                        <label for="date">Date de naissance</label>
                        <input type="date" name="date" class="form-control" id="date" value="<?php echo $compte['date_de_N']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" value="<?php echo $compte['email']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="<?php echo $compte['password']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" class="form-control" id="role" value="<?php echo $compte['role']; ?>">
                      </div>

                      <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
                    
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