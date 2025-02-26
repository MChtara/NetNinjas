<?php

include '../Controller/ticketC.php';

$error = "";

// create reservation
$ticket = null;

// create an instance of the controller
$ticketC = new ticketC();
if (
    isset($_POST["type"]) &&
    isset($_POST["prix"]) 
){
    if (
        !empty($_POST["type"]) &&
        !empty($_POST["prix"]) 

    ) {
      $ticket = new ticket(
             null,
          $_POST['type'],
            $_POST['prix']
        );
        $ticketC->updateticket($ticket, $_POST["id_ticket"]);
        $_SESSION['message'] = "Record Modified Successfully";
        $_SESSION['msg_type'] = "success";
      header('Location:Listtickets.php');
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
 $res= null;
    if (isset($_GET['id_ticket'])) {
        $res = $ticketC->showticket($_GET['id_ticket']);

    ?>
                      <h4 class="card-title">update ticket</h4>
                      <center><a href="Listtickets.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">List ticket</button></a></center>
                    <form action="" method="post" class="forms-sample">
                    <input type="hidden" name="id_ticket" id="id_ticket" value="<?php echo $res['id_ticket']; ?>" maxlength="20">
                    

                      <div class="form-group">
                        <label for="type">type</label>
                        <input type="text" name="type" class="form-control" value="<?php echo $res['type']; ?>" id="type">
                      </div>


                      <div class="form-group">
                        <label for="prix">prix</label>
                        <input type="text" name="prix" class="form-control" value="<?php echo $res['prix']; ?>" id="prix">
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