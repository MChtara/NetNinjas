<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../Controller/reservationR.php';
$list= null;
  

	//$reservationR=new reservationR();
	//$listreservation=$reservationR->trier();
  //$reservationR = new reservationR();
/*if(isset($_POST['critere'])) {
  $critere = $_POST['critere'];
    $order = $_POST['order'];
    $list = $reservationR->trier($critere, $order);
} */
if(isset($_POST['critere'])) {
  $critere = $_POST['critere'];
  $order = $_POST['order'];
  $reservationR = new reservationR();
  $list = $reservationR->trier($critere,$order);
  $_SESSION['message'] = "Record has been saved!";
  $_SESSION['msg_type'] = "success";
header('Location:Listreservations.php');
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
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php if(isset($_SESSION['message'])): ?>
                  <label class="badge badge-<?=$_SESSION['msg_type'];?>"><?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                  ?></label>
                  <?php endif ?>
                  <h4 class="card-title">Tri reservations</h4>
                  <center><a href="Listreservations.php"><button type="button" class="btn btn-inverse-info btn-fw" spellcheck="false">Listreservations</button></a></center>
                               <form action="" method="post" class="forms-sample">
                    <div class="form-group">
                      <label for="critere">Critère de tri</label>
                      <select class="form-control" name="critere" id="critere">
                     <option value="siege">Siège</option>
                       
                  
                      </select>
                      
                    </div>
                    <div class="form-group">
                      <label for="order">Ordre de tri</label>
                      <select class="form-control" name="order" id="order">
                        <option value="asc">Croissant</option>
                        <option value="desc">Décroissant</option>
                      </select>
                    </div>
                    <button onclick="return validatetrie()" type="submit" name="tri" class="btn btn-primary">tri</button>
                  </form>
                 <?php if(isset($_POST['critere']))
                 {
                 require_once 'affichage.php';   
                 }
                 ?>
                 
                </div>
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