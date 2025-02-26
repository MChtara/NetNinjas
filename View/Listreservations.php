<?php
include '../Controller/reservationR.php';
$reservationR = new reservationR();
$list = $reservationR->Listreservations();
?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  $title="List reservations";
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
          <?php
          if(isset($_SESSION['message'])):
        ?>
		<label class="badge badge-<?=$_SESSION['msg_type'];?>"><?php 
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      ?></label>
      <?php endif ?>

	  <center><a href="addreservation.php"><button type="button" class="btn btn-inverse-primary btn-fw" spellcheck="false">Add reservation</button></a>
    <a href="trieResevations.php" class="btn btn-inverse-primary btn-fw" spellcheck="false">Tri Reservation</a>
    <a href="rechercheReservation.php" class="btn btn-inverse-primary btn-fw" spellcheck="false"> Recherche Reservation</a>
    </center>  
	  </br>
    <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
            <div class="table-responsive">
            <?php
  // include header partial
  require_once 'affichage.php';
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
